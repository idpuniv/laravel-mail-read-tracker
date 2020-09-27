@extends('layouts.main')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">

              <div class="card-header">
                <h3 class="card-title">Profile</h3>
                 <!-- added bloc -->
                 <!-- added bloc -->

                <!-- Profile Image -->
                        <!-- <div class="card card-primary card-outline">
                        <div class="card-body box-profile"> -->
                            <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                src="{{asset('img/default-user.png')}}"
                                alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>
                            <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Email</b> <a class="float-right">{{Auth::user()->email}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Nom</b> <a class="float-right">{{Auth::user()->name}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Rôle</b> <a class="float-right">{{Auth::user()->role}}</a>
                            </li>
                            </ul>

                    
                        <!-- </div>
                        /.card-body
                        </div> -->

                 <!-- added bloc -->


                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    Modifier le profile</button>
                  <!-- <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove"> -->
                    <!-- <i class="fas fa-times"></i></button> -->
                </div>
              </div>


              <div class="card-body collapse">
              
                <!-- card body added -->
                <!-- card body added -->

                <form class="form-horizontal" id="form-update" method="POST" action="{{route('profile.update')}}">
                      @csrf
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}" placeholder="Email" required="false">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nom</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}"  placeholder="Nom" required="false">
                        </div>
                      </div>
                      <div>
                      <hr>Mot de passe
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Ancien</label>
                        <div class="col-sm-10">
                          <input type="password" name="password-old" class="form-control"  placeholder="Ancien mot de passe" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Nouveau</label>
                        <div class="col-sm-10">
                          <input type="password" name="password" class="form-control" placeholder="Nouveau mot de passe">
                        </div>
                      </div>
                      <input type="hidden" name="user-id" value="{{Auth::user()->id}}">
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Confirmer</label>
                        <div class="col-sm-10">
                          <input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="confirmer mot de passe">
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">Annuler</button>
                          <button class="btn btn-secondary">Enregistrer</button>
                        </div>
                      </div>
                    </form>
                <!-- card body added -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer collapse">
              <div class="row">
                <div class="col-sm-2">simplestmailer</div>
                <div class="offset-sm-8">
                      <button type="submit" class="btn btn-tool btn-danger" id="btn-del">Supprimer votre compte</button>
                </div>
              </div>
                
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- delete account form -->

  <!-- <button type="button" class="btn btn-success swalDefaultSuccess">
                  Launch Success Toast
                </button> -->
  <form method="POST" action="{{route('profile.delete')}}" id="form-del">
      @csrf
      <input type="hidden" name="user-id" id="user-id" value="{{Auth::user()->id}}">
  </form>
@endsection

@section('script')
    <script>
          $(document).ready(function(){
              $('.collapse').collapse('toggle');
          })

          // submit delete account form
          var data_id;
          $('#btn-del').click(function(){
            $('#modal-default').modal('toggle');
            $('#btn-modal-del').click(function(){
            $('#form-del').submit();
            });

          $('#btn-submit').click(function(){

            // if($('input[name="password_confirmation"]'.value == $('input[name="password"]').value)
            //   $('#form-update').submit();
          });
            
         
            // const Toast = Swal.mixin({
            //   toast: true,
            //   position: 'top-end',
            //   showConfirmButton: false,
            //   timer: 3000
            // });

            // $('.swalDefaultSuccess').click(function() {
            //   Toast.fire({
            //     icon: 'success',
            //     title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            //   })
            // });
        });
          

    </script>
@endsection