<?php

namespace App\Http\Controllers;
use App\Models\pasienModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class pendaftaranController extends Controller
{

    public function index()
    {
        $ewos = pasienModel::latest()->get();
        
        return view('pasien.index', compact('ewos'));
    }
    public function create()
    {
    
        return view('pasien.creatependaftaran');
    }

    public function edit($id)
    {
        $ewos = pasienModel::findOrFail($id);
        
        return view('pasien.edit', compact('ewos'));

    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nomor' => 'required|string|max:155',
            'nama' => 'required',
            'alamat' => 'required',
            'jeniskelamin' => 'required',
           
            'usia' => 'required',
        ]);

        $pasien = pasienModel::create([
            'nomor' => $request->nomor,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jeniskelamin' => $request->jeniskelamin,
            'keluhan' => $request->keluhan,
            'usia' => $request->usia
        ]);  

        if ($pasien) {
            return redirect()
                ->route('pasien.index')
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
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nomor' => 'required|string|max:155',
            'nama' => 'required',
            'alamat' => 'required',
            'jeniskelamin' => 'required',  
            'usia' => 'required',
        ]);

        $ewos = pasienModel::findOrFail($id);

        $ewos->update([
            'nomor' => $request->nomor,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jeniskelamin' => $request->jeniskelamin,
            'keluhan' => $request->keluhan,
            'usia' => $request->usia
        ]);

        if ($ewos) {
            return redirect()
                ->route('pasien.index')
                ->with([
                    'success' => 'Post has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

    public function destroy($id)
    {
        $ewos = pasienModel::findOrFail($id);
        $ewos->delete();

        if ($ewos) {
            return redirect()
                ->route('pasien.index')
                ->with([
                    'success' => 'pasien has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('pasien.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
    
}