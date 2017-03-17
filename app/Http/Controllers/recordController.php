<?php
namespace App\Http\Controllers;

ini_set('max_execution_time', 300);

use App\Block;
use App\record;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class recordController extends Controller
{
    public function index()
    {
        $all_property = record::orderBy('created_at', 'desc')->paginate(8);
        // $options = DB::table('records')->distinct()->select('phase')->orderBy('phase', 'asc')->get();

        return view('/index', compact('all_property'));
    }

    public function enter_new_data(Request $request)
    {
        return view('/save_new_record');
    }
    public function deleteData()
    {
        DB::table('records')->truncate();
        DB::table('blocks')->truncate();
        return redirect()->back();
    }
    public function add_single_record()
    {
        return view('/add_single_record');
    }
    public function save_single_record(Request $request)
    {
        $record = new record();
        $record->phase = $request->inputPhase;
        $record->block = $request->inputBlock;
        $record->block = $request->inputBlock;
        $record->plot_no = $request->inputPlotNo;
        $record->category = $request->inputCategory;
        $record->contact = $request->inputContact;
        $record->save();
        return redirect()->back();
        return view('/add_single_record');
    }
    public function save_to_db(Request $request)
    {

        $raw_data = $request->data;
        $splited = (preg_split("/(Phase|PHASE|phase|PH|ph|9 town |9 prism)/i", $raw_data, -1, PREG_SPLIT_NO_EMPTY));

        // echo "<pre>";
        // print_r($splited);
        // echo "</pre>";
        // echo "Phase count " . count($splited);
        // echo "-------------------------------------------------------------------------------------------------------------------";

        for ($i = 0; $i <= (count($splited) - 1); $i++) {
            $record = new record;

            if (preg_match_all('/((\d{4}) (\d{2}) (\d{4}) (\d{1}))|((\d{4}) (\d{3}) (\d{4}))|((\d{4})-(\d{3})-(\d{4}))|((\d{4})-(\d{7}))|((\d{4}) (\d{7}))|\b03\d+/', $splited[$i], $matches)) {
                $numbers = $matches[0];
                $numbers = implode($numbers, " , ");
                $record->contact = $numbers;
            }
            if (preg_match_all('/\d{1,}[a-zA-Z]{3,}|(\w*demand\s\d\d*\d*)|(\w*Demand\s\d\d*\d*\w*)/', $splited[$i], $matches)) {
                $price = ($matches[0]);
                $price = implode($price, " , ");
                $record->price = $price;
            }
            if (preg_match_all('/(\w*corner\w*)|(\w*Corner\w*)|(\w*Cornor\w*)|(\d*\d\s*\w*marla\w*)|(\d*\d\s*\w*Marla\w*)/', $splited[$i], $matches)) {
                $category = $matches[0];
                $category = implode($category, " , ");
                $record->category = $category;
            }
            // army civil
            if (preg_match_all('/(\w*army\w*)|(\w*Army\w*)|(\w*Civil\w*)|(\w*civil\w*)/', $splited[$i], $matches)) {
                $army_civil = $matches[0];
                $army_civil = implode($army_civil, " , ");
                $record->army_civil = $army_civil;
            }

            $fetched_phase = intval(ltrim($splited[$i][0] . $splited[$i][1] . $splited[$i][2], '-'));
            $record->phase = $fetched_phase;
            $record->data = substr($splited[$i], 2);
            // block
            $expression = "/^[a-zA-Z]\s*\d{1,}\s*\@\s*\d{1,}[a-zA-Z]{0,}|[a-zA-Z]{1,}\-*\s*\d{1,}\s*\@\s*\d{1,}|[a-zA-Z]{1,}\d*\:*\d{1,}\@\d{1,}|\d{1,}\-[a-zA-Z]\-\d{1,}\s*[a-zA-Z]{3,}|[a-zA-Z]{1,}\/*\d{1,}\s*\@*\s*\d{1,}\s*[a-zA-Z]{3,}|[a-zA-Z](\.)(...........*)|[a-zA-Z]\s*\-\s*\d{1,}\s*(.*)|[a-zA-Z]{1}\s*\d+\s*[a-zA-Z]+\s*\d+\s+[a-zA-Z]+\s*\d+(.*)/";
            if (preg_match_all($expression, $splited[$i], $matches)) {
                // echo "Coount matches".count($matches);
                $block = $matches[0];
                $block = (implode(",\n", $block));
                $record->block = $block;
                // Fetch name of block and save it to blocks table with phase id so that blocks can be searched on the basis of phase;
                $nblock = str_replace(",\n", "<br>", $block);
                $fetched_blocks = (explode("<br>", $nblock));
                for ($j = 0; $j < count($fetched_blocks); $j++) {
                    $block_object = new Block;
                    $block_object->block_data = $fetched_blocks[$j];
                    $block_object->phase_id = $fetched_phase;
                    $block_object->phase_info = substr($splited[$i], 2);
                    // $block_object->contact = $numbers;
                    $block_object->save();
                }

            }
            $record->save();
            if (!isset($splited[$i])) {
                continue;
            }
        }
        return view('save_new_record');
    }

    public function phase($id)
    {
        $phase = record::where('phase', '=', $id)->paginate(6);
        return view('selected_phase')->with('phase', $phase);
    }
    public function destroy($id)
    {
        //delete record
        $record = record::findOrFail($id);
        $record->delete();
        return redirect()->back();
    }

    public function search(Request $request)
    {

        $phase = $request->phase;
        $block = $request->block;
        $data = Block::where('phase_id', $phase)->where('block_data', 'like', $block . '%')->get();
        return view('search')->with(compact('data'));
    }

    public function delete_15_days_data()
    {
        $d = new Carbon();
        record::where('created_at', '<', $d->addDays(-15))->delete();
        return back();
    }

    public function deleteGivenTimeData(Request $request)
    {
        $carbon = Carbon::now();
        // dd($carbon->addDays(-$request->days));
        record::where('created_at', '<=', $carbon->addDays(-$request->days))->delete();
        return back();
    }

}
