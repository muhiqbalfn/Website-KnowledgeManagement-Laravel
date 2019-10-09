@extends('index')

@section('judul')
Form edit sertifikat
@endsection

@section('konten-header')
<h1><small>Form edit sertifikat</small></h1>
@endsection

@section('konten')
<div class="col-md-6">
    <div class="box box-solid box-success">
        <div class="box-header">
            <h3 class="box-title">Form edit sertifikat</h3>
        </div>
        <!-- form start -->
        <form role="form" action="{{ url('admin-sertifikat/'.$sertifikat->id_sertifikat) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
        	{{ csrf_field() }}
            <div class="box-body">
                <div class="form-group has-success">
                    <label for="judul">Judul</label>
                    <input type="judul" name="nama_sertifikat" class="form-control" value="{{ $sertifikat->nama_sertifikat }}">
                </div>
                <div class="form-group has-success">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" name="ket_sertifikat" class="form-control" value="{{ $sertifikat->ket_sertifikat }}">
                </div>
                <div class="form-group has-success">
                    <label for="dokumen">File modul</label>
                    <input type="file" name="file_sertifikat">
                    <p class="help-block">{{ $sertifikat->file_sertifikat }}</p>
                </div>
                <div class="form-group has-success">
                    <label for="kategori">Nama diklat</label>
				    <select name="id_diklat" class="form-control">
				    	@foreach($diklat as $a)
				        <option value="{{ $a->id_diklat }}">{{ $a->nama_diklat }}</option>
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