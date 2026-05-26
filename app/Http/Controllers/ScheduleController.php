<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelasWi;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        
        $query = KelasWi::with(['kelas', 'kelas.diklat', 'modul']);
        
        if ($user) {
            $query->where('id_wi', $user->id);
        }

        // Apply filters if provided
        if ($request->filled('month')) {
            $query->whereMonth('tgl_mulai', $request->month);
        }
        if ($request->filled('year')) {
            $query->whereYear('tgl_mulai', $request->year);
        }

        $schedules = $query->orderBy('tgl_mulai', 'asc')->paginate(15);

        return view('schedule.index', compact('schedules'));
    }
}
