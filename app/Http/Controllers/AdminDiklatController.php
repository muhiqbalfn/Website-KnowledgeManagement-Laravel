<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

//model
use App\ModulModel;
use App\LaporanModel;
use App\SertifikatModel;
use App\DiklatModel;
use App\KtgModel;
use App\SubKtgModel;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Alert;

class AdminDiklatController extends Controller
{

    //--------------------------------------------------
    public function store(Request $request){
        //validasi
        $this->validate(request(), [
            'nama_diklat' => 'required|min:5|max:50',
            'tempat_diklat' => 'required|min:5|max:50'
        ],[
            'nama_diklat.required' => 'Judul harus di isi',
            'nama_diklat.min' => 'Judul minimal 5 karakter',
            'nama_diklat.max' => 'Judul maximal 50 karakter',
            'tempat_diklat.required' => 'Tempat diklat harus di isi',
            'tempat_diklat.min' => 'Tempat diklat minimal 5 karakter',
            'tempat_diklat.max' => 'Tempat diklat maximal 50 karakter',
        ]);

        DiklatModel::create($request->all());

        Alert::success('Data diklat berhasil tersimpan.', 'Berhasil !');
        return redirect('admin2');
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

        $data['diklat'] = DiklatModel::find($id); 
        $data['sub_ktg'] = SubKtgModel::all();

        return view('admin.form-edit-diklat',$data);
    }

    public function update(Request $request, $id){
        DiklatModel::find($id)->update($request->all());

        Alert::success('Data diklat berhasil dirubah.', 'Berhasil !');
        return redirect('admin2');
    }

    //--------------------------------------------------
    public function destroy($id){
        DiklatModel::find($id)->delete();

        Alert::success('Data diklat berhasil dihapus.', 'Berhasil !');
        return redirect('admin2');
    }
}