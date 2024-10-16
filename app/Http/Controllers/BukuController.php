<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Support\Facades\DB;
// use illuminate\Container\Attributes\DB;
use Illuminate\Support\Facades\Storage;
// use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('buku/index', [
            'bukus' => DB::table('bukus')->get() 
        // return view('buku/index', [
        //     'bukus' => Buku::all() // Fetch data as Eloquent models
    ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku/create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBukuRequest $request)
    {
        $ValidatedData = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'kategori' => 'required',
            'sampul' => 'required|image|file|max:2048',
        ]);
        if ($request->file('sampul')) {
            $ValidatedData['sampul'] = $request->file('sampul')->store('/sampul-buku');
        }
        Buku::create($ValidatedData);
        return redirect('/buku');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    $test = DB::table('bukus')->where('id', $id)->get();
    return view('buku/update',[
        'buku' => $test[0]
    ]);  //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBukuRequest $request, $id)
    {
        $validatedData = $request->validate([
            
            'judul' => 'required',
            'penulis' => 'required',
            'kategori' => 'required',
            'sampul' => 'image|file|max:2048',
        ]);
        
        if ($request->file('sampul')) {
            if ($request->sampulLama) {
                Storage::delete($request->sampulLama);
            }
            $validatedData['sampul'] = $request->file('sampul')->store('/sampul-buku');
        }
        
        Buku::where('id', $id)->update($validatedData);
        return redirect('/buku');
    }   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    $test = DB::table('bukus')->select('sampul')
        ->where('id', $id)
        ->get();

    if ($test[0]->sampul) {
    Storage::delete($test[0]->sampul);
    }

    Buku::destroy($id);
    return redirect('/buku');
        //
    }
}
