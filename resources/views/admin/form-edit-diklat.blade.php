@extends('index')

@section('judul')
Form edit diklat
@endsection

@section('konten-header')
<h1><small>Form edit diklat</small></h1>
@endsection

@section('konten')
<div class="col-md-6">
    <div class="box box-solid box-success">
        <div class="box-header">
            <h3 class="box-title">Form edit diklat</h3>
        </div>
        <!-- form start -->
        <form role="form" action="{{ url('admin-diklat/'.$diklat->id_diklat) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
        	{{ csrf_field() }}
            <div class="box-body">
                <div class="form-group has-success">
                    <label for="judul">Judul</label>
                    <input type="judul" name="nama_diklat" class="form-control" value="{{ $diklat->nama_diklat }}">
                </div>
                <div class="form-group has-success">
                    <label for="judul">Tempat</label>
                    <input type="judul" name="tempat_diklat" class="form-control" value="{{ $diklat->tempat_diklat }}">
                </div>
                <div class="form-group has-success">
                    <label for="kategori">Nama kategori</label>
				    <select name="id_sub_ktg" class="form-control">
				    	@foreach($sub_ktg as $a)
				        <option value="{{ $a->id_sub_ktg }}">{{ $a->nama_sub_ktg }}</option>
				        @endforeach
				    </select>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection