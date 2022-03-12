<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\obatModel;

class obatController extends Controller
{
    public function index()
    {
        $ewos = obatModel::latest()->get();
        
        return view('obat.index', compact('ewos'));
    }

    public function create()
    {
    
        return view('obat.obatbaru');
    }

    public function edit($id)
    {
        $ewos = obatModel::findOrFail($id);
        
        return view('obat.edit', compact('ewos'));

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kodeobat' => 'required|string|max:155',
            'namaobat' => 'required',
            'stok' => 'required', 
        ]);

        $ewos = obatModel::findOrFail($id);

        $ewos->update([
            'kodeobat' => $request->kodeobat,
            'namaobat' => $request->namaobat,
            'stok' => $request->stok
        ]);

        if ($ewos) {
            return redirect()
                ->route('obat.index')
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

    public function store(Request $request)
    {
        $this->validate($request, [
            'kodeobat' => 'required|string|max:155',
            'namaobat' => 'required',
            'stok' => 'required',
        ]);

        $obat = obatModel::create([
            'kodeobat' => $request->kodeobat,
            'namaobat' => $request->namaobat,
            'stok' => $request->stok
        ]);  

        if ($obat) {
            return redirect()
                ->route('obat.index')
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
    public function destroy($id)
    {
        $ewos = obatModel::findOrFail($id);
        $ewos->delete();

        if ($ewos) {
            return redirect()
                ->route('obat.index')
                ->with([
                    'success' => 'pasien has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('obat.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}

