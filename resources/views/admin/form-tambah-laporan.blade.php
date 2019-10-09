<div class="modal" id="modal-form-laporan" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
                <h3 class="modal-title"></h3>
            </div>

            <div class="modal-body">
                <!-- -------------------------------------------------------------------------------------------- -->
                <form role="form" action="{{ url('admin-laporan') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group has-success has-feedback{{ $errors->has('nama_laporan') ? 'has-error' : '' }}">
                            <label class="control-label">Judul laporan</label>
                            <input type="text" name="nama_laporan" class="form-control" placeholder="Judul laporan" value="{{ old('nama_laporan') }}" required>
                            @if($errors->has('nama_laporan'))
                                <span class="help-block" style="color: red;"><p>{{$errors->first('nama_laporan')}}</p></span>
                            @endif
                        </div>
                        <div class="form-group has-success has-feedback{{ $errors->has('ket_laporan') ? 'has-error' : '' }}">
                            <label class="control-label">Keterangan laporan</label>
                            <textarea name="ket_laporan" class="form-control" placeholder="Keterangan laporan" value="{{ old('ket_laporan') }}" required></textarea>
                            @if($errors->has('ket_laporan'))
                                <span class="help-block" style="color: red;"><p>{{$errors->first('ket_laporan')}}</p></span>
                            @endif
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label">File laporan</label>
                            <input type="file" name="file_laporan">
                            <p class="help-block">Upload file berupa pdf, doc, xlc, jpg, png.</p>
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label">Nama diklat</label>
                            <select name="id_diklat" class="form-control">
                                @foreach($diklat as $a)
                                <option value="{{ $a->id_diklat }}">{{ $a->nama_diklat }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Upload</button>
                    </div>
                </form>
                <!-- -------------------------------------------------------------------------------------------- -->
            </div>
        </div>
    </div>
</div>
