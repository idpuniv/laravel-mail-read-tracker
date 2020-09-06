@extends('layouts.main')
@section('content')
<style>
.fa-check-double{
  color:grey;
}
</style>
<section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="{{route('mail.create')}}" class="btn btn-primary btn-block mb-3">{{__('New Message')}}</a>

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
                    <i class="fas fa-inbox"></i> {{__('Inbox')}}
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
                  <a href="{{route('mail.trash')}}" class="nav-link">
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
              <h3 class="card-title">{{__('Libellé')}}</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                  <a href="{{route('home')}}" class="nav-link" id="import-link">
                    <i class="far fa-circle text-danger"></i>
                    {{__('Important')}}
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('home')}}" class="nav-link" id="promo-link">
                    <i class="far fa-circle text-warning"></i> {{__('Promotions')}}
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('home')}}" class="nav-link" id="social-link">
                    <i class="far fa-circle text-primary"></i>
                    {{__('Social')}}
                  </a>
                </li><li class="nav-item">
                  <a href="{{route('mail.test')}}" class="nav-link" id="social-link">
                    <i class="far fa-circle text-primary"></i>
                    {{__('Test')}}
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <!-- tests section -->
        <!-- tests section -->
        <!-- tests section -->
        <!-- tests section -->
        <!-- tests section -->
        <!-- tests section -->


       
        <!-- <aside class="control-sidebar control-sidebar-dark">
          <h2>Paul</h2> -->
          <!-- Control sidebar content goes here -->
       <!-- </aside> -->







        <!-- tests section -->
        <!-- tests section -->
        <!-- tests section -->
        <!-- tests section -->
        <!-- tests section -->

        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">{{__($box_name)}}</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Search Mail">
                  <div class="input-group-append">
                    <div class="btn btn-primary">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>
                <div class="float-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
              <div class="table-responsive mailbox-messages">

                <table class="table table-hover table-striped">
                  <tbody>
                  @foreach($mails as $mail)
                   @foreach($mail->report as $report)
                    <?php 
                        $color = 'grey';
                        if($report->clics > 0) 
                          $color = 'green';
                    ?>
                      <tr>
                        <td>
                          <div class="icheck-primary">
                            <input type="checkbox" value="" id="check1">
                            <label for="check1"></label>
                          </div>
                        </td>
                        <!-- <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td> -->
                        <td class="mailbox-star"><a href="#"><i class='fas fa-check-double' style='font-size:12px;color:{{$color}}'></i></a></td>
                        <td class="mailbox-name"><a href="{{route('mail.read',$mail->id)}}">{{$report->receiverUser->name}}</a></td>
                        <td class="mailbox-subject"><a href="{{route('mail.read', $mail->id)}}"><b>{{$mail->subject}}</b> - {{$mail->body}}</a>
                        </td>
                        <td class="mailbox-attachment"></td>
                        <td class="mailbox-date">{{$mail->created_at}}</td>
                     </tr>
                    @endforeach
                  @endforeach
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>
                <div class="float-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection