@extends('layouts.base')
@section('content')
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
        <tr>
          <td>
            <div class="icheck-primary">
              <input type="checkbox" value="" id="check3">
              <label for="check3"></label>
            </div>
          </td>
          <td class="mailbox-star"><a href="#"><i class="fas fa-star-o text-warning"></i></a></td>
          <td class="mailbox-name flex1"><a href="read-mail.html">Alexander Pierce</a></td>
          <td class="mailbox-subject flex1"><b>AdminLTE 3.0 Issue</b></td>
          <td class="mailbox-body flex1"><b>AdminLTE 3.0 Issue</b> - Trying to find a solution to this problem...</td>
          <td class="mailbox-attachment flex2"><i class="fas fa-paperclip"></i></td>
          <td class="mailbox-date flex2"><span> 02 Oct </span></td>
        </tr>
        <tr>
          <td>
            <div class="icheck-primary">
              <input type="checkbox"  value="" id="check4">
              <label for="check4"></label>
            </div>
          </td>
          <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
          <td class="mailbox-name flex1"><a href="read-mail.html">Alexander Pierce</a></td>
          <td class="mailbox-subject flex1"><b>AdminLTE 3.0 Issue</b></td>
          <td class="mailbox-body flex1"><b>AdminLTE 3.0 Issue</b> - Trying to find a solution to this problem...</td>
          <td class="mailbox-attachment flex2"></td>
          <td class="mailbox-date flex2">02 Oct</td>
        </tr>
        <tr>
          <td>
            <div class="icheck-primary">
              <input type="checkbox" class="checkbox" value="" id="check5">
              <label for="check5"></label>
            </div>
          </td>
          <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
          <td class="mailbox-name flex1"><a href="read-mail.html">Alexander Pierce</a></td>
          <td class="mailbox-subject flex1"><b>AdminLTE 3.0 Issue</b></td>
          <td class="mailbox-body flex1"><b>AdminLTE 3.0 Issue</b> - Trying to find a solution to this problem...</td>
          <div>
          <td class="mailbox-attachment flex2"><i class="fas fa-paperclip"></i></td>
          <td class="mailbox-date flex2">02 Oct</td>
          </div>
        </tr>
        <tr>
          <td>
            <div class="icheck-primary">
              <input type="checkbox" class="checkbox" value="" id="check6">
              <label for="check6"></label>
            </div>
          </td>
          <td class="mailbox-star"><a href="#"><i class="fas fa-star-o text-warning"></i></a></td>
          <td class="mailbox-name flex1"><a href="read-mail.html">Alexander Pierce</a></td>
          <td class="mailbox-subject flex1"><b>AdminLTE 3.0 Issue</b></td>
          <td class="mailbox-body flex1"><b>AdminLTE 3.0 Issue</b> - Trying to find a solution to this problem...</td>
          <td class="mailbox-attachment flex2"><i class="fas fa-paperclip"></i></td>
          <td class="mailbox-date flex2">02 Oct</td>
        </tr>
        <tr>
          <td>
            <div class="icheck-primary">
              <input type="checkbox" value="" id="check7">
              <label for="check7"></label>
            </div>
          </td>
          <td class="mailbox-star"><a href="#"><i class="fas fa-star-o text-warning"></i></a></td>
          <td class="mailbox-name flex1"><a href="read-mail.html">Alexander Pierce</a></td>
          <td class="mailbox-subject flex1"><b>AdminLTE 3.0 Issue</b></td>
          <td class="mailbox-body flex1"><b>AdminLTE 3.0 Issue</b> - Trying to find a solution to this problem...</td>
          <td class="mailbox-attachment flex2"><i class="fas fa-paperclip"></i></td>
          <td class="mailbox-date flex2">02 Oct</td>
        </tr>
        </tbody>
      </table>
      <!-- /.table -->
    </div>
  <!-- /.mail-box-messages -->
@endsection
@section('script')
<script>
  $(document).ready(function(){
  //  $('#input-type').attr('value', 'sent');
   if($('.mailbox-attachment').css('display') == 'none')
   {
     $('.flex2:last').append('<br><span class="mailbox-attachment"><i class="fas fa-paperclip"></i></span>')
   }
})
</script>
@endsection