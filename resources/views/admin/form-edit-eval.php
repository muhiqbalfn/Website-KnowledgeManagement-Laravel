@extends('index')

@section('judul')
Form edit evaluasi
@endsection

@section('konten-header')
<h1><small>Form edit evaluasi</small></h1>
@endsection

@section('konten')
<div class="col-md-6">
    <div class="box box-solid box-success">
        <div class="box-header">
            <h3 class="box-title">Form edit evaluasi</h3>
        </div>
        <!-- form start -->
        <form role="form" action="{{ url('admin-eval/'.$eval->id_evaluasi) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
        	{{ csrf_field() }}
            <div class="box-body">
                <div class="form-group has-success">
                    <label for="judul">Nama evaluasi</label>
                    <input type="judul" name="nama_evaluasi" class="form-control" value="{{ $eval->nama_evaluasi }}">
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