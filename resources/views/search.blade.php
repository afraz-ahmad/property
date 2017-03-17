@extends('master')

@section('content')
	<div class="container row">
</div>
   	<div class="row">
        <div class="col-md-12">
		    <h4>Searched Results</h4>
	        <table class="table table-bordered">
	            <thead>
	              <tr>
	                <th>Date</th>
	                <th>Phase </th>
	                <th>Block</th>
					<th >Phase Info</th>
					{{-- <th >Category/Size</th> --}}
					{{-- <th >Demand/Price</th> --}}
					<th>Contact No.</th>
	              </tr>
	            </thead>
	            <tbody>
	             	@foreach($data as $d)
						<tr>
							<td class="col-md-1">{{$d->created_at}}</td>
							<td><a href="phase/{{$d->phase_id}}">{{$d->phase_id ? $d->phase_id : "N/A"}}</a></td>
							<td class="col-md-1">{{$d->block_data}}</td>
							<td >{{$d->phase_info}}</td>
							<td >{{$d->contact}}</td>
						</tr>
					@endforeach
	            </tbody>
	        </table>
    	</div>
    </div>

    <div class="container row">
    </div>

@endsection
