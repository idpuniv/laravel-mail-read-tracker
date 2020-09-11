@extends('layouts.main')
@section('content')


<style>
.fa-check-double{
  color:grey;
}
</style>
<section class="content">
  <div class="row">
        
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

        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <div class="card-tools">
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
@endsection