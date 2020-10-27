@extends('layouts.base')
@section('content')
<!-- <div class="row"> -->
      yield('content')
      @section('aside')
       @show
        <div class="col-md-3">
           <!-- put aside here -->
        </div>
        <!-- @endsection('aside') -->
        <!-- /.col -->
        <div class="col-md-12">
           @yield('content')
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
@endsection