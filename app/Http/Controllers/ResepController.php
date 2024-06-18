<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorit;



class ResepController extends Controller
{

   
    
    

    // Menampilkan daftar resep
    public function index()
    {
        $reseps = Resep::all();
        return view('reseps.index', compact('reseps'));
    }

    // Menampilkan form untuk membuat resep baru
    public function create()
    {
        return view('reseps.create');
    }

    // Menyimpan resep baru ke dalam database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_masakan' => 'required|string|max:255',
            'penjelasan_singkat' => 'required|string',
            'berapa_sajian' => 'required|integer',
            'waktu_memasak' => 'required|string',
            'kategori' => 'required|string',
            'rincian_bahan' => 'required|array',
            'cara_memasak' => 'required|array',
            'foto_makanan' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $validatedData['rincian_bahan'] = implode(', ', $validatedData['rincian_bahan']);
        $validatedData['cara_memasak'] = implode(', ', $validatedData['cara_memasak']);
    
        if ($request->hasFile('foto_makanan')) {
            $imageName = time().'.'.$request->foto_makanan->extension();  
            $request->foto_makanan->move(public_path('images'), $imageName);
            $validatedData['foto_makanan'] = $imageName;
        }
    
        Resep::create($validatedData);
    
        return redirect()->route('reseps.index')
                     ->with('success', 'Resep berhasil ditambahkan');
    }
    


    // Menampilkan form untuk mengedit resep
    public function edit(Resep $resep)
    {
        return view('reseps.edit', compact('resep'));
    }

    // Memperbarui resep yang ada di database
    public function update(Request $request, Resep $resep)
    {
        $request->validate([
            'foto_makanan' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_masakan' => 'required|string|max:255',
            'penjelasan_singkat' => 'required|string',
            'berapa_sajian' => 'required|string|max:255',
            'waktu_memasak' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'rincian_bahan' => 'required|string',
            'cara_memasak' => 'required|string',
        ]);

        if ($request->hasFile('foto_makanan')) {
            // Hapus gambar lama
            if ($resep->foto_makanan) {
                Storage::delete('public/images/'.$resep->foto_makanan);
            }
            // Simpan gambar baru
            $imageName = time().'.'.$request->foto_makanan->extension();
            $request->foto_makanan->storeAs('public/images', $imageName);
            $resep->foto_makanan = $imageName;
        }

        $resep->update([
            'nama_masakan' => $request->nama_masakan,
            'penjelasan_singkat' => $request->penjelasan_singkat,
            'berapa_sajian' => $request->berapa_sajian,
            'waktu_memasak' => $request->waktu_memasak,
            'kategori' => $request->kategori,
            'rincian_bahan' => $request->rincian_bahan,
            'cara_memasak' => $request->cara_memasak,
        ]);

        return redirect()->route('dashboard')->with('success', 'Resep berhasil diperbarui.');
    }

    // Menghapus resep dari database
    public function destroy(Resep $resep)
    {
        if ($resep->foto_makanan) {
            Storage::delete('public/images/'.$resep->foto_makanan);
        }
        $resep->delete();
        return redirect()->route('dashboard')->with('success', 'Resep berhasil dihapus.');
    }

    public function show($id)
{
    $resep = Resep::findOrFail($id);
    return view('reseps.show', compact('resep'));
} 




  

    
    
}
