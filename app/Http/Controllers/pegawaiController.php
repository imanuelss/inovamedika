<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\pegawaiModel;
use Barryvdh\DomPDF\Facade\Pdf;


class pegawaiController extends Controller
{
    public function index()
    {
        $ewos = pegawaiModel::latest()->get();
        
        return view('pegawai.index', compact('ewos'));
    }

    public function printpdf()
    {
       $ewos = pegawaiModel::latest()->get();
        
        return view('pegawai.printpdf', compact('ewos'));
        // $ewos = ['title' => 'printpdf'];

        // $pdf = PDF::loadView('pegawai.printpdf', $ewos);
        // return $pdf->stream();
    }
    

    public function create()
    {
    
        return view('pegawai.pegawaibaru');
    }

    
    public function edit($id)
    {
        $ewos = pegawaiModel::findOrFail($id);
        
        return view('pegawai.edit', compact('ewos'));

    }

    

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nip' => 'required|string|max:155',
            'nama' => 'required',
            'alamat' => 'required',
            'posisijabatan' => 'required',  
        ]);

        $ewos = pegawaiModel::findOrFail($id);

        $ewos->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'posisijabatan' => $request->posisijabatan
        ]);

        if ($ewos) {
            return redirect()
                ->route('pegawai.index')
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
            'nip' => 'required|string|max:155',
            'nama' => 'required',
            'alamat' => 'required',
            'posisijabatan' => 'required',
        ]);

        $pegawai = pegawaiModel::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'posisijabatan' => $request->posisijabatan
        ]);  

        if ($pegawai) {
            return redirect()
                ->route('pegawai.index')
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

    // public function print(Request $request)
    // {
    //     $this->validate($request, [
    //         'nip' => 'required|string|max:155',
    //         'nama' => 'required',
    //         'alamat' => 'required',
    //         'posisijabatan' => 'required',
    //     ]);

    //     $pegawai = pegawaiModel::print([
    //         'nip' => $request->nip,
    //         'nama' => $request->nama,
    //         'alamat' => $request->alamat,
    //         'posisijabatan' => $request->posisijabatan
    //     ]);  

    //     if ($pegawai) {
    //         return redirect()
    //             ->route('pegawai.cetakpegawai')
    //             ->with([
    //                 'success' => 'New post has been created successfully'
    //             ]);
    //     } else {
    //         return redirect()
    //             ->back()
    //             ->withInput()
    //             ->with([
    //                 'error' => 'Some problem occurred, please try again'
    //             ]);
    //     }
    // } 

       public function destroy($id)
    {
        $ewos = pegawaiModel::findOrFail($id);
        $ewos->delete();

        if ($ewos) {
            return redirect()
                ->route('pegawai.index')
                ->with([
                    'success' => 'pasien has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('pegawai.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}