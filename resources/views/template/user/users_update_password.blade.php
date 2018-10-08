        @extends('template.layout')
        @section('content')
        <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <!-- <h1>Home</h1> -->
                  </div>
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Administrasi</a></li>
                      <li class="breadcrumb-item"><a href="#">User Management</a></li>
                      <li class="breadcrumb-item active">Users</li>
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
                  <h3 class="card-title">Ubah Password User</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger" style="margin-top: 20px;">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                                <form action="{{ url('users/update_password/'.$id) }}" method="post" class="form-horizontal">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="PATCH">
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">Password Baru</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password">
                                        @if ($errors->has('password'))
                                            <span class="help-block">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password_confirm" class="col-sm-2 control-label">Konfirmasi Password Baru</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password_confirm">
                                        @if ($errors->has('password_confirm'))
                                            <span class="help-block">{{ $errors->first('password_confirm') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row xs-pt-15">
                                  <div class="col-xs-6"></div>
                                  <div class="col-xs-6">
                                    <p class="text-right">
                                      <button type="submit" class="btn btn-space btn-primary">Simpan</button>
                                      <a href="{{ url('users') }}" class="btn btn-space btn-success">Kembali</a>
                                    </p>
                                  </div>
                                </div>
                                </form>
                                </div>
              </div>
              <!-- /.card -->

            </section>
            <!-- /.content -->
          </div>
          <!-- /.content-wrapper -->
        @stop