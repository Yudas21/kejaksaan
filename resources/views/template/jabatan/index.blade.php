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
                      <li class="breadcrumb-item"><a href="#">Administrasi</a></li>
                      <li class="breadcrumb-item"><a href="#">User Management</a></li>
                      <li class="breadcrumb-item active">Jabatan</li>
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
                  <h3 class="card-title">Jabatan</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                          <div class="col-md-12" style="margin-bottom: 7px;">
                              <a href="{{ url('jabatan/tambah') }}" class="btn btn-success"><i class="fa fa-plus"></i> Jabatan Baru</a>
                          </div>
                          @if($message = Session::get('message'))
                             <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="icon fa fa-check"></i> {{ $message }}
                              </div> 
                          @endif
                          <!-- Item Listing -->
                          <table class="table table-striped table-hover table-bordered" id="jabatan_table">
                            <thead>
                              <tr>
                                <th style="text-align: center;width: 50px;">No.</th>
                                <th style="text-align: center;">Nama Jabatan</th>
                                <th style="text-align: center;" width="100px">Kelola</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no = 1; ?>
                              @foreach ($data as $value)
                               <tr>
                                  <td>{{ $no }}.</td>
                                  <td>{{ $value->nama_jabatan }}</td>
                                  <td style="text-align: center;">  
                                      <a href="{{ url('jabatan/ubah/'.$value->id) }}" title="Update Jabatan" rel="tooltip"><i class="fa fa-pencil"></i></a> &nbsp; 
                                      <a href="#" title="Hapus Jabatan" rel="tooltip" data-toggle="modal" data-target="#delete-jabatan{{ $no }}"><i class="fa fa-trash"></i></a>
                                  </td>
                              </tr>
                              <div class="modal fade" id="delete-jabatan{{ $no }}" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Hapus Jabatan</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ url('jabatan/hapus/'.$value->id) }}" class="form-horizontal">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="DELETE">
                                        Anda Yakin akan meghapus data : <strong>{{ $value->nama_jabatan }}</strong> ?

                                    </div>
                                    <div class="modal-footer">
                                        <div class="form-group">
                                          <div align="right">
                                              <button type="submit" class="btn btn-danger">Ya</button>
                                              <button class="btn btn-default" data-dismiss="modal">Tidak</button>  
                                            </div>
                                        </div>

                                        </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <?php $no++;?>
                              @endforeach
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