<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Buku;
use PDF;


class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {//search dari admin
        $search = $request->query('search');
    
        $bukus = Buku::when($search, function ($query, $search) {
                        return $query->where('judul', 'like', '%'.$search.'%')
                                    ->orWhere('pengarang', 'like', '%'.$search.'%')
                                    ->orWhere('penerbit', 'like', '%'.$search.'%');
                    })
                    ->paginate(10);
    
        return view('buku.index', compact('bukus', 'search'));
    }
    //search dan menampilkan data dari user
    public function indexPublic(Request $request)
    {
    $search = $request->get('search');

    $buku = Buku::where('judul', 'like', "%$search%")
        ->orWhere('pengarang', 'like', "%$search%")
        ->orWhere('penerbit', 'like', "%$search%")
        ->orderBy('created_at', 'desc')
        ->paginate(10);

    return view('buku.public.index', compact('buku'));
    }
    // detail buku user
    public function showPublic($id)
    {
        $buku = Buku::where('id', $id)->first();
    
        if ($buku) {
            return view('buku.public.show', compact('buku'));
        } else {
            abort(404);
        }
    }
    
    //buat ke halaman create buku tus nnti ke fuction store
    public function create()
    {
        return view('buku.create');
    }


    public function store(Request $request)
    {
        // Validasi input field
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'pengarang' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'jumlah_halaman'=>'required|max:255',
            'tanggal_terbit'=> 'required|max:255',
            'deskripsi' =>'required|max:255'
        ]);

        // Proses upload image
        $path = $request->file('image')->store('public/images');

        // Simpan data buku ke database
        $buku = new Buku;
        $buku->judul = $validatedData['judul'];
        $buku->penerbit = $validatedData['penerbit'];
        $buku->pengarang = $validatedData['pengarang'];
        $buku->jumlah_halaman = $validatedData['jumlah_halaman'];
        $buku->tanggal_terbit = $validatedData['tanggal_terbit'];
        $buku->deskripsi = $validatedData['deskripsi'];
        $buku->image = $path;
        $buku->save();

        return redirect()->route('buku.index')->with('success', 'Book has been added successfully.');
    
    }

    //show admin 
    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.show', compact('buku'));
    }
    
    //ke halaman update
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
    
        return view('buku.update', compact('buku'));
    }

    //function update
    public function update(Request $request, Buku $buku)
    {
        //mengatur data agar tidak ada yang kosong 
    $request->validate([
        'judul' => 'required',
        'penerbit' => 'required',
        'pengarang' => 'required',
        'jumlah_halaman' => 'required',
        'tanggal_terbit' => 'required',
        'deskripsi' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    //function update gambar
    if ($request->hasFile('image')) {
        if ($buku->image) {
            Storage::delete('public/'.$buku->image);
        }
        $image = $request->file('image')->store('public');
        $image = str_replace('public/', '', $image);
        //kl gambarnya ga di update nnti ttp sama pke gambar yg sebelumnya
    } else {
        $image = $buku->image;
    }
    //function update
    $buku->update([
        'judul' => $request->judul,
        'penerbit' => $request->penerbit,
        'pengarang' => $request->pengarang,
        'jumlah_halaman' => $request->jumlah_halaman,
        'tanggal_terbit' => $request->tanggal_terbit,
        'deskripsi' => $request->deskripsi,
        'image' => $image,
    ]);
    //save data yg abis di update
    return redirect()->route('buku.index')
                    ->with('success', 'Data buku berhasil diperbarui');
    }
   //function hapus data buku
    public function destroy(Buku $buku)
    {
        // Delete the image file from storage if it exists
    if ($buku->image) {
        Storage::delete('public/'.$buku->image);
    }

    // Delete the book
    $buku->delete();

    // kl berhasil dia pindah halaman ke index
    return redirect()->route('buku.index')->with('success', 'Book deleted successfully!');

    }

    //function export pdf
    public function exportPdf()
    {
        $buku = Buku::all();
        $pdf = PDF::loadView('buku.export-pdf', compact('buku'));
        return $pdf->download('daftar-buku.pdf');
    }
        

}