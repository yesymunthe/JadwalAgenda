<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AgendaController extends Controller
{
    public function index()
    {
        $agendas = Agenda::whereDate('tanggal', Carbon::today())->paginate(10);
        return view('agenda.index', compact('agendas'));
    }

    public function indexBesok()
    {
        $agendas = Agenda::whereDate('tanggal', Carbon::tomorrow())->paginate(10);
        return view('agenda.besok', compact('agendas'));
    }

    // Menampilkan formulir untuk menambahkan agenda
    public function create()
    {
        return view('agenda.create');
    }

    // Menyimpan agenda baru
    public function store(Request $request)
    {
        $request->validate([
            'jam' => 'required',
            'kegiatan' => 'required',
            'deskripsi' => 'required',
            'pj' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required|date',
        ]);

        Agenda::create($request->all());

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil ditambahkan.');
    }

    // Menampilkan formulir untuk mengedit agenda
    public function edit(Agenda $agenda)
    {
        return view('agenda.edit', compact('agenda'));
    }

    // Memperbarui agenda
    public function update(Request $request, Agenda $agenda)
    {
        $request->validate([
            'jam' => 'required',
            'kegiatan' => 'required',
            'deskripsi' => 'required',
            'pj' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required|date',
        ]);

        $agenda->update($request->all());

        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil diperbarui.');
    }

    // Menghapus agenda
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();

        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil dihapus.');
    }
    
}
