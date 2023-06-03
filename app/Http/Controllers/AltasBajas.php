<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AltasBajas extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['index']);
    }

    public function index()
    {
        $titulo = 'Inicio';
        $items = Ingreso::all();

        return view('/crud/index', compact('titulo', 'items'));
    }

    public function tabla()
    {
        $titulo = 'Información';
        $items = Ingreso::all();
        return view('/crud/tabla', compact('titulo', 'items'));
    }

    public function create()
    {
        $titulo = 'Agregar';
        return view('/crud/create', compact('titulo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:ingreso,id',
        ], [
            'id.unique' => 'La matrícula ya existe, verifique los datos por favor :/',
        ]);

        $item = new Ingreso();
        $item->id = $request->id;
        $item->nombre = $request->nombre;
        $item->paterno = $request->paterno;
        $item->materno = $request->materno;
        $item->tipo = $request->tipo;
        $item->categoria = $request->categoria;
        $item->cantidad = $request->cantidad;
        $item->telefono = $request->telefono;
        $item->horaCivica = $request->horaCivica;
        $item->horaDeportiva = $request->horaDeportiva;
        $item->horaCultural = $request->horaCultural;
        $item->procedencia = $request->procedencia;
        $item->descripcion = $request->descripcion;
        $item->fecha = $request->fecha;
        $item->fechaIngreso = $request->fechaIngreso;
        $item->save();
        Alert::success('Agregado', 'Se agregó correctamente');
        return redirect('/crud/tabla');
    }

    public function show($id)
    {
        $titulo = "Eliminar ingreso";
        $items = Ingreso::find($id);
        return view("/crud/eliminar", compact('items', 'titulo'));
    }

    public function edit($id)
    {
        $titulo = 'Actualizar datos';
        $items = Ingreso::find($id);
        return view('/crud/edit', compact('items', 'titulo'));
    }

    public function update(Request $request, $id)
    {
        $item = Ingreso::find($id);
        $item->tipo = $request->tipo;
        $item->categoria = $request->categoria;
        $item->cantidad = $request->cantidad;
        $item->descripcion = $request->descripcion;
        $item->fecha = $request->fecha;
        $item->save();
        Alert::success('Actualizado', 'Se actualizó correctamente');
        return redirect('/crud/tabla');
    }

    public function destroy($id)
    {
        $item = Ingreso::find($id);
        $item->delete();
        Alert::success('Eliminado', 'Se eliminó correctamente');
        return redirect('/crud');
    }
}
