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
                      <li class="breadcrumb-item active"><a href="#">Level</a></li>
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
                  <h3 class="card-title">Form Tambah Level</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <form action="{{ url('level/simpan') }}" method="post" class="form-horizontal">
                  {{csrf_field()}}
                  <div class="form-group">
                    <label class="col-md-2">Nama Level</label>
                    <div class="col-md-10">
                      <input type="text" name="nama_level" value="{{ old('nama_level') }}" class="form-control">
                      @if($errors->has('nama_level'))
                        <span class="help-block text-danger">$errors->first('nama_level')</span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="submit" name="save" value="Simpan" class="btn btn-success"> &nbsp; 
                    <a href="{{ url('level') }}" class="btn btn-default">Batal</a>
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
