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
                      <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
                    </ol>
                  </div>
                </div>
              </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

              <!-- Default box -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Dashboard</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <!-- Info boxes -->
                  <div class="row">
                    <div class="col-12 col-sm-6 col-md-4">
                      <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fa fa fa-clipboard"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">Surat Masuk ({{ date('Y') }})</span>
                          <span class="info-box-number">
                            234
                          </span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-4">
                      <div class="info-box mb-4">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-paper-plane-o"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">Surat Keluar ({{ date('Y') }})</span>
                          <span class="info-box-number">123</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <!-- <div class="clearfix hidden-md-up"></div> -->

                    <div class="col-12 col-sm-6 col-md-4">
                      <div class="info-box mb-4">
                        <span class="info-box-icon bg-success elevation-1"><i class="fa fa-users"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">Users</span>
                          <span class="info-box-number">2,000</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                  <div class="row clearfix"></div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="card card-default">
                        <div class="card-header">
                          <h3 class="card-title">Surat Masuk ({{ date('Y') }})</h3>

                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="chart">
                            <canvas id="barChartMasuk" style="height:230px"></canvas>
                          </div>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.chart-responsive -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                      <div class="card card-default">
                        <div class="card-header">
                          <h3 class="card-title">Surat Keluar ({{ date('Y') }})</h3>

                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="chart">
                            <canvas id="barChartKeluar" style="height:230px"></canvas>
                          </div>
                        </div>
                        <!-- /.card-body -->
                      </div>
                    </div>
                    <!-- /.col -->
                  </div>
                  
                </div>
              </div>
            </section>
            <!-- /.content -->
          </div>
          <!-- /.content-wrapper -->
          
          @section('myjsfile')
            <!-- SparkLine -->
            <script src="{{ asset('template/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
            <script src="{{ asset('template/plugins/chartjs-old/Chart.min.js') }}"></script>
            <script src="{{ asset('template/dist/js/pages/dashboard2.js') }}"></script>
            <script type="text/javascript">
              $(function () {
                var areaChartData = {
                  labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                  datasets: [
                    {
                      label               : 'Electronics',
                      fillColor           : 'rgba(210, 214, 222, 1)',
                      strokeColor         : 'rgba(210, 214, 222, 1)',
                      pointColor          : 'rgba(210, 214, 222, 1)',
                      pointStrokeColor    : '#c1c7d1',
                      pointHighlightFill  : '#fff',
                      pointHighlightStroke: 'rgba(220,220,220,1)',
                      data                : [65, 59, 80, 81, 56, 55, 40]
                    },
                    {
                      label               : 'Digital Goods',
                      fillColor           : 'rgba(60,141,188,0.9)',
                      strokeColor         : 'rgba(60,141,188,0.8)',
                      pointColor          : '#3b8bba',
                      pointStrokeColor    : 'rgba(60,141,188,1)',
                      pointHighlightFill  : '#fff',
                      pointHighlightStroke: 'rgba(60,141,188,1)',
                      data                : [28, 48, 40, 19, 86, 27, 90]
                    }
                  ]
                }
                var barChartCanvas                   = $('#barChartMasuk').get(0).getContext('2d');
                var barChart                         = new Chart(barChartCanvas);
                var barChartData                     = areaChartData;
                barChartData.datasets[1].fillColor   = '#17a2b8';
                barChartData.datasets[1].strokeColor = '#17a2b8';
                barChartData.datasets[1].pointColor  = '#17a2b8';
                var barChartOptions                  = {
                  //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
                  scaleBeginAtZero        : true,
                  //Boolean - Whether grid lines are shown across the chart
                  scaleShowGridLines      : true,
                  //String - Colour of the grid lines
                  scaleGridLineColor      : 'rgba(0,0,0,.05)',
                  //Number - Width of the grid lines
                  scaleGridLineWidth      : 1,
                  //Boolean - Whether to show horizontal lines (except X axis)
                  scaleShowHorizontalLines: true,
                  //Boolean - Whether to show vertical lines (except Y axis)
                  scaleShowVerticalLines  : true,
                  //Boolean - If there is a stroke on each bar
                  barShowStroke           : true,
                  //Number - Pixel width of the bar stroke
                  barStrokeWidth          : 2,
                  //Number - Spacing between each of the X value sets
                  barValueSpacing         : 5,
                  //Number - Spacing between data sets within X values
                  barDatasetSpacing       : 1,
                  //String - A legend template
                  legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
                  //Boolean - whether to make the chart responsive
                  responsive              : true,
                  maintainAspectRatio     : true
                }

                barChartOptions.datasetFill = false;
                barChart.Bar(barChartData, barChartOptions);

                var barChartCanvas2                   = $('#barChartKeluar').get(0).getContext('2d');
                var barChart2                         = new Chart(barChartCanvas2);
                var barChartData2                     = areaChartData;
                barChartData2.datasets[1].fillColor   = '#dc3545';
                barChartData2.datasets[1].strokeColor = '#dc3545';
                barChartData2.datasets[1].pointColor  = '#dc3545';
                var barChartOptions2                  = {
                  //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
                  scaleBeginAtZero        : true,
                  //Boolean - Whether grid lines are shown across the chart
                  scaleShowGridLines      : true,
                  //String - Colour of the grid lines
                  scaleGridLineColor      : 'rgba(0,0,0,.05)',
                  //Number - Width of the grid lines
                  scaleGridLineWidth      : 1,
                  //Boolean - Whether to show horizontal lines (except X axis)
                  scaleShowHorizontalLines: true,
                  //Boolean - Whether to show vertical lines (except Y axis)
                  scaleShowVerticalLines  : true,
                  //Boolean - If there is a stroke on each bar
                  barShowStroke           : true,
                  //Number - Pixel width of the bar stroke
                  barStrokeWidth          : 2,
                  //Number - Spacing between each of the X value sets
                  barValueSpacing         : 5,
                  //Number - Spacing between data sets within X values
                  barDatasetSpacing       : 1,
                  //String - A legend template
                  legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
                  //Boolean - whether to make the chart responsive
                  responsive              : true,
                  maintainAspectRatio     : true
                }

                barChartOptions2.datasetFill = false;
                barChart2.Bar(barChartData2, barChartOptions2);
              });
            </script>
          @endsection
        @stop
