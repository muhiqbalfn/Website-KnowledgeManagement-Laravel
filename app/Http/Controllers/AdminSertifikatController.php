<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

//model
use App\ModulModel;
use App\LaporanModel;
use App\SertifikatModel;
use App\DiklatModel;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Alert;

class AdminSertifikatController extends Controller
{

    //--------------------------------------------------
    public function store(Request $request){
        //validasi
        $this->validate(request(), [
            'nama_sertifikat' => 'required|min:3|max:30',
            'ket_sertifikat' => 'required|min:10'
        ],[
            'nama_sertifikat.required' => 'Judul harus di isi',
            'nama_sertifikat.min' => 'Judul minimal 5 karakter',
            'nama_sertifikat.max' => 'Judul maximal 30 karakter',
            'ket_sertifikat.required' => 'Keterangan harus di isi',
            'ket_sertifikat.min' => 'Keterangan minimal 10 karakter',
        ]);

        $user = new SertifikatModel;
        $user->nama_sertifikat = Input::get('nama_sertifikat');
        $user->ket_sertifikat  = Input::get('ket_sertifikat');
        $user->id_diklat  = Input::get('id_diklat');
        if (Input::hasFile('file_sertifikat')) {
            $file = Input::file('file_sertifikat');
            $file->move(public_path().'/file', $file->getClientOriginalName());

            $user->file_sertifikat = $file->getClientOriginalName();
            $user->type = $file->getClientMimeType();
            $user->save();

            Alert::success('Data sertifikat berhasil tersimpan.', 'Berhasil !');
            return redirect('admin');
        }
        else
        {
            Alert::error('Data sertifikat gagal tersimpan.', 'Oops... !');
            return redirect('admin');
        }
    }

    //--------------------------------------------------
    public function edit($id){
        //left-menu
        //-----------------------------------------
        $data['sub_ktg1'] = DB::table('tb_sub_ktg')
        ->where('id_ktg','=','1')->get();
        //-----------------------------------------
        $data['sub_ktg2'] = DB::table('tb_sub_ktg')
        ->where('id_ktg','=','2')->get();
        //-----------------------------------------
        $data['sub_ktg3'] = DB::table('tb_sub_ktg')
        ->where('id_ktg','=','3')->get();
        //-----------------------------------------
        $data['sub_ktg4'] = DB::table('tb_sub_ktg')
        ->where('id_ktg','=','4')->get();
        //-----------------------------------------

        $data['sertifikat'] = SertifikatModel::find($id); 
        $data['diklat'] = DiklatModel::all();

        return view('admin.form-edit-sertifikat',$data);
    }

    public function update(Request $request, $id){
        $data = SertifikatModel::findOrFail($id);
        $data->nama_sertifikat = $request->input('nama_sertifikat');
        $data->ket_sertifikat  = $request->input('ket_sertifikat');
        $data->id_diklat  = $request->input('id_diklat');

        if (empty($request->file('file_sertifikat')))
        {
            $data->file_sertifikat = $data->file_sertifikat;
        }
        else
        {
            //unlink('file/'.$data->file_modul); //menghapus file lama
            $file = Input::file('file_sertifikat');
            $file->move(public_path().'/file', $file->getClientOriginalName());

            $data->file_sertifikat = $file->getClientOriginalName();
            $data->type = $file->getClientMimeType();
        }
        $data->save();

        Alert::success('Data sertifikat berhasil dirubah.', 'Berhasil !');
        return redirect('admin');
    }

    //--------------------------------------------------
    public function destroy($id){
        SertifikatModel::find($id)->delete();

        Alert::success('Data sertifikat berhasil dihapus.', 'Berhasil !');
        return redirect('admin');
    }
}