<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelasWi;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        
        $query = KelasWi::with(['kelas', 'modul', 'kelas.diklat']);
        
        if ($user) {
            $query->where('id_wi', $user->id);
        }

        // Apply filters
        $month = $request->input('month', date('n'));
        $year = $request->input('year', date('Y'));
        
        $query->whereMonth('tgl_mulai', $month)
              ->whereYear('tgl_mulai', $year);

        $reports = $query->orderBy('tgl_mulai', 'asc')->get();
        
        $totalJp = $reports->sum('jp');

        return view('report.index', compact('reports', 'totalJp', 'month', 'year'));
    }
}
