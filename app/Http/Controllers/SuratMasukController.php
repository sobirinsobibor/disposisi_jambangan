<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Http\Requests\StoreSuratMasukRequest;
use App\Http\Requests\UpdateSuratMasukRequest;
use App\Models\DetailSM;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{

    public function index()
    {
        return view('suratmasuk.index', [
            "dsm" => DetailSM::where('kasi', auth()->user()->id)->latest()->get()
        ]);
    }

    public function list()
    {
        return view('suratmasuk.dataSM', [
            "sm" => SuratMasuk::orderBy('created_at', 'desc')->get()
        ]);
    }

    public function create()
    {
        return view('suratmasuk.addmasuk');
    }

    public function SMcamat()
    {
        return view('suratmasuk.SMcamat', [
            "sm" => SuratMasuk::where('role', 1)->latest()->get(),
            "pegawai" => User::where('roleid', 5)->latest()->get()
        ]);
    }

    public function SMsekcam()
    {
        return view('suratmasuk.SMsekcam', [
            "sm" => SuratMasuk::where('role', 2)->latest()->get()
        ]);
    }

    public function listSMcamat()
    {
        return view('suratmasuk.listSMcamat', [
            "sm" => SuratMasuk::orderBy('created_at', 'desc')->get()
        ]);
    }

    public function listSMsekcam()
    {
        return view('suratmasuk.listSMsekcam', [
            "sm" => SuratMasuk::where('role', '!=', 1)->latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "nosurat" => "required",
            "pdf" => "mimes:pdf|file|max:10240",
            "tglsurat" => "required",
            "tglditerima" => "required",
            "instansi" => "required",
            "perihal" => "required",
            "lampiran" => "required",
            "status" => "required",
            "sifat" => "required"
        ]);

        if($request->file('pdf')){
            $validatedData['pdf'] = $request->file('pdf')->store('suratmasuk');
        }

        $validatedData["noregis"] = $request->noregis;
        $validatedData['slug'] = Str::random(30);
        SuratMasuk::create($validatedData);
        return back()->with('success', "Surat Masuk berhasil ditambahkan");
    }

    public function validasiSMcamat(Request $request)
    {
        $suratmasuk = SuratMasuk::where('id', $request->suratmasuk)->first();
        if($request->validasi == 1){
            foreach($request->kasi as $k){
                $create["kasi"] = $k;
                $create["suratmasuk"] = $suratmasuk->id;
                DetailSM::create($create);
            }
        }
        $validatedData["validasi"] = $request->validasi;
        $validatedData["catcamat"] = $request->catcamat;
        $validatedData["tglcamat"] = now();
        $validatedData["role"] = 2;

        $suratmasuk->update($validatedData);
        return back()->with('success', "Perubahan berhasil disimpan");
    }

    public function validasiSMsekcam(Request $request){
        $suratmasuk = SuratMasuk::where('id', $request->id)->first();

        if($suratmasuk->validasi == 1){
            $validatedData["role"] = 3;
        }else{
            $validatedData["role"] = 4;
        }

        $suratmasuk->update($validatedData);
        return back()->with('success', "Perubahan berhasil disimpan");
    }

    public function disposisiSM(Request $request)
    {
        $suratmasuk = SuratMasuk::where('id', $request->id)->first();
        $validatedData["role"] = 5;
        $validatedData["tgldisposisi"] = now();
        $suratmasuk->update($validatedData);
        return back()->with('success', "Perubahan berhasil disimpan");
    }
}
