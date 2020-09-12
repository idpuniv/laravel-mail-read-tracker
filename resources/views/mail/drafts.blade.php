@extends('layouts.main')
@section('style')
<link href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet"> 
<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
<link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{__('Drafts')}}</h3><span></span>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th
                     
                        <div class="icheck-primary">
                          <input type="checkbox" value="" id="check1">
                          <label for="check1"></label>
                        </div>
                    
                      </th>
                      <th>{{__('Subject')}}</th>
                      <th>{{__('Body')}}</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1 ?>
                    @foreach($drafts as $draft)
                      <tr>
                        <td>

                        <div class="icheck-primary">
                          <input type="checkbox" value="" id="check1">
                          <label for="check1"></label>
                        </div>

                        </td>
                        <td><a href="{{route('mail.create', $draft->id)}}"> {{$draft->subject}}</a></td>
                        <td><a href="{{route('mail.create', $draft->id)}}"><span class="badge bg-danger">{{$draft->body}}</span></a></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
  @section('script')
  <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
  <script src="{{asset('dist/js/demo.js')}}"></script>
  @endsection
 