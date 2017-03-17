@extends('master')

@section('content')
<div class="container row">
          {{$phase->links()}}
</div>
<div class="row">
    <div class="col-md-12">
        <h4>Phase record</h4>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Phase</th>
        				<th >Plots' information</th>
        				<th>Category</th>
        				<th>Demand/Price</th>
        				<th>Contact No.</th>
              </tr>
            </thead>
            <tbody>
            @foreach($phase as $ph)
        			<tr>
        				<td>{{$ph->phase ? $ph->phase : "N/A"}}</td>
        					<td>{{$ph->data}}</td>
        					<td class="col-md-1">{{$ph->category ?$ph->category: "" }}</td>
        					<td class="col-md-1">{{$ph->price ? $ph->price : ""}}</td>
        					<td  style="color: red">{{$ph->contact}}</td>
        			</tr>
      			@endforeach
            </tbody>
          </table>
    </div>
</div>  

<div class="container row">
    {{$phase->links()}}
</div> 
@endsection
