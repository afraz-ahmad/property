
@extends('master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</script>
<div class="container row">
		{{$all_property->links()}}
</div>
   	<div class="row">
        <div class="col-md-12">
		    <h4>All record</h4>
	        <table class="table table-bordered">
	            <thead>
	              <tr>
	                <th>Date</th>
	                <th>Phase
	                </th>
	                <th>Block Info</th>
	                <!-- <th>Plot No.</th> -->
					<th >Plots' information</th>
					<th >Category</th>
					<th >Demand/Price</th>
					<th>Contact No.</th>
					<th>Delete</th>
	              </tr>
	            </thead>
	            <tbody>
	             	@foreach($all_property as $property)
						<tr>
							<td class="col-md-1">{{$property->created_at}}</td>
							<td><a href="phase/{{$property->phase}}">{{$property->phase ? $property->phase : "N/A"}}</a></td>
							<td class="col-sm-2"><?php $nblock=str_replace(",\n", "<br>", $property->block); echo $nblock;?><br/></td>
							<!-- <td class="col-md-1">{{$property->plot_no}}<br/></td> -->
							<td class="col-md-1">{{$property->data}}</td>
							<td class="col-md-1">{{$property->category ?$property->category: "" }}</td>
							<td class="col-md-1"><?php $price=str_replace(",", "<br>", $property->price); echo $price;?></td>
							<td  class="col-sm-2" style="color: red"><?php $contact=str_replace(",", "<br>", $property->contact); echo $contact;?></td>
							<td><a href="/delete/{{$property->id}}"><input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this record?');" name="delete" value="Delete"></a>
							</td>
						</tr>
					@endforeach
	            </tbody>
	        </table>
    	</div>
    </div>

    <div class="container row">
		{{$all_property->links()}}
    </div>

@endsection
