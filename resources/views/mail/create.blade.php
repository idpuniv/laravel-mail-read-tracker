@extends('layouts.main')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <a href="{{route('home')}}" class="btn btn-primary btn-block mb-3">{{__('Back')}}</a>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{__('Folders')}}</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                    <a href="#" class="nav-link">
                      <i class="fas fa-inbox"></i>{{__('Inbox')}}
                      <span class="badge bg-primary float-right">12</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link">
                      <i class="far fa-envelope"></i> {{__('Sent')}}
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('mail.drafts')}}" class="nav-link">
                      <i class="far fa-file-alt"></i> {{__('Drafts')}}
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-trash-alt"></i> {{__('Trash')}}
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{__('Labels')}}</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-circle text-danger"></i>{{__('Important')}}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-circle text-warning"></i>{{__('Promotions')}}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-circle text-primary"></i>{{__('Social')}}</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
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
       {{__(Session::get('succes'))}}!!
    </div>
    @endif

    @if(Session::has('failed'))
    <div class="alert alert-danger alert-dismissible hidden">
       {{__(Session::get('failed'))}}!!
    </div>
    @endif
  @endsection
  @section('script')
  <script>
    window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 5000);
  </script>

  @endsection