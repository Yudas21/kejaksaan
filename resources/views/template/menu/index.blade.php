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
                      <li class="breadcrumb-item"><a href="#">User Management</a></li>
                      <li class="breadcrumb-item active"><a href="#">Menu</a></li>
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
                  <h3 class="card-title">Menu</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  
                    @if(Session::get('message') != '')
                    <div class="row">
                      <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="icon fa fa-check-circle"></i> {{ Session::get('message') }}
                        </div>
                       </div>
                      </div>
                    @endif
                    <div class="row">
                    <a href="{{ url('menu/tambah') }}" class="btn btn-success" style="margin-bottom: 5px;"><i class="fa fa-plus"></i> Menu Baru</a>
                    <table id="menu" class="table table-striped table-hover table-bordered">
                      <thead>
                          <tr>
                             <th style="text-align: center;vertical-align: middle;width: 50px;">No.</th>
                             <th style="text-align: center;vertical-align: middle;">Nama Menu</th>
                             <th style="text-align: center;vertical-align: middle;">Icon</th>
                             <th style="text-align: center;vertical-align: middle;">Parent</th>
                             <th style="text-align: center;vertical-align: middle;">URL</th>
                             <th style="text-align: center;vertical-align: middle;width: 50px;">Kelola</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; ?>
                        @foreach ($menu as $data)

                          <tr>
                            <td>{{ $no }}.</td>
                            <td>{{ $data->nama_menu }}</td>
                            <td>{{ $data->icon }}</td>
                            <td>@if($data->parent == 0)
                                sebagai parent 
                                @else
                                  {{ $data->nama_parent }} 
                                @endif</td>
                            <td>{{ $data->url }}</td>
                            <td style="text-align: center;"><a href="{{ url('menu/ubah/'.$data->id) }}" rel="tooltip" title="Ubah Menu"><i class="fa fa-pencil"></i></a> &nbsp; <a href="#" data-toggle="modal" data-target="#deleteMenu<?=$no?>" rel="tooltip" title="Hapus Menu"><i class="fa fa-trash"></i></a></td>
                          </tr>
                          <div id="deleteMenu<?=$no?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <form action="{{ url('menu/hapus/'.$data->id) }}" method="post">
                                  {{csrf_field()}}
                                  <input type="hidden" name="_method" value="delete">
                                <div class="modal-header">
                                  <h4 class="modal-title" style="float: left;">Hapus Data Menu</h4>
                                  <button type="button" class="close" data-dismiss="modal" style="float: right;">&times;</button>
                                </div>
                                <div class="modal-body">
                                  <p>Anda yakin akan menghapus Menu : <strong>{{ $data->nama_menu }}</strong> ?</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-danger">Ya</button> &nbsp;
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                </div>
                                 </form>
                              </div>

                            </div>
                          </div>
                          <?php $no++;?>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  
                </div>
              </div>
            </section>
            <!-- /.content -->
          </div>
          <!-- /.content-wrapper -->
          
          @section('myjsfile')
            <script type="text/javascript">
              $(function () {
                  $('#menu').DataTable();
              });
            </script>
          @endsection
        @stop
