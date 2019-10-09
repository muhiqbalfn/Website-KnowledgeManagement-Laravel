@extends('index')

@section('judul')
dokumen dan evaluasi
@endsection

@section('konten-header')
<h1><small>Dokumen dan evaluasi</small></h1>
<!-- SweetAlert -->
@include('sweet::alert')
@endsection

@section('konten')
<div class="col-md-12">
    <!-- Custom Tabs -->
    <div class="box box-solid nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">Modul Pelatihan</a></li>
            <li><a href="#tab_2" data-toggle="tab">Laporan Hasil Pelatihan</a></li>
            <li><a href="#tab_3" data-toggle="tab">Sertifikat Pelatihan</a></li>
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
                            <button onclick='loadFormModul()' class="btn btn-success" style="margin-left: 10px; margin-top: 10px;">
                                <i class="fa fa-plus"></i> Tambah modul
                            </button>
                        </div>
                        <div class="box-body table-responsive">
                            <table id="datatable" class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Judul modul</th>
                                        <th>Keterangan modul</th>
                                        <th>File modul</th>
                                        <th>Judul diklat</th>
                                        <th>Ditambahkan</th>
                                        <th>Diubah</th>
                                        <th colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=0; ?>
                                    @foreach($modul as $a)
                                    <?php $no++ ?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $a->nama_modul }}</td>
                                        <td>{{ $a->ket_modul }}</td>
                                        <td><span class="label label-success">{{ $a->file_modul }}</span></td>
                                        <td>{{ $a->nama_diklat }}</td>
                                        <td>{{ $a->created_at }}</td>
                                        <td>{{ $a->updated_at }}</td>
                                        <td>
                                            <a href="{{ url('admin-modul/'.$a->id_modul.'/edit') }}">
                                                <i class="glyphicon glyphicon-edit" style="color: green;"></i>
                                            </a>
                                        </td>
                                        <td class="tools">
                                            <form action="{{url('admin-modul/'.$a->id_modul)}}" method="post">
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
            <div class="tab-pane" id="tab_2">
                <!--LAPORAN----------------------------------------------------------------------------------------------->
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header">
                            <button onclick='loadFormLaporan()' class="btn btn-success" style="margin-left: 10px; margin-top: 10px;">
                                <i class="fa fa-plus"></i> Tambah laporan
                            </button>
                        </div>
                        <div class="box-body table-responsive">
                            <table id="datatable" class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Judul laporan</th>
                                        <th>Keterangan laporan</th>
                                        <th>File laporan</th>
                                        <th>Judul diklat</th>
                                        <th>Ditambahkan</th>
                                        <th>Diubah</th>
                                        <th colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=0; ?>
                                    @foreach($laporan as $a)
                                    <?php $no++ ?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $a->nama_laporan }}</td>
                                        <td>{{ $a->ket_laporan }}</td>
                                        <td><span class="label label-primary">{{ $a->file_laporan }}</span></td>
                                        <td>{{ $a->nama_diklat }}</td>
                                        <td>{{ $a->created_at }}</td>
                                        <td>{{ $a->updated_at }}</td>
                                        <td>
                                            <a href="{{ url('admin-laporan/'.$a->id_laporan.'/edit') }}">
                                                <i class="glyphicon glyphicon-edit" style="color: green;"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{url('admin-laporan/'.$a->id_laporan)}}" method="post">
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
            <div class="tab-pane" id="tab_3">
                <!--SERTIFIKAT----------------------------------------------------------------------------------------------->
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header">
                            <button onclick='loadFormSertifikat()' class="btn btn-success" style="margin-left: 10px; margin-top: 10px;">
                                <i class="fa fa-plus"></i> Tambah sertifikat
                            </button>
                        </div>
                        <div class="box-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Judul sertifikat</th>
                                        <th>Keterangan sertifikat</th>
                                        <th>File sertifikat</th>
                                        <th>Judul diklat</th>
                                        <th>Ditambahkan</th>
                                        <th>Diubah</th>
                                        <th colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=0; ?>
                                    @foreach($sertifikat as $a)
                                    <?php $no++ ?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $a->nama_sertifikat }}</td>
                                        <td>{{ $a->ket_sertifikat }}</td>
                                        <td><span class="label label-warning">{{ $a->file_sertifikat }}</span></td>
                                        <td>{{ $a->nama_diklat }}</td>
                                        <td>{{ $a->created_at }}</td>
                                        <td>{{ $a->updated_at }}</td>
                                        <td>
                                            <a href="{{ url('admin-sertifikat/'.$a->id_sertifikat.'/edit') }}">
                                                <i class="glyphicon glyphicon-edit" style="color: green;"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{url('admin-sertifikat/'.$a->id_sertifikat)}}" method="post">
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

@include('admin.form-tambah-modul')
@include('admin.form-tambah-laporan')
@include('admin.form-tambah-sertifikat')

@endsection