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
                  <h3 class="card-title">Form Ubah User</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                     <div class="row">
                        <div class="col-sm-12">  
                              <form action="{{ url('users/update/'.$data->id) }}" method="post" class="form-horizontal">
                              {{csrf_field()}}
                              <input type="hidden" name="_method" value="patch">
                              <div class="form-group">
                                  <label for="name" class="col-sm-2 control-label">Nama Lengkap</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nama_lengkap" value="{{ $data->nama_lengkap }}">
                                      @if ($errors->has('nama_lengkap'))
                                        <span class="help-block text-danger">{{ $errors->first('nama_lengkap') }}</span>
                                      @endif
                                   </div>
                              </div>
                              <div class="form-group">
                                  <label for="name" class="col-sm-2 control-label">Tempat Lahir</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control" name="tempat_lahir" value="{{ $data->tempat_lahir }}">
                                      @if ($errors->has('tempat_lahir'))
                                        <span class="help-block text-danger">{{ $errors->first('tempat_lahir') }}</span>
                                      @endif
                                   </div>
                              </div>
                              <div class="form-group">
                                  <label for="name" class="col-sm-2 control-label">Tanggal Lahir</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control tgl_lahir" name="tgl_lahir" value="{{ $data->tgl_lahir }}">
                                      @if ($errors->has('tgl_lahir'))
                                        <span class="help-block text-danger">{{ $errors->first('tgl_lahir') }}</span>
                                      @endif
                                   </div>
                              </div>
                              <div class="form-group">
                                  <label for="name" class="col-sm-2 control-label">Alamat</label>
                                  <div class="col-sm-10">
                                      <textarea name="alamat" class="form-control">{{ $data->alamat }}</textarea>
                                      @if ($errors->has('alamat'))
                                        <span class="help-block text-danger">{{ $errors->first('alamat') }}</span>
                                      @endif
                                   </div>
                              </div>
                              <div class="form-group">
                                  <label for="name" class="col-sm-2 control-label">Handphone</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control" name="handphone" value="{{ $data->handphone }}">
                                      @if ($errors->has('handphone'))
                                        <span class="help-block text-danger">{{ $errors->first('handphone') }}</span>
                                      @endif
                                   </div>
                              </div>
                              <div class="form-group">
                                  <label for="username" class="col-sm-2 control-label">Username</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control" name="username" value="{{ $data->username }}">
                                      <input type="hidden" class="form-control" name="username_old" value="{{ $data->username }}">
                                      @if ($errors->has('username'))
                                        <span class="help-block text-danger">{{ $errors->first('username') }}</span>
                                      @endif
                                   </div>
                              </div>
                              <div class="form-group">
                                  <label for="email" class="col-sm-2 control-label">Email</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control" name="email" value="{{ $data->email }}">
                                      <input type="hidden" class="form-control" name="email_old" value="{{ $data->email }}">
                                      @if ($errors->has('email'))
                                        <span class="help-block text-danger">{{ $errors->first('email') }}</span>
                                      @endif
                                   </div>
                              </div>
                              <div class="form-group">
                                  <label for="level" class="col-sm-2 control-label">Bagian</label>
                                  <div class="col-sm-4">
                                     <select class="form-control select2" name="id_bagian">
                                        <option value="">Pilih</option>
                                        @foreach ($bagian as $d_bagian) 
                                          <option value="{{ $d_bagian->id }}" <?php echo $d_bagian->id == $data->id_bagian ? 'selected' : '';?>>{{ $d_bagian->nama_bagian }}</option>
                                        @endforeach
                                     </select>
                                     @if ($errors->has('id_bagian'))
                                        <span class="help-block text-danger">{{ $errors->first('id_bagian') }}</span>
                                      @endif
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="level" class="col-sm-2 control-label">Jabatan</label>
                                  <div class="col-sm-4">
                                     <select class="form-control select2" name="id_jabatan">
                                        <option value="">Pilih</option>
                                        @foreach ($jabatan as $d_jabatan) 
                                          <option value="{{ $d_jabatan->id }}" <?php echo $d_jabatan->id == $data->id_jabatan ? 'selected' : '';?>>{{ $d_jabatan->nama_jabatan }}</option>
                                        @endforeach
                                     </select>
                                     @if ($errors->has('id_jabatan'))
                                        <span class="help-block text-danger">{{ $errors->first('id_jabatan') }}</span>
                                      @endif
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="level" class="col-sm-2 control-label">Level</label>
                                  <div class="col-sm-4">
                                     <select class="form-control select2" name="id_level">
                                        <option value="">Pilih</option>
                                        @foreach ($level as $d_level) 
                                          <option value="{{ $d_level->id }}" <?php echo $d_level->id == $data->id_level ? 'selected' : '';?>>{{ $d_level->nama_level }}</option>
                                        @endforeach
                                     </select>
                                     @if ($errors->has('id_level'))
                                        <span class="help-block text-danger">{{ $errors->first('id_level') }}</span>
                                      @endif
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="level" class="col-sm-2 control-label">Aktif</label>
                                  <div class="col-sm-4">
                                     <select class="form-control select2" name="aktif">
                                        <option value="">Pilih</option>
                                        <option value="1" <?php echo $data->aktif == 1 ? 'selected' : '';?>>Ya</option>
                                        <option value="0" <?php echo $data->aktif == 0 ? 'selected' : '';?>>Tidak</option>
                                     </select>
                                     @if ($errors->has('aktif'))
                                        <span class="help-block text-danger">{{ $errors->first('aktif') }}</span>
                                      @endif
                                  </div>
                              </div>
                              <div class="row xs-pt-15">
                                  <div class="col-xs-6">
                                    
                                  </div>
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
                </div>
              </div>
            </section>
          </div>
        @stop