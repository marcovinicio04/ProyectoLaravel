<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        return view ('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/u|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ],[
            'stock.min' => 'El stock no puede ser negativo',
            'precio.min' => 'El precio no puede ser negativo',
            'nombre.regex' => 'El nombre no puede incluir numeros'
        ]);

        Producto::create($request->all());

        return redirect()->route('productos.index')->with('success', ' ✅ Producto agreado correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $productos=Producto::findOrFail($id);
        return view ('productos.edit', compact('productos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre'=> 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/u|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ],[
            'nombre.regex' => 'El nombre no puede incluir numeros',
            'precio.min' => 'El precio no puede ser negativo',
            'stock.min' => 'El stock no puede ser negativo'
        ]);

        $productos = Producto::findOrFail($id);

        $productos->update([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'stock' => $request->stock,
        ]);

        return redirect()->route('productos.index')->with('success', ' ✏️ Producto actualizado correctamente');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $productos = Producto::findOrFail($id);
        $productos->delete();

        return redirect()->route('productos.index')->with('success', '🗑️ Producto eliminado');
    }
}
