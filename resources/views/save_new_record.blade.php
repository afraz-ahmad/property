@extends('master')

@section('content')
	<form action="{{route('save')}}" method="post">
		{{csrf_field()}}
		<textarea id="data" name="data" cols="100" rows="25"></textarea>
		<button type="submit"  class="btn btn-primary">Save</button>
	</form>
@endsection