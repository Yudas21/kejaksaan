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
                      <li class="breadcrumb-item"><a href="#">Level</a></li>
                      <li class="breadcrumb-item active">Akses</li>
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
                  <h3 class="card-title">Akses Level sebagai <strong>{{ Indras::get_level_name($id) }}</strong></h3>

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
                                @if($message = Session::get('message'))
                                   <div class="alert alert-success alert-dismissible">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                      <i class="icon fa fa-check"></i> {{ $message }}
                                    </div> 
                                @endif
                                <?php $kumpulan_menu = array();?>
                                @foreach ($access as $d_access)
                                  <?php $kumpulan_menu[] = $d_access->id_menu; ?>
                                @endforeach
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td>Menu</td>
                                                <td style="text-align: center;width:15px;">Check</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <form action="{{ url('level/update_access_level/'.$id) }}" method="post">
                                            {{csrf_field()}}
                                            <input name="id_level" type="hidden" value="{{ $id }}">
                                           <?php $parent = Indras::get_parent(); ?>
                                            @foreach ($parent as $d_parent)
                                               <tr style="background: #eee;">
                                                  <td>{{ $d_parent->nama_menu }}</td>
                                                  <td style="text-align: center;"><input type="checkbox" name="id_menu[]" value="{{ $d_parent->id }}" {{ in_array($d_parent->id, $kumpulan_menu) ? 'checked' : '' }}></td>
                                               </tr>
                                               <?php $child1 = Indras::get_child($d_parent->id); ?>
                                                     @foreach ($child1 as $d_child1)
                                                        <tr>
                                                            <td>&nbsp;&nbsp; <i class="fa fa-angle-right"></i> {{ $d_child1->nama_menu }}</td>
                                                            <td style="text-align: center;"><input type="checkbox" name="id_menu[]" value="{{ $d_child1->id }}" {{ in_array($d_child1->id, $kumpulan_menu) ? 'checked' : '' }}></td>
                                                        </tr>
                                                        <?php $child2 = Indras::get_child($d_child1->id); ?>
                                                        @foreach ($child2 as $d_child2)
                                                            <tr>
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-angle-double-right"></i> {{ $d_child2->nama_menu }}</td>
                                                                <td style="text-align: center;"><input type="checkbox" name="id_menu[]" value="{{ $d_child2->id }}" {{ in_array($d_child2->id, $kumpulan_menu) ? 'checked' : '' }}></td>
                                                            </tr>
                                                        @endforeach
                                                     @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                <button type="submit" class="btn btn-info">Simpan</button>
                                <a href="{{ url('level') }}" class="btn btn-success">Kembali</a>
                                </form>
                            </div>
                      </div>     
                </div>
              </div>
            </section>
          </div>
          <!-- @section('myjsfile')
            
          @endsection -->
          @stop