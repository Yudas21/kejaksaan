<!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-dark-warning">
    <!-- Brand Logo -->
    <a href="#" class="brand-link bg-white">
      <img src="{{ asset('logo.png') }}"
           alt="E-Office"
           class="brand-image img-fluid">
      <span class="brand-text" style="text-align: center;">E - Office</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="border-bottom: 0px solid #daddf6;">
        <div class="image">
          <?php $data_user = Indras::data_user(session('username')); ?>
         
          <img src="{{ $data_user->photo == '' || $data_user->photo == NULL ? url('/public/avatar.png') : url('/storage/photo/'.$data_user->photo) }}" alt="Avatar" class="img-circle elevation-2" style="height: 35px !important;width: 35px !important;">
        </div>
        <div class="info">
          <a href="{{ url('admin/profile') }}" class="d-block" style="color:#daddf6;">
             @if (session('nama')!='')    
                    {{ session('nama') }}
             @endif
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php 
                $parent = Indras::get_parent();
                $userid = session('userid');
                $userlevel = session('id_level');
                $mymenu = array(); 
                $mymenu = Indras::get_my_menu($userlevel);
          ?>
                @foreach ($parent as $mp)
                   @if(in_array($mp->id, $mymenu))
                        <?php $nc = Indras::get_count_child($mp->id);?>
                          @if ($nc > 0)
                            <li class="nav-item has-treeview"> 
                            <a href="#" class="nav-link"><i class="{{ $mp->icon }}"></i>
                            <p>{{ $mp->nama_menu }} <i class="right fa fa-angle-left"></i></p></a>
                            <ul class="nav nav-treeview">
                                <?php $child = Indras::get_child($mp->id); ?>
                                @foreach ($child as $mc)
                                  @if (in_array($mc->id, $mymenu))

                                    <?php $nd = Indras::get_count_child($mc->id); ?>
                                    @if ($nd > 0)
                                      <li class="nav-item has-treeview"> 
                                        <a href="#" class="nav-link" style="color: #daddf6;">
                                        <p>{{ $mc->nama_menu }} <i class="right fa fa-angle-left"></i></p></a>
                                        <ul class="nav nav-treeview">
                                          <?php $child2 = Indras::get_child($mc->id); ?>
                                          @foreach ($child2 as $md)
                                            @if (in_array($md->id, $mymenu))
                                              <li class="nav-item"><a href="<?php echo $md->url != '' ? url($md->url) : $md->url ;?>" class="nav-link">&nbsp;&nbsp; {{ $md->nama_menu }}</a></li>
                                            @endif      
                                          @endforeach
                                        </ul>
                                      </li>
                                    @else
                                      <li class="nav-item"><a href="<?php echo $mc->url != '' ? url($mc->url) : $mc->url ;?>" class="nav-link">{{ $mc->nama_menu }}</a></li>
                                    @endif

                                  @endif
                                @endforeach
                            </ul>
                          @else
                            <li class="nav-item"> <a href="<?php echo $mp->url != '' ? url($mp->url) : $mp->url ;?>" class="nav-link"><i class="{{ $mp->icon }}"></i> <p>{{ $mp->nama_menu }}</p></a></li>
                          @endif
                   @endif
                @endforeach

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>