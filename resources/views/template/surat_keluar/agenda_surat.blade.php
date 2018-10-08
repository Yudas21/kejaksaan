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
                      <li class="breadcrumb-item"><a href="#">Surat Keluar</a></li>
                      <li class="breadcrumb-item active">Agenda Surat</li>
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
                  <h3 class="card-title">Agenda Surat</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                          
                          
                          <!-- Item Listing -->
                          <table class="table table-striped table-hover table-bordered" id="jabatan_table">
                            <thead>
                              <tr>
                                <th style="text-align: center;width: 50px;">No.</th>
                                <th style="text-align: center;">Jenis</th>
                                <th style="text-align: center;">Klasifikasi</th>
                                <th style="text-align: center;">Sifat</th>
                                <th style="text-align: center;">Nomor Surat</th>
                                <th style="text-align: center;">Tanggal Surat</th>
                                <th style="text-align: center;">Dari</th>
                                <th style="text-align: center;">Kepada</th>
                                <th style="text-align: center;" width="100px">Kelola</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                              	<td>1.</td>
                              	<td>Surat Keluar</td>
                              	<td>Biasa</td>
                              	<td>Undangan</td>
                              	<td>12/SU-JAK-RI/VII/2018</td>
                              	<td style="text-align: center;">02-07-2018</td>
                              	<td>Kejaksaan Agung RI</td>
                              	<td>Menteri Pertahanan RI</td>
                              	<td style="text-align: center;"><i class="fa fa-search"></i> <i class="fa fa-pencil"></i> <i class="fa fa-paper-plane-o"></i> <i class="fa fa-trash"></i></td>
                              </tr>
                            </tbody>
                          </table>
                          
                </div>
              </div>
            </section>
          </div>
          @section('myjsfile')
            <script type="text/javascript">
              $(function () {
                 $('#jabatan_table').DataTable();
              });
            </script>
          @endsection
        @stop