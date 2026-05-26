<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;
use App\Models\KelasWi;

class CourseClassController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Fetch classes where the user is an instructor (KelasWi links user to class)
        // Since we are showing the instructor's classes
        $classes = collect();
        if ($user) {
            $classIds = KelasWi::where('id_wi', $user->id)->pluck('id_kelas')->unique();
            $classes = Kelas::with('diklat')->whereIn('id_kelas', $classIds)->orderBy('tgl_mulai', 'desc')->paginate(10);
        } else {
            // Fallback for development if no user is logged in but route is accessed
            $classes = Kelas::with('diklat')->orderBy('tgl_mulai', 'desc')->paginate(10);
        }

        return view('classes.index', compact('classes'));
    }

    public function show($id)
    {
        $kelas = Kelas::with(['diklat', 'peserta'])->findOrFail($id);
        
        // We might also want to load schedules for this specific class
        $schedules = KelasWi::with(['user', 'modul'])->where('id_kelas', $id)->orderBy('tgl_mulai', 'asc')->get();

        return view('classes.show', compact('kelas', 'schedules'));
    }
}
