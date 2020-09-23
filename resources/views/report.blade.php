@extends('layouts.main')

<meta name="csrf-token" content="{{csrf_token()}}">
@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              Rapport d'ouverture des emails envoyé.
            </div>
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> {{__($report->email->subject)}}.
                    <small class="float-right">Date d'envoi: {{$report->email->created_at}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
              
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>{{__('Last Name')}}</th>
                      <!-- <th>{{__('First Name')}}</th> -->
                      <th>{{__('Email')}}</th>
                      <th>{{__('Open Count')}}</th>
                      <th>{{__('First Time Open Date')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <?php if(!is_object($report->receiverUser)){
                          $report->receiverUser = new \App\User();
                          $report->receiverUser->name = 'inconnu';
                    }
                    ?>
                      <td>{{$report->receiverUser->name. ' | ' .$report->receiver_addr}}</td>
                      <!-- <td>455-981-221</td> -->
                      <td>{{$report->receiver_addr}}</td>
                      <td>{{$report->clics}}</td>
                      <td>{{$report->open_date}}</td>
                    </tr>
                    <tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                
                <!-- /.col -->
               
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <!-- <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                </div>
              </div> -->
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection