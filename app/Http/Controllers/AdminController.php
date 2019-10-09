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

class AdminController extends Controller
{
    public function index(){
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

        //tb_modul
        $data['modul'] = DB::table('tb_modul')
        ->join('tb_diklat','tb_modul.id_diklat','=','tb_diklat.id_diklat')
        ->get();

        //tb_laporan
        $data['laporan'] = DB::table('tb_laporan')
        ->join('tb_diklat','tb_laporan.id_diklat','=','tb_diklat.id_diklat')
        ->get();

        //tb_sertifikat
        $data['sertifikat'] = DB::table('tb_sertifikat')
        ->join('tb_diklat','tb_sertifikat.id_diklat','=','tb_diklat.id_diklat')
        ->get();

        //tb_diklat
        $data['diklat'] = DiklatModel::all();

    	return view('admin.home-admin1',$data);    
    }

    public function loadAdmin2(){
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

        //tb_diklat
        $data['diklat'] = DB::table('tb_diklat')
        ->join('tb_sub_ktg','tb_diklat.id_sub_ktg','=','tb_sub_ktg.id_sub_ktg')
        ->get();

        //tb_sub_ktg
        $data['sub_ktg'] = DB::table('tb_sub_ktg')
        ->join('tb_ktg','tb_sub_ktg.id_ktg','=','tb_ktg.id_ktg')
        ->get();

        //tb_ktg
        $data['ktg'] = KtgModel::all();

        return view('admin.home-admin2',$data);    
    }

    public function loadAdmin3(){
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

        //tb_diklat vs tb_sub_ktg
        $data['diklat_list'] = DB::table('tb_diklat')
        ->join('tb_sub_ktg','tb_diklat.id_sub_ktg','=','tb_sub_ktg.id_sub_ktg')
        ->get();

        //tb_evaluasi vs tb_diklat
        $data['eval'] = DB::table('tb_evaluasi')
        ->join('tb_diklat','tb_evaluasi.id_diklat','=','tb_diklat.id_diklat')
        ->get();

        //tb_diklat
        $data['diklat'] = DiklatModel::all();

        return view('admin.home-admin3',$data);    
    }

    public function getdatadiklat(){
        $data['data'] = DB::table('tb_diklat')->get();
        echo json_encode($data);
    }

}