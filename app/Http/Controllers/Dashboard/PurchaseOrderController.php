<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
use App\Models\Supplier;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $purchaseOrders = PurchaseOrder::with(['supplier', 'items.item'])
            ->orderByDesc('created_at')
            ->get();

        return view('backend.pengadaan.po.index', compact('purchaseOrders'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $items = Item::all();

        return view('backend.pengadaan.po.create', compact('suppliers', 'items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required',
            'item_id.*' => 'required',
            'quantity.*' => 'required|numeric|min:1',
            'price.*' => 'required|numeric|min:1',
        ]);

        $po = PurchaseOrder::create([
            'supplier_id' => $request->supplier_id,
            'user_id' => auth()->id(),
            'po_number' => 'PO-' . time(),
            'po_date' => now(),
            'status' => 'Pending',
            'total_price' => 0,
        ]);

        $total = 0;

        foreach ($request->item_id as $index => $itemId) {
            $qty = $request->quantity[$index];
            $price = $request->price[$index];
            $subTotal = $qty * $price;

            PurchaseOrderItem::create([
                'po_id' => $po->id,
                'item_id' => $itemId,
                'quantity' => $qty,
                'price' => $price,
                'sub_total' => $subTotal,
            ]);

            $total += $subTotal;
        }

        $po->update(['total_price' => $total]);

        return redirect()->route('po.index')->with('success', 'Purchase Order berhasil dibuat');
    }

    public function edit($id)
    {
        $po = PurchaseOrder::with('items.item')->findOrFail($id);
        $suppliers = Supplier::all();
        $items = Item::all();

        return view('backend.pengadaan.po.edit', compact('po', 'suppliers', 'items'));
    }

    public function update(Request $request, $id)
    {
        $po = PurchaseOrder::findOrFail($id);

        $po->update([
            'status' => $request->status,
        ]);

        return redirect()->route('po.index')->with('success', 'Status PO berhasil diupdate');
    }

    // public function destroy($id)
    // {
    //     $supplier = Supplier::findOrFail($id);
    //     $supplier->delete();

    //     toastr()->success('Supplier berhasil dihapus');
    //     return redirect()->route('supplier.index');
    // }
}
