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
                      <li class="breadcrumb-item"><a href="#">User Management</a></li>\
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
                  <h3 class="card-title">Form Ubah Menu</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <form action="{{ url('menu/update/'.$data->id) }}" method="post" class="form-horizontal">
                  {{csrf_field()}}
                  <input type="hidden" name="_method" value="patch">
                  <div class="form-group">
                    <label class="col-md-2">Nama Menu</label>
                    <div class="col-md-10">
                      <input type="text" name="nama_menu" value="{{ $data->nama_menu }}" class="form-control">
                      @if($errors->has('nama_menu'))
                        <span class="help-block text-danger">{{ $errors->first('nama_menu') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2">Icon</label>
                    <div class="col-md-10">
                      <input type="text" name="icon" value="{{ $data->icon }}" class="form-control">
                      @if($errors->has('icon'))
                        <span class="help-block text-danger">{{ $errors->first('icon') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2">Url</label>
                    <div class="col-md-10">
                      <input type="text" name="url" value="{{ $data->url }}" class="form-control">
                      @if($errors->has('url'))
                        <span class="help-block text-danger">{{ $errors->first('url') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2">Parent</label>
                    <div class="col-md-10">
                      <select name="parent" class="form-control select2">
                        <option value="0" <?php echo (($data->parent == 0) ? 'selected' : '')?>>sebagai parent</option>
                        @foreach ($menu as $dm)
                          <option value="{{ $dm->id }}" <?php echo (($data->parent == $dm->id) ? 'selected' : '')?>>{{ $dm->nama_menu }}</option>
                        @endforeach
                      </select>
                      @if($errors->has('parent'))
                        <span class="help-block text-danger">{{ $errors->first('parent') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="submit" name="update" value="Simpan" class="btn btn-success"> &nbsp; 
                    <a href="{{ url('menu') }}" class="btn btn-default">Batal</a>
                  </div>
                  </form>
                  
                </div>
              </div>
            </section>
            <!-- /.content -->
          </div>
          <!-- /.content-wrapper -->
          
          @section('myjsfile')
            <script type="text/javascript">
              $(function () {
                  $('.select2').select2();
              });
            </script>
          @endsection
        @stop
