<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Property Record</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{ asset('css/ie10-viewport-bug-workaround.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('starter-template.css')}}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{{ asset('js/ie-emulation-modes-warning.js')}}"></script>

    <link href="/css/search.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Property Record</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/home">Home Page</a></li>
            <li><a href="{{route('enter_new_data')}}">Add Multiple Records</a></li>
            <li><a href="{{route('enter_single_data')}}">Add Single Record</a></li>
            <li><a href="/index">View All Record</a></li>
            <li><a href="/delete" onclick="return confirm('Are you sure to delete all record?')">Delete All Record</a></li>
            <li><a href="{{ route('delete15.data') }}" onclick="return confirm('Are you sure to delete all record?')">Delete Old Record</a></li>
            <li> <a href="#" data-toggle="modal"  data-target="#myModal">Delete From</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <br>
    <br>
    <br>
    <br>
       <div class="container">
          <form action="{{route('search')}}" method="post" class="form-search">
            {{csrf_field()}}
              <label for="phase" class="sr-only">Phase</label>
              <input type="number" name="phase" id="phase" class="form-control" placeholder="Phase"  autofocus>
              <label for="block" class="sr-only">Block</label>
              <input type="text" name="block" id="block" class="form-control" placeholder="Block"   autofocus>
              <button class="btn btn-lg btn-primary btn-block" type="submit" >Search</button>
          </form>
        </div>
    <div class="container">
      		@yield('content')
    </div>
    {{-- Modal --}}
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" >
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete data of given days</h4>
          </div>
          <div class="modal-body">
            <form method="post" action="{{ route('given.time.delete.data') }}">
              {{ csrf_field() }}
              <fieldset class="form-group">
                <label for="formGroupExampleInput">Delete data older than </label>
                <input type="text" class="form-control" name="days" id="formGroupExampleInput" placeholder="Days" required>
              </fieldset>
          </div>
        <div class="modal-footer">
              <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
              <input type="submit" name="Send" value="Delete Data" class="btn btn-danger">
            </form>
          </div>
        </div>

      </div>
    </div>
    {{-- Modal --}}

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- <script src="{{ asset ('js/ie10-viewport-bug-workaround.js')}}"></script> -->
  </body>
</html>



<!--  -->
