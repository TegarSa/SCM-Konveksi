<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipment;
use App\Models\Product;
use Illuminate\Support\Str;

class ShipmentsController extends Controller
{
    public function index()
    {
        $shipments = Shipment::latest()->with('product')->get();
        return view('backend.shipments.index', compact('shipments'));
    }

    public function create()
    {
        $products = Product::all();
        return view('backend.shipments.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'shipment_date'   => 'required|date',
            'destination'     => 'required|string|max:255',
            'inventory_type'  => 'required|in:Masuk,Keluar',
            'product_id'      => 'required|exists:products,id',
            'quantity'        => 'required|integer|min:1',
            'city'            => 'required|string|max:100',
            'armada'          => 'required|string|max:100',
            'notes'           => 'nullable|string',
        ]);

        $product = Product::findOrFail($request->product_id);

        // Validasi stok jika keluar
        if ($request->inventory_type === 'Keluar' && $product->stok_akhir < $request->quantity) {
            return back()->withErrors(['quantity' => 'Stok tidak mencukupi'])->withInput();
        }

        // Generate nomor pengiriman unik
        $shipmentNumber = 'SHP-' . strtoupper(Str::random(8));

        // Simpan shipment
        Shipment::create([
            'shipment_number' => $shipmentNumber,
            'shipment_date'   => $request->shipment_date,
            'destination'     => $request->destination,
            'inventory_type'  => $request->inventory_type,
            'product_id'      => $product->id,
            'product_name'    => $product->nama_produk,
            'quantity'        => $request->quantity,
            'city'            => $request->city,
            'armada'          => $request->armada,
            'status'          => 'on_delivery',
            'notes'           => $request->notes,
        ]);

        // Update stok produk
        if ($request->inventory_type === 'Masuk') {
            $product->stok_akhir += $request->quantity;
        } else {
            $product->stok_akhir -= $request->quantity;
        }
        $product->save();

        return redirect()->route('shipments.index')->with('success', 'Pengiriman berhasil ditambahkan');
    }

    public function edit(Shipment $shipment)
    {
        $products = Product::all();
        return view('backend.shipments.edit', compact('shipment', 'products'));
    }

    public function update(Request $request, Shipment $shipment)
    {
        $request->validate([
            'shipment_date'   => 'required|date',
            'destination'     => 'required|string|max:255',
            'inventory_type'  => 'required|in:Masuk,Keluar',
            'product_id'      => 'required|exists:products,id',
            'quantity'        => 'required|integer|min:1',
            'city'            => 'required|string|max:100',
            'armada'          => 'required|string|max:100',
            'status'          => 'required|string',
            'notes'           => 'nullable|string',
        ]);

        $product = Product::findOrFail($request->product_id);

        // Kembalikan stok lama
        if ($shipment->inventory_type === 'Masuk') {
            $product->stok_akhir -= $shipment->quantity;
        } else {
            $product->stok_akhir += $shipment->quantity;
        }

        // Validasi stok baru jika keluar
        if ($request->inventory_type === 'Keluar' && $product->stok_akhir < $request->quantity) {
            return back()->withErrors(['quantity' => 'Stok tidak mencukupi'])->withInput();
        }

        // Update stok baru
        if ($request->inventory_type === 'Masuk') {
            $product->stok_akhir += $request->quantity;
        } else {
            $product->stok_akhir -= $request->quantity;
        }
        $product->save();

        // Update shipment
        $shipment->update([
            'shipment_date'   => $request->shipment_date,
            'destination'     => $request->destination,
            'inventory_type'  => $request->inventory_type,
            'product_id'      => $product->id,
            'product_name'    => $product->nama_produk,
            'quantity'        => $request->quantity,
            'city'            => $request->city,
            'armada'          => $request->armada,
            'status'          => $request->status,
            'notes'           => $request->notes,
        ]);

        return redirect()->route('shipments.index')->with('success', 'Pengiriman berhasil diperbarui');
    }

    public function destroy(Shipment $shipment)
    {
        $product = Product::find($shipment->product_id);
        if ($product) {
            if ($shipment->inventory_type === 'Masuk') {
                $product->stok_akhir -= $shipment->quantity;
            } else {
                $product->stok_akhir += $shipment->quantity;
            }
            $product->save();
        }

        $shipment->delete();
        return redirect()->route('shipments.index')->with('success', 'Pengiriman berhasil dihapus');
    }
}
