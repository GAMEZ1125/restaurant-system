<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InventoryItem;
use App\Models\InventoryMovement;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $items = InventoryItem::with('movements')->get();
        return view('admin.inventory.index', compact('items'));
    }

    public function create()
    {
        return view('admin.inventory.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'quantity' => 'required|numeric|min:0',
            'alert_threshold' => 'required|numeric|min:0',
            'cost' => 'required|numeric|min:0'
        ]);

        InventoryItem::create($validated);

        return redirect()->route('inventory.index')
            ->with('success', 'Item de inventario creado exitosamente.');
    }

    public function show(InventoryItem $inventory)
    {
        $movements = $inventory->movements()->latest()->paginate(10);
        return view('admin.inventory.show', compact('inventory', 'movements'));
    }

    public function edit(InventoryItem $inventory)
    {
        return view('admin.inventory.edit', compact('inventory'));
    }

    public function update(Request $request, InventoryItem $inventory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'quantity' => 'required|numeric|min:0',
            'alert_threshold' => 'required|numeric|min:0',
            'cost' => 'required|numeric|min:0'
        ]);

        $inventory->update($validated);

        return redirect()->route('inventory.index')
            ->with('success', 'Item de inventario actualizado exitosamente.');
    }

    public function destroy(InventoryItem $inventory)
    {
        $inventory->delete();
        return redirect()->route('inventory.index')
            ->with('success', 'Item de inventario eliminado exitosamente.');
    }

    public function lowStock()
    {
        $items = InventoryItem::whereColumn('quantity', '<=', 'alert_threshold')->get();
        return view('admin.inventory.low-stock', compact('items'));
    }
}
