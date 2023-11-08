<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index', [
            "pegawai" => User::all()
        ]);
    }

    public function addpegawai(){
        return view('dashboard.addpegawai');
    }

    public function postpegawai(Request $request){
        $validatedData = $request->validate([
            "name" => "required",
            "nip" => "required|unique:users",
            "roleid" => "required",
            "jabatan" => "required"
        ]);

        $validatedData["password"] = bcrypt('purwosari');
        $pegawai = User::create($validatedData);
        return back()->with('success', "Pegawai baru berhasil ditambahkan");
    }
}
