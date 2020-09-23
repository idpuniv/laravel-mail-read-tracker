@extends('layouts.main')
@section('content')
    <!-- Main content -->
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">{{__('Compose New Message')}}</h3>
              </div>
              <!-- /.card-header -->
              <form method="POST" action="{{route('mail.send')}}" enctype="multipart/form-data" accept-charset="UTF-8">
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

                <!-- <div class="form-group">
                  <div class="btn btn-default btn-file fileinput-button">
                    <i class="fas fa-paperclip"></i>{{__('Attachments')}}
                    <input type="file" name="file" id="images" id="files" multiple accept="image/jpeg, image/png, image/gif,"><br/>
                  </div>
                  <p class="help-block">Max. 32MB</p>
                </div>
                <output id="Filelist"></output> -->


                <div>
                  <!--To give the control a modern look, I have applied a stylesheet in the parent span.-->
                  <span class="btn btn-success fileinput-button">
                      <span><i class="fas fa-paperclip"></i></span>
                      <input type="file" name="files[]" id="files" mutliple><br />
                  </span>
              </div>
              <div>
              <output id="Filelist"></output>
              </div>
              

                <!-- image preview section -->
                <!-- image preview section -->
                <!-- image preview section -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                  <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i>{{__('Draft')}}</button>
                  <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i>{{__('Send')}}</button>
                </div>
                <button type="reset" class="btn btn-default" id="btn-discard"><i class="fas fa-times"></i>{{__('Discard')}}</button>
              </div>




              </form>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
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


  <script>
    window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 5000);
  </script>
  @endsection