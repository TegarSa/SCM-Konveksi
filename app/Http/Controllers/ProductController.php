<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar produk
     */
    public function index()
    {
        $products = Product::with('supplier')->get();
        return view('backend.persediaan.index', compact('products'));
    }

    /**
     * Menampilkan form tambah produk
     */
    public function create()
    {
        $suppliers = Supplier::all();
        return view('backend.persediaan.create', compact('suppliers'));
    }

    /**
     * Menyimpan produk baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'jenis_produk' => 'required|string|max:255',
            'sku_kode' => 'required|string|max:100|unique:products',
            'supplier_id' => 'required|exists:suppliers,id',
            'stok_awal' => 'required|integer|min:0',
            'stok_masuk' => 'nullable|integer|min:0',
            'stok_keluar' => 'nullable|integer|min:0',
            'satuan' => 'required|string|max:50',
            'harga_satuan' => 'required|numeric|min:0',
        ]);

        $stokAkhir = $request->stok_awal + ($request->stok_masuk ?? 0) - ($request->stok_keluar ?? 0);
        $totalHarga = $stokAkhir * $request->harga_satuan;

        Product::create([
            'nama_produk' => $request->nama_produk,
            'jenis_produk' => $request->jenis_produk,
            'sku_kode' => $request->sku_kode,
            'supplier_id' => $request->supplier_id,
            'stok_awal' => $request->stok_awal,
            'stok_masuk' => $request->stok_masuk ?? 0,
            'stok_keluar' => $request->stok_keluar ?? 0,
            'stok_akhir' => $stokAkhir,
            'satuan' => $request->satuan,
            'harga_satuan' => $request->harga_satuan,
            'total_harga' => $totalHarga,
        ]);

        return redirect()->route('barang.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit produk
     */
    public function edit(Product $barang)
    {
        $suppliers = Supplier::all();
        return view('backend.persediaan.edit', compact('barang', 'suppliers'));
    }

    /**
     * Update data produk
     */
    public function update(Request $request, Product $barang)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'jenis_produk' => 'required|string|max:255',
            'sku_kode' => 'required|string|max:100|unique:products,sku_kode,' . $barang->id,
            'supplier_id' => 'required|exists:suppliers,id',
            'stok_awal' => 'required|integer|min:0',
            'stok_masuk' => 'nullable|integer|min:0',
            'stok_keluar' => 'nullable|integer|min:0',
            'satuan' => 'required|string|max:50',
            'harga_satuan' => 'required|numeric|min:0',
        ]);

        $stokAkhir = $request->stok_awal + ($request->stok_masuk ?? 0) - ($request->stok_keluar ?? 0);
        $totalHarga = $stokAkhir * $request->harga_satuan;

        $barang->update([
            'nama_produk' => $request->nama_produk,
            'jenis_produk' => $request->jenis_produk,
            'sku_kode' => $request->sku_kode,
            'supplier_id' => $request->supplier_id,
            'stok_awal' => $request->stok_awal,
            'stok_masuk' => $request->stok_masuk ?? 0,
            'stok_keluar' => $request->stok_keluar ?? 0,
            'stok_akhir' => $stokAkhir,
            'satuan' => $request->satuan,
            'harga_satuan' => $request->harga_satuan,
            'total_harga' => $totalHarga,
        ]);

        return redirect()->route('barang.index')->with('success', 'Produk berhasil diupdate.');
    }

    /**
     * Hapus produk
     */
    public function destroy(Product $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Produk berhasil dihapus.');
    }
}
