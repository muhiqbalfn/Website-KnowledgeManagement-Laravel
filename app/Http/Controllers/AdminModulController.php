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

class AdminModulController extends Controller
{

    //--------------------------------------------------
    public function store(Request $request){
        //validasi
        $this->validate(request(), [
            'nama_modul' => 'required|min:3|max:30',
            'ket_modul' => 'required|min:10'
        ],[
            'nama_modul.required' => 'Judul harus di isi',
            'nama_modul.min' => 'Judul minimal 5 karakter',
            'nama_modul.max' => 'Judul maximal 30 karakter',
            'ket_modul.required' => 'Keterangan harus di isi',
            'ket_modul.min' => 'Keterangan minimal 10 karakter',
        ]);

        $user = new ModulModel;
        $user->nama_modul = Input::get('nama_modul');
        $user->ket_modul  = Input::get('ket_modul');
        $user->id_diklat  = Input::get('id_diklat');
        if (Input::hasFile('file_modul')) 
        {
            $file = Input::file('file_modul');
            $file->move(public_path().'/file', $file->getClientOriginalName());

            $user->file_modul = $file->getClientOriginalName();
            $user->type = $file->getClientMimeType();
            $user->save();

            Alert::success('Dokumen modul berhasil tersimpan.', 'Berhasil !');
            return redirect('admin');
        }
        else
        {
            Alert::error('Dokumen modul gagal tersimpan.', 'Oops... !');
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

        $data['modul'] = ModulModel::find($id); 
        $data['diklat'] = DiklatModel::all();

        return view('admin.form-edit-modul',$data);
    }

    public function update(Request $request, $id){
        $data = ModulModel::findOrFail($id);
        $data->nama_modul = $request->input('nama_modul');
        $data->ket_modul  = $request->input('ket_modul');
        $data->id_diklat  = $request->input('id_diklat');

        if (empty($request->file('file_modul')))
        {
            $data->file_modul = $data->file_modul;
        }
        else
        {
            //unlink('file/'.$data->file_modul); //menghapus file lama
            $file = Input::file('file_modul');
            $file->move(public_path().'/file', $file->getClientOriginalName());

            $data->file_modul = $file->getClientOriginalName();
            $data->type = $file->getClientMimeType();
        }
        $data->save();

        Alert::success('Dokumen modul berhasil dirubah.', 'Berhasil !');
        return redirect('admin');
    }

    //--------------------------------------------------
    public function destroy($id){
        ModulModel::find($id)->delete();

        Alert::success('Dokumen modul berhasil dihapus.', 'Berhasil !');
        return redirect('admin');
    }
}