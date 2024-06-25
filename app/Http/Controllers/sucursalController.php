<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Http\Request;

class sucursalController extends Controller
{
    public function index()
    {
        $sucursales = Sucursal::all();
        return view('admin.sucursal.index', compact('sucursales'));
    }

    public function create()
    {
        return view('admin.sucursal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
        ]);
        Sucursal::create([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
        ]);
        return redirect()->route('admin.sucursal.index')->with('info', 'La Sucursal se ha registrado correctamente');
    }

    public function edit($id)
    {
        $sucursal = Sucursal::where('id', $id)->first();
        return view('admin.sucursal.edit', compact('sucursal'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
        ]);
        $sucursal = Sucursal::where('id', $id)->first();
        $sucursal->nombre = $request->nombre;
        $sucursal->direccion = $request->direccion;
        $sucursal->save();

        return redirect()->route('admin.sucursal.edit', $sucursal)->with('info', 'Los Datos se Editaron correctamente');
    }

    public function destroy($id)
    {
        $sucursal = Sucursal::where('id', $id)->first();
        $sucursal->delete();

        return redirect()->route('admin.sucursal.index')->with('info', 'La Sucursal se ha eliminado correctamente');
    }
}
