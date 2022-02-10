<?php

namespace App\Http\Controllers;
use App\Models\pendaftaranModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class pendaftaranController extends Controller
{
    public function index()
    {
        $pendaftaran = pendaftaranModel::latest()->get();
        return view('pendaftaran', compact('pendaftaran'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nomor' => 'required|string|max:155',
            'nama' => 'required',
            'alamat' => 'required',
            'usia' => 'required',
            'jeniskelamin' => 'required',
            'keluhan' => 'required',
        ]);

        $pendaftaran = pendaftaranModel::create([
            'nomor' => $request->nomor,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'usia' => $request->usia,
            'jeniskelamin' => $request->jeniskelamin,
            'keluhan' => Str::keluhan($request->keluhan)
        ]);  

        if ($pendaftaran) {
            return redirect()
                ->route('pendaftaran')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }
    
}