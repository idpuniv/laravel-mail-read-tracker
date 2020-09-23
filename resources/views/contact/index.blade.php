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
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>{{__('Last Name')}}</th>
                      <th>{{__('First Name')}}</th>
                      <th>{{__('Email')}}</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($contacts as $contact)
                    <tr>
                      <td>1.</td>
                      <td>{{__('$contact->last_name')}}</td>
                      <td>{{__('$contact->first_name')}}</td>
                      <td>{{__('$contact->email')}}</td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              <a href="{{route('contact.create')}}"> <button type="button" class="btn btn-success btn-circle btn-lg"><i class="fas fa-plus"></i></button></a>
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
    @endsection