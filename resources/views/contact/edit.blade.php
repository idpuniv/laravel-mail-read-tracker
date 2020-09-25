@extends('layouts.main')
@section('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Créer un nouveau contact</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{route('contact.update', $contact->id)}}">
                 @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputName1">Nom</label>
                    <input type="text" name="last_name" value="{{$contact->last_name ??}}" class="form-control @error('last_name') is-invalid @enderror'" placeholder="Nom">
                  </div>
                  @error('last_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                  <div class="form-group">
                    <label for="exampleInputName2">Prenom</label>
                    <input type="text" name="first_name"  value="{{$contact->first_name ??}}" class="form-control @error('first_name') is-invalid @enderror" placeholder="Prenom">
                  </div>
                  @error('first_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                  <div class="form-group">
                    <label for="exampleInputEmail1"> Adresse email</label>
                    <input type="email" name="email"  value="{{$contact->email ??}}" class="form-control @error('email') is-invalid @enderror"  placeholder="Adresse email">
                  </div>
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
        
                  
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
              </form>
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