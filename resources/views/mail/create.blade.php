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
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">{{__('Compose New Message')}}</h3>
              </div>
              <!-- /.card-header -->
              <form method="POST" action="{{route('mail.send')}}">
              	@csrf
              <div class="card-body">
                <div class="form-group">
                  <input class="form-control" name="receiver_addr" placeholder="{{__('To')}}:" required="true">
                </div>
                <div class="form-group">
                  <input class="form-control" name="subject" placeholder="{{__('Subject')}}:" required="true" value='{{ isset($drafts) ? $drafts->subject : "" }}'>
                </div>
                <div class="form-group">
                  <!-- message area -->
                  <!-- message area -->
                  <!-- message area -->
                  <!-- message area -->
                    <textarea id="compose-textarea" name="body" class="form-control" required="true" style="height: 300px" >
                     {{ isset($drafts) ? $drafts->body : '' }}
                    </textarea>
                </div>
                <div class="form-group">
                  <div class="btn btn-default btn-file">
                    <i class="fas fa-paperclip"></i>{{__('Attachments')}}
                    <input type="file" name="file">
                  </div>
                  <p class="help-block">Max. 32MB</p>

                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                  <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i>{{__('Draft')}}</button>
                  <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i>{{__('Send')}}</button>
                </div>
                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i>{{__('Discard')}}</button>
              </div>
              </form>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
  @section('notification')
    @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible hidden">
       {{__(Session::get('success'))}}!!
    </div>
    @endif

    @if(Session::has('failed'))
    <div class="alert alert-danger alert-dismissible hidden">
       {{__(Session::get('failed'))}}!!
    </div>
    @endif
  @endsection

  @section('script')

  <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
  <script src="{{asset('dist/js/demo.js')}}"></script>
  <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>

  <script>
    window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 5000);
  </script>

  @endsection