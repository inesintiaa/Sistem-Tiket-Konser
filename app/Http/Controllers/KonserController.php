<?php

namespace App\Http\Controllers;

use App\Models\Konser;
use Illuminate\Http\Request;

class KonserController extends Controller
{
    public function index()
    {
        $konsers = Konser::all();
        return view('konser', compact('konsers'));
    }
    public function adminIndex()
    {
        $konsers = Konser::all();
        return view('konser', compact('konsers'));
    }

    public function create()
    {
        return view('admin.konser.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required|date',
        ]);

        Konser::create($request->all());

        return redirect()->route('admin.konser.index')->with('success', 'Konser created successfully.');
    }

    public function show(Konser $konser)
    {
        return view('admin.konser.show', compact('konser'));

    }

    public function edit(Konser $konser)
    {
        return view('admin.konser.edit', compact('konser'));
    }

    public function update(Request $request, Konser $konser)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required|date',
        ]);

        Konser::update($request->all());

        return redirect()->route('admin.konser.index')->with('success', 'Konser updated successfully.');
    }

    public function destroy(Konser $konser)
    {
        Konser::delete();

        return redirect()->route('admin.konser.index')->with('success', 'Konser deleted successfully.');
    }
}
