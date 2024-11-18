<?php

namespace App\Http\Controllers;

use App\Models\JenisHewanQurban;
use Illuminate\Http\Request;


class JenisHewanQurbanController extends Controller
{
    public function index(Request $request){
        return view("jenis_hewan.index");
    }

    public function data(){
        $jenisHewan=JenisHewanQurban::select()->get();
            
        $data=[
            "data" => $jenisHewan
        ];

        return response()->json($data);
    }

    public function create(){

    }

    public function show(){

    }

    public function edit(){

    }

    public function update(){

    }

    public function destroy(){
        
    }
}
