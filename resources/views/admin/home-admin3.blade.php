@extends('index')

@section('judul')
Evaluasi diklat
@endsection

@section('konten-header')
<h1><small>Evaluasi diklat</small></h1>
<!-- SweetAlert -->
@include('sweet::alert')
@endsection

@section('konten')
<div class="col-md-12">
    <!-- Custom Tabs -->
    <div class="box box-solid nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">Laporan evaluasi</a></li>
            <li><a href="#tab_2" data-toggle="tab">Form evaluasi</a></li>
            <li class="box-tools pull-right">
                <button class="btn btn-primary btn-xs" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-primary btn-xs" data-widget="remove"><i class="fa fa-times"></i></button>
            </li>
        </ul>
        <div class="tab-content col-md-12 box-body">
            <div class="tab-pane active" id="tab_1">
                <!--EVALUASI-------------------------------------------------------------------------------------------->
                <div class="col-md-12" align="center">
                    <h4><b><i>List diklat</i></b></h4><br>
                </div>
                <div class="col-md-12">
                    @foreach($diklat_list as $a)
                    <div class="col-md-3">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>
                                    Pelatihan
                                </h3>
                                <p>
                                    {{$a->nama_diklat}}<br>
                                    ( {{$a->tempat_diklat}} )
                                </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios7-pricetag-outline"></i>
                            </div>
                            <a href="{{ url('admin-eval-grafik/'.$a->id_diklat) }}" class="small-box-footer">
                                <small class="badge pull-right badge-success" style="background-color: #32CD32;">diklat</small>
                                More info diklat &nbsp;<i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!------------------------------------------------------------------------------------------------------>
            </div>
            <div class="tab-pane" id="tab_2">
                <!--FORM------------------------------------------------------------------------------------------------>
                <div class="col-md-4">
                    <div class="box box-solid box-success">
                        <div class="box-header">
                            <h3 class="box-title">Form tambah evaluasi</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <form role="form" action="{{ url('admin-eval') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group has-success has-feedback{{ $errors->has('nama_evaluasi') ? 'has-error' : '' }}">
                                    <label class="control-label">Nama evaluasi</label>
                                    <input type="text" name="nama_evaluasi" class="form-control" placeholder="nama evaluasi" value="{{ old('nama_evaluasi') }}">
                                    @if($errors->has('nama_evaluasi'))
                                        <span class="help-block" style="color: red;"><p>{{$errors->first('nama_evaluasi')}}</p></span>
                                    @endif
                                </div>
                                <div class="form-group has-success">
                                    <label class="control-label">Pilih diklat</label>
                                    <select name="id_diklat" class="form-control">
                                        @foreach($diklat as $a)
                                        <option value="{{ $a->id_diklat }}">{{ $a->nama_diklat }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="box box-success">
                        
                        <div class="box-body table-responsive">
                            <table id="datatable" class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama keterangan evaluasi</th>
                                        <th>Nama diklat</th>
                                        <th>Ditambahkan</th>
                                        <th>Diubah</th>
                                        <th colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=0; ?>
                                    @foreach($eval as $a)
                                    <?php $no++ ?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $a->nama_evaluasi }}</td>
                                        <td>{{ $a->nama_diklat }}</td>
                                        <td>{{ $a->created_at }}</td>
                                        <td>{{ $a->updated_at }}</td>
                                        <td>
                                            <a href="{{ url('admin-eval/'.$a->id_evaluasi.'/edit') }}">
                                                <i class="glyphicon glyphicon-edit" style="color: green;"></i>
                                            </a>
                                        </td>
                                        <td class="tools">
                                            <form action="{{url('admin-eval/'.$a->id_evaluasi)}}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="Delete">
                                                <button type="submit"onclick="return confirm('Anda yakin hapus data ini ?')"
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

@endsection