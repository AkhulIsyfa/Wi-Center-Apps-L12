<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelasWi;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Example logic mapping to dashboard UI requirements
        $user = Auth::user();

        // 1. Total Kelas Aktif (Ongoing classes assigned to the user or globally?)
        // Let's assume classes globally that are currently running.
        $now = Carbon::now();
        $totalKelasAktif = Kelas::where('tgl_mulai', '<=', $now)
            ->where('tgl_akhir', '>=', $now)
            ->count();

        // 2. Jadwal Minggu Ini
        // Get user's schedules for the next 7 days
        $startOfWeek = $now->copy()->startOfWeek();
        $endOfWeek = $now->copy()->endOfWeek();
        
        $jadwalMingguIni = 0;
        if ($user) {
            $jadwalMingguIni = KelasWi::where('id_wi', $user->id)
                ->whereBetween('tgl_mulai', [$startOfWeek, $endOfWeek])
                ->count();
        }

        // 3. Total JP Bulan Ini
        $startOfMonth = $now->copy()->startOfMonth();
        $endOfMonth = $now->copy()->endOfMonth();
        
        $totalJpBulanIni = 0;
        if ($user) {
            $totalJpBulanIni = KelasWi::where('id_wi', $user->id)
                ->whereBetween('tgl_mulai', [$startOfMonth, $endOfMonth])
                ->sum('jp');
        }

        // 4. Pengumuman Terakhir
        // No announcement table in legacy DB based on quick scan. Mocking it or leaving it empty for UI.
        
        // Let's get the upcoming schedules to show in the UI list
        $upcomingSchedules = collect();
        if ($user) {
            $upcomingSchedules = KelasWi::with(['kelas', 'kelas.diklat'])
                ->where('id_wi', $user->id)
                ->where('tgl_mulai', '>=', $now)
                ->orderBy('tgl_mulai', 'asc')
                ->take(3)
                ->get();
        }

        return view('dashboard', compact(
            'totalKelasAktif',
            'jadwalMingguIni',
            'totalJpBulanIni',
            'upcomingSchedules'
        ));
    }
}
