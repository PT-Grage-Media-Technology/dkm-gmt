<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\produkhewan;

class produkhewancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produkhewan = produkhewan::all();
        return view('admin.produkhewan', compact('produkhewan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.produkhewan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'berat' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload gambar
        $imagePath = $request->file('image')->store('produk_images', 'public');

        // Simpan data produk
        $produkhewan = new produkhewan();
        $produkhewan->name = $request->name;
        $produkhewan->price = $request->price;
        $produkhewan->berat = $request->berat;
        $produkhewan->image = $imagePath;
        $produkhewan->save();

        return redirect()->route('produkhewan')->with('success', 'Produk berhasil disimpan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produkhewan = produkhewan::findOrFail($id);
        return view('admin.produkhewan.show', compact('produkhewan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produkhewan = produkhewan::findOrFail($id);
        return view('admin.produkhewan.edit', compact('produkhewan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'berat' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $produkhewan = produkhewan::findOrFail($id);

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            Storage::disk('public')->delete($produkhewan->image);

            // Upload gambar baru
            $imagePath = $request->file('image')->store('produk_images', 'public');
            $produkhewan->image = $imagePath;
        }

        $produkhewan->name = $request->name;
        $produkhewan->price = $request->price;
        $produkhewan->berat = $request->berat;
        $produkhewan->save();

        return redirect()->route('produkhewan')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $produkhewan = produkhewan::findOrFail($id);

        // Hapus gambar terkait
        Storage::disk('public')->delete($produkhewan->image);

        // Hapus produk
        $produkhewan->delete();

        return redirect()->route('produkhewan')->with('success', 'Produk berhasil dihapus.');
    }

    public function showadmin()
    {
        $produkhewan = produkHewan::all(); // Assuming produkHewan is the model for your products
        return view('admin.home', compact('produkhewan'));
    }

}