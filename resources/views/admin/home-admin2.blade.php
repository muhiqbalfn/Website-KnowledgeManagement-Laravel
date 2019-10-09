@extends('index')

@section('judul')
diklat dan kategori
@endsection

@section('konten-header')
<h1><small>Diklat dan kategori</small></h1>
<!-- SweetAlert -->
@include('sweet::alert')
@endsection

@section('konten')
<div class="col-md-12">
    <!-- Custom Tabs -->
    <div class="box box-solid nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">Diklat & pelatihan</a></li>
            <li><a href="#tab_2" data-toggle="tab">Daftar kategori</a></li>
            <li class="box-tools pull-right">
                <button class="btn btn-primary btn-xs" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-primary btn-xs" data-widget="remove"><i class="fa fa-times"></i></button>
            </li>
        </ul>
        <div class="tab-content col-md-12 box-body">
            <div class="tab-pane active" id="tab_1">
                <!--MODUL----------------------------------------------------------------------------------------------->
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header">
                            <button onclick='loadFormDiklat()' class="btn btn-success" style="margin-left: 10px; margin-top: 10px;">
                                <i class="fa fa-plus"></i> Tambah diklat
                            </button>
                        </div>
                        <div class="box-body table-responsive">
                            <table id="dataku" class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>ID Diklat</th>
                                        <th>Nama diklat</th>
                                        <th>Nama provider</th>
                                        <th>Tempat diklat</th>
                                        <th>ID sub ktg</th>
                                        <th>Waktu</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                        <th colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!------------------------------------------------------------------------------------------------------>
            </div>
            <div class="tab-pane" id="tab_2">
                <!--LAPORAN----------------------------------------------------------------------------------------------->
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header">
                            <button onclick='loadFormSubKtg()' class="btn btn-success" style="margin-left: 10px; margin-top: 10px;">
                                <i class="fa fa-plus"></i> Tambah sub kategori
                            </button>
                        </div>
                        <div class="box-body table-responsive">
                            <table id="datatable" class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama sub kategori</th>
                                        <th>Nama kategori</th>
                                        <th>Ditambahkan</th>
                                        <th>Diubah</th>
                                        <th colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=0; ?>
                                    @foreach($sub_ktg as $a)
                                    <?php $no++ ?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $a->nama_sub_ktg }}</td>
                                        <td>{{ $a->nama_ktg }}</td>
                                        <td>{{ $a->created_at }}</td>
                                        <td>{{ $a->updated_at }}</td>
                                        <td>
                                            <a href="{{ url('admin-sub-ktg/'.$a->id_sub_ktg.'/edit') }}">
                                                <i class="glyphicon glyphicon-edit" style="color: green;"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{url('admin-sub-ktg/'.$a->id_sub_ktg)}}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="Delete">
                                                <button type="submit"onclick="return confirm('Anda yakin hapus dokumen ini ?')"
                                                        style="background-color: Transparent;
                                                                background-repeat:no-repeat;
                                                                border: none;
                                                                cursor:pointer;
                                                                overflow: hidden;
                                                                outline:none;">
                                                    <i class="glyphicon glyphicon-trash" style="color: red;"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!------------------------------------------------------------------------------------------------------>
            </div>
            
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){ 
        alert('ss');

        //GET -----------------------------------------------------------------------------------------
        var no = 0;
        var tableajax = $('#dataku').DataTable({
          responsive: true,
            ajax: '{{url("getdiklat")}}',
            columns: [
                {
                    data: null,
                    render: function(data,type,row){
                        no++;
                        return no;
                    }
                },
                { data: 'id_diklat' },
                { data: 'nama_diklat' },
                { data: 'nama_provider' },
                { data: 'tempat_diklat' },
                { data: 'id_sub_ktg' },
                { data: 'waktu' },
                { data: 'created_at' },
                { data: 'updated_at' },
                {
                  data: null,
                  render: function ( data, type, row ) {
                    var ret = '<a href="javascript:;" data="'+row.id_diklat+'" class="btn_edit"><span class="glyphicon glyphicon-edit" style="color: blue;"> </span></a>';
                        ret+= ' / ';
                        ret+= '<a href="javascript:;" data="'+row.id_diklat+'" class="btn_hapus"><span class="glyphicon glyphicon-trash" style="color: red;"></span></a>';
                    return ret;
                   }
                }
            ]
        });
        //---------------------------------------------------------------------------------------------

    });
</script>

@include('admin.form-tambah-diklat')
@include('admin.form-tambah-sub-ktg')

@endsection