<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Http\Requests\StoreSuratKeluarRequest;
use App\Http\Requests\UpdateSuratKeluarRequest;
use App\Models\DetailSM;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{

    public function index()
    {
        return view('suratkeluar.index', [
            "sk" => SuratKeluar::all()
        ]);
    }

    public function list()
    {
        return view('suratkeluar.dataSK', [
            "sk" => SuratKeluar::where('role', '!=', 1)->get()
        ]);
    }

    public function create()
    {
        return view('suratkeluar.addkeluar');
    }

    public function SKcamat()
    {
        return view('suratkeluar.SKcamat', [
            "sk" => SuratKeluar::where('role', 4)->get()
        ]);
    }

    public function SKsekcam()
    {
        return view('suratkeluar.SKsekcam', [
            "sk" => SuratKeluar::where('role', 1)->get()
        ]);
    }

    public function listSKcamat()
    {
        return view('suratkeluar.listSKcamat', [
            "sk" => SuratKeluar::where('role', 5)->orwhere('role', 6)->get()
        ]);
    }

    public function listSKsekcam()
    {
        return view('suratkeluar.listSKsekcam', [
            "sk" => SuratKeluar::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "nosurat" => "required",
            "pdf" => "mimes:pdf|file|max:10240",
            "tglsurat" => "required",
            "perihal" => "required",
            "lampiran" => "required",
            "sifat" => "required"
        ]);

        if($request->file('pdf')){
            $validatedData['pdf'] = $request->file('pdf')->store('suratkeluar');
        }

        $validatedData["kasi"] = auth()->user()->id;
        $validatedData['slug'] = Str::random(30);
        SuratKeluar::create($validatedData);
        return back()->with('success', "Surat Keluar berhasil diajukan");
    }

    public function validasiSKsekcam(Request $request)
    {
        $suratkeluar = SuratKeluar::where('id', $request->id)->first();
        $validatedData["validasisekcam"] = $request->validasisekcam;
        $validatedData["tglsekcam"] = now();
        $validatedData["catsekcam"] = $request->catsekcam;
        $validatedData["role"] = 2;

        $suratkeluar->update($validatedData);
        return back()->with('success', "Surat Keluar berhasil diajukan");
    }

    public function disposisiSK(Request $request)
    {
        $suratkeluar = SuratKeluar::where('id', $request->id)->first();
        if($suratkeluar->validasisekcam == 1){
            $validatedData["role"] = 4;
        }else{
            $validatedData["role"] = 3;
        }
        $validatedData["tgldisposisi"] = now();
        $suratkeluar->update($validatedData);
        return back()->with('success', "Surat Keluar berhasil diajukan");
    }

    public function validasiSKcamat(Request $request){
        $suratkeluar = SuratKeluar::where('id', $request->id)->first();
        $validatedData["validasicamat"] = $request->validasicamat;
        $validatedData["tglcamat"] = now();
        $validatedData["catcamat"] = $request->catcamat;
        if($request->validasicamat == 1){
            $validatedData["role"] = 5;
        }else{
            $validatedData["role"] = 6;
        }

        $suratkeluar->update($validatedData);
        return back()->with('success', "Surat Keluar berhasil diajukan");
    }
}

