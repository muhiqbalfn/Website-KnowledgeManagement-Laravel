<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;

class UserController extends Controller
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

        //tb_diklat
    	$data['diklat'] = DB::table('tb_diklat')
        ->join('tb_sub_ktg','tb_diklat.id_sub_ktg','=','tb_sub_ktg.id_sub_ktg')
        ->get();
        
        return view('user.main-user-diklat',$data);
    }

    public function show($id){
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
        ->where('tb_diklat.id_sub_ktg','=',$id)
        ->get();

        return view('user.main-user-diklat',$data);
    }

    public function showData($id){
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
        ->where('tb_diklat.id_diklat','=',$id)->get();

        //tb_laporan
        $data['laporan'] = DB::table('tb_laporan')
        ->join('tb_diklat','tb_laporan.id_diklat','=','tb_diklat.id_diklat')
        ->where('tb_diklat.id_diklat','=',$id)->get();

        //tb_sertifikat
        $data['sertifikat'] = DB::table('tb_sertifikat')
        ->join('tb_diklat','tb_sertifikat.id_diklat','=','tb_diklat.id_diklat')
        ->where('tb_diklat.id_diklat','=',$id)->get();

        //tb_evaluasi
        $data['eval'] = DB::table('tb_evaluasi')
        ->where('id_diklat','=',$id)->get();

        return view('user.main-user-data',$data);
    }
}