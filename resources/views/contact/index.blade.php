@extends('layouts.main')
@section('style')
<link href="{{ asset('css/btn-rounded.css')}}" rel="stylesheet"> 
@endsection
@section('content')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">{{__('Contacts List')}}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered data-table">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>{{__('Last Name')}}</th>
                      <th>{{__('First Name')}}</th>
                      <th>{{__('Email')}}</th>
                      <th>{{__('Editer')}}</th>
                      <th>{{__('Supprimer')}}</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $i = 1;
                  ?>
                  @foreach($contacts as $contact)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{__($contact->last_name)}}</td>
                      <td>{{__($contact->first_name)}}</td>
                      <td>{{__($contact->email)}}</td>
                      <td><a herf="{{route('contact.edit', $contact->id)}}"><i class="fas fa-edit btn-edit"></i></a></td>
                      <td><a data-id="{{$contact->id}}" herf="{{route('contact.delete', $contact->id)}}" class="btn-del"><i class="fas fa-trash"></i></a></td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              <a href="{{route('contact.create')}}"> <button type="button" class="btn btn-success btn-circle btn-lg"><i class="fas fa-plus"></i></button></a>
              </div>
            </div>

             <!-- delete form section -->
    <!-- delete form section -->

    <form id="form-data" method="POST" action="{{route('contact.delete')}}">
      @csrf
      <input type="hidden" name="id" id="data-id" value="">
    </form>
    <!-- delete form section -->

    <!-- modal section -->
    <!-- modal section -->
   
     
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
     $(document).ready(function(){
       var data_id;
       $('.btn-del').click(function(){
            data_id = $(this).attr('data-id');
            $('#data-id').attr('value', data_id);
            $('#modal-default').modal('toggle');
            $('#btn-modal-del').click(function(){
             
             $('#form-data').submit();
            })
       });
     });
   </script>
@endsection