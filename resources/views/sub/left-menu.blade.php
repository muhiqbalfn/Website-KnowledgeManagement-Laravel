<!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('img/avatar5.png') }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Hello, 
                    @if (Auth::guest())
                        Karyawan
                    @else
                        {{ Auth::user()->name }}
                    @endif
                </p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

        <ul class="sidebar-menu">
            <li class="active">
                <a href="{{url('/home')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            @if (Auth::guest())
            @else
            @if(Auth::user()->level == 'admin')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Admin</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/admin') }}">
                        <i class="fa fa-angle-double-right"></i> Dokumen dan evaluasi</a>
                    </li>
                    <li><a href="{{ url('/admin2') }}">
                        <i class="fa fa-angle-double-right"></i> Diklat dan kategori</a>
                    </li>
                    <li><a href="{{ url('/admin3') }}">
                        <i class="fa fa-angle-double-right"></i> Evaluasi</a>
                    </li>
                </ul>
            </li>
            @endif
            @endif
            <!-- menu -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Kompetensi inti</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @foreach($sub_ktg1 as $b)
                    <li><a href="{{ url('user-diklat/'.$b->id_sub_ktg) }}">
                        <i class="fa fa-angle-double-right"></i> {{$b->nama_sub_ktg}}</a>
                    </li>
                    @endforeach
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Komp. peran umum</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @foreach($sub_ktg2 as $b)
                    <li><a href="{{ url('user-diklat/'.$b->id_sub_ktg) }}">
                        <i class="fa fa-angle-double-right"></i> {{$b->nama_sub_ktg}}</a>
                    </li>
                    @endforeach
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Komp. peran spesifik</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @foreach($sub_ktg3 as $b)
                    <li><a href="{{ url('user-diklat/'.$b->id_sub_ktg) }}">
                        <i class="fa fa-angle-double-right"></i> {{$b->nama_sub_ktg}}</a>
                    </li>
                    @endforeach
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Komp. teknis umum</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @foreach($sub_ktg4 as $b)
                    <li><a href="{{ url('user-diklat/'.$b->id_sub_ktg) }}">
                        <i class="fa fa-angle-double-right"></i> {{$b->nama_sub_ktg}}</a>
                    </li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>