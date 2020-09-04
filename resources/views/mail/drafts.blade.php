@extends('layouts.main')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{__('Drafts')}}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>{{__('Subject')}}</th>
                      <th>{{__('Body')}}</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1 ?>
                    @foreach($drafts as $draft)
                      <tr>
                        <td>{{$i++}}</td>
                        <td><a href="{{route('mail.create', $draft->id)}}"> {{$draft->subject}}</a></td>
                        <td><a href="{{route('mail.create', $draft->id)}}"><span class="badge bg-danger">{{$draft->body}}</span></a></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
 