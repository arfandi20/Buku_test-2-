<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\kategori;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd ("HAIII");
        $data = buku::all();
        // $data = DB:: select('SELECT buku.id, buku.isbn, buku.judul, buku.ketagori_id, buku.sinopsis, buku.penerbit, buku.cover, buku.status, kategori.nama, buku.updated_at FROM buku JOIN kategori ON buku.ketagori_id=kategori.id');
        return view ('buku.tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori  = kategori::all();
        return view ('buku.tambah', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request-> validate([
            'isbn' => 'required|string',
            'judul' => 'required|string',
            'kategori' => 'required|integer',
            'sinopsis' => 'required|string',
            'penerbit' => 'required|string',
            'cover' => 'required|image|max:10000|mimes:jpg,jpeg,',
        ]);

        $file = $request->file('cover')->store('cover');

        buku :: create (
            [
             'isbn' => $request ->isbn,
             'judul' => $request -> judul,
             'kategori_id' => $request -> kategori,
             'sinopsis' => $request -> sinopsis,
             'penerbit' => $request -> penerbit,
             'cover' => $file,
          
        ]);
 
         return redirect ('/buku');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = buku :: findorFail ($id);
        
        $kategori = kategori :: all();

        return view ('buku.edit', compact ('data', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = buku :: findOrFail($id);
        
        $data ->update([
            'isbn' => $request ->isbn,
             'judul' => $request -> judul,
             'kategori_id' => $request -> kategori,
             'sinopsis' => $request -> sinopsis,
             'penerbit' => $request -> penerbit,
             'status' => $request-> status,
             ]);
        
             if ($request ->file('cover') != null){
                $file = $request->file('cover')->store('cover');
                $data ->update([
                    'cover' => $file]);
                }
             else {
                $data->update([
                    'cover' =>$data->cover 
                ]);
    
            }
    
            return redirect('/buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = buku::findorFail($id);
        $data->delete();
        Storage::delete([$data->cover]);
        return redirect('/buku')->with('success', 'Data berhasil Dihapus');
    }

    public function beranda ()
    {
    $data = buku::where('status', 'aktif')->get();

    return view('beranda', compact('data'));
    }
}
