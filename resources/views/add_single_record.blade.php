@extends('master')

@section('content')
<link href="/css/signin.css" rel="stylesheet">
	
    <div class="container">

      	<form action="{{route('save_single_data')}}" method="post" class="form-sigleRecord">
	      {{csrf_field()}}
	        <h2 class="form-sigleRecord-heading">Enter single Record</h2>
	        <label for="inputPhase" class="sr-only">Phase</label>
	        <input type="number" name="inputPhase" id="inputPhase" class="form-control" placeholder="Phase"  autofocus>
	        <label for="inputBlock" class="sr-only">Block</label>
	        <input type="text" name="inputBlock" id="inputBlock" class="form-control" placeholder="Block"  autofocus>
	       	<label for="inputPlotNo" class="sr-only">Plot No</label>
	        <input type="text" name="inputPlotNo" id="inputPlotNo" class="form-control" placeholder="Plot No"  autofocus>
	       	<label for="inputCategory" class="sr-only">Plot Size/Category </label>
	        <input type="text" name="inputCategory" id="inputCategory" class="form-control" placeholder="Plot Size/Category"  autofocus>
			<label for="inputPrice" class="sr-only">Demand/Price </label>
	        <input type="text" name="inputPrice" id="inputPrice" class="form-control" placeholder="Demand/Price"  autofocus>
			<label for="inputContact" class="sr-only">Contact No. </label>
	        <input type="text" name="inputContact" id="inputContact" class="form-control" placeholder="Contact No."  autofocus>
		
		   <button class="btn btn-lg btn-primary btn-block" type="submit">Save Record</button>
      	</form>

    </div> <!-- /container -->
@endsection