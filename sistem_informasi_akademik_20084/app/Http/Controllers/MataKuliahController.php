<?php

namespace App\Http\Controllers;

use App\Models\Mata_kuliah;
use Illuminate\Http\Request;



class MataKuliahController extends Controller
{
    public function index(){
        $mata_kuliahs= Mata_kuliah::all();
        return view('mata_kuliah.index',[
            'mata_kuliahs' => $mata_kuliahs
        ]);
    }
    public function create()
    {
        return view('mata_kuliah.create');
    }

   
    public function store(Request $request, Mata_kuliah $mata_kuliah)
    {
        $validate= $request->validate(
           [
            'kode_mk' => 'required',
            'nama_mk' => 'required|max:30',
           ]
        );
        
        Mata_kuliah::create($validate);

        return redirect()->route('mata_kuliahs.index')->with('message',"Data {$validate['nama_mk']} berhasil ditambahkan");
    }

    public function edit(Mata_kuliah $mata_kuliah){
        return view('mata_kuliah.edit',[
            'mata_kuliah' => $mata_kuliah
        ]);
    }


    public function update(Request $request, Mata_kuliah $mata_kuliah){
        $validate= $request->validate(
            [
             'kode_mk' => 'required',
             'nama_mk' => 'required|max:30',
            ]
         );

         Mata_kuliah::where('id', $mata_kuliah->id)->update($validate);
         return redirect()->route('mata_kuliahs.index')->with('message',"Data {$validate['nama_mk']} berhasil diedit");
    }

    public function destroy(Mata_kuliah $mata_kuliah){
        Mata_kuliah::destroy($mata_kuliah->id);
        return redirect()->route('mata_kuliahs.index')->with('message',"Data $mata_kuliah->nama_mk berhasil dihapus");

    }

    
}
