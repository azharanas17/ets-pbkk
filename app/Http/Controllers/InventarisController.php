<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    public function index()
    {
        $inventaris = Inventaris::latest()->get();
        return view('inventaris.index', compact('inventaris'));
    }

    public function create()
    {
        return view('inventaris.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'jenis' => 'required|string|max:155',
            'kondisi' => 'required|string',
            'keterangan' => 'required|string',
            'kecacatan' => 'required|string',
            'jumlah' => 'required|integer'
        ]);

        $inventaris = Inventaris::create([
            'jenis' => $request->jenis,
            'kondisi' => $request->kondisi,
            'keterangan' => $request->keterangan,
            'kecacatan' => $request->kecacatan,
            'jumlah' => $request->jumlah,
        ]);

        if($inventaris) {
            return redirect()
                ->route('inventaris.index')
                ->with([
                    'success' => 'New inventaris has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occured, Please try again'
                ]);
        }
    }

    public function edit($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        return view('inventaris.edit', compact('inventaris'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'jenis' => 'required|string|max:155',
            'kondisi' => 'required|string',
            'keterangan' => 'required|string',
            'kecacatan' => 'required|string',
            'jumlah' => 'required|integer'
        ]);

        $inventaris = Inventaris::findOrFail($id);

        $inventaris->update([
            'jenis' => $request->jenis,
            'kondisi' => $request->kondisi,
            'keterangan' => $request->keterangan,
            'kecacatan' => $request->kecacatan,
            'jumlah' => $request->jumlah,
        ]);

        if($inventaris) {
            return redirect()
                ->route('inventaris.index')
                ->with([
                    'success' => 'Inventaris has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occured, Please try again'
                ]);
        }        
    }

    public function destroy($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        $inventaris->delete();

        if($inventaris) {
            return redirect()
                ->route('inventaris.index')
                ->with([
                    'success' => 'Inventaris has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('inventaris.index')
                ->back()
                ->with([
                    'error' => 'Some problem occured, Please try again'
                ]);
        }
    }
}
