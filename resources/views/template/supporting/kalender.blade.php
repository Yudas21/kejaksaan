        @extends('template.layout')
        @section('content')
        <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Supporting</a></li>
                      <li class="breadcrumb-item active">Kalender</li>
                    </ol>
                  </div>
                </div>
              </div><!-- /.container-fluid -->
            </section>

            <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <h4>Kalender <a href=""></a></h4>
                </div>
                <div class="row">
                  <!-- /.col -->
                  <div class="col-md-12">
                    <div class="card card-primary">
                      <div class="card-body p-0">
                        <!-- THE CALENDAR -->
                        {!! $calendar->calendar() !!}
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /. box -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div><!-- /.container-fluid -->
            </section>

            <!-- /.content -->
          </div>
          @section('myjsfile')
            <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
            <script src="{{ asset('template/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
            <!-- Page specific script -->
            {!! $calendar->script() !!}
          @endsection
        @stop