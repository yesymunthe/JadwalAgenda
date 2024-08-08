<?php 
namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $agendas = Agenda::paginate(10);
        return view('admin.dashboard', compact('agendas'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'jam' => 'required',
            'kegiatan' => 'required',
            'deskripsi' => 'required',
            'pj' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required|date',
        ]);

        if (Agenda::create($validated)) {
            return redirect()->route('admin.dashboard')->with('success', 'Agenda berhasil ditambahkan');
        } else {
            return redirect()->route('admin.dashboard')->with('error', 'Gagal menambahkan agenda');
        }
    }

    public function edit($id)
    {
        $agenda = Agenda::find($id);
        $agenda->jam = Carbon::parse($agenda->jam)->format('H:i');
        $agenda->tanggal = Carbon::parse($agenda->tanggal)->format('Y-m-d');
        return response()->json($agenda);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'jam' => 'required',
            'kegiatan' => 'required',
            'deskripsi' => 'required',
            'pj' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required|date',
        ]);

        $agenda = Agenda::find($id);
        $agenda->fill($validated);

        if ($agenda->save()) {
            return redirect()->route('admin.dashboard')->with('success', 'Agenda berhasil diperbarui');
        } else {
            return redirect()->route('admin.dashboard')->with('error', 'Gagal memperbarui agenda');
        }
    }

    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);

        if ($agenda->delete()) {
            return redirect()->route('admin.dashboard')->with('success', 'Agenda berhasil dihapus');
        } else {
            return redirect()->route('admin.dashboard')->with('error', 'Gagal menghapus agenda');
        }
    }
}
