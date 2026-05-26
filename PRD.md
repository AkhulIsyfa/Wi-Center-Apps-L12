PRD: WI-Center Web App (Portal Operasional Widyaiswara)
Versi: 1.3 | Stack: Laravel 12 + Filament V3 + Tailwind CSS | Fokus: Integrasi Server-Side & Filament Custom UI

1. Context & Architecture (Sistem Hilir / Consumer System)
   Peran Sistem: WI-Center adalah portal operasional interaktif. Data master (Kelas, Jadwal, Peserta) berasal dari Sibangkoman (Sistem Hulu).

Mekanisme Sinkronisasi: Laravel Console Command via Cron Job (php artisan sync:sibangkoman). Skema Upsert (Update or Create) berdasarkan id_kelas_sibangkoman.

Aturan Ketat (Data Drift Guardrail): Data Master dari Sibangkoman bersifat Read-Only di WI-Center. Tidak boleh ada form Create, Edit, atau Delete untuk data master di Filament.

2. Pemetaan UI/UX HTML ke Komponen Filament (Blueprint Referensi)
   Proyek ini memiliki file HTML statis yang wajib dijadikan acuan layouting, kelas Tailwind, dan palet warna oleh AI saat membangun komponen Filament. Berikut adalah pemetaannya:

A. Auth & Profil
login.html ➔ Custom Login Page Filament: AI harus melakukan override pada Filament/Pages/Auth/Login dengan meng-ekstrak struktur HTML ini.

profil.html ➔ Custom Profile Page: Override halaman Edit Profile bawaan Filament dengan menyamakan layout grid dan form isian data diri.

B. Dashboard & Reporting
dashboard.html ➔ Dashboard Widgets:

AI harus mengekstrak Card Total JP (Lifetime) dan Card Persentase Kepuasan menjadi StatsOverviewWidget di Filament.

Konversi blok "Jadwal Terdekat" dan "Kelas Aktif" menjadi TableWidget pada dashboard.

report.html ➔ Custom Filament Page (ReportJpPage):

AI harus membuat Custom Page Filament dan memasukkan tabel Report JP beserta filter Bulan/Tahun ke dalam view Blade (resources/views/filament/pages/report-jp-page.blade.php).

C. Core Operations (Resources)
daftarkelas.html ➔ KelasResource (List Records):

Tampilkan tabel daftar kelas dengan filter tab (Semua, Aktif, Selesai).

Constraint: Matikan fungsi ->canCreate(), ->canEdit(), ->canDelete().

jadwalmengajar.html ➔ JadwalResource (List Records):

Tampilkan tabel jadwal mengajar (Read-Only).

detailkelas.html ➔ KelasResource (View Record & Relation Managers):

CRITICAL: Halaman ini sangat penting. Halaman View Record kelas harus menampilkan ringkasan kelas di bagian atas.

Tab navigasi di HTML (Materi, Peserta, Diskusi, Penilaian) harus dikonversi menjadi Relation Managers di bagian bawah halaman View (MateriRelationManager, DiskusiRelationManager, PenilaianRelationManager).

3. Aturan Theming & UI Constraints untuk AI
   Tailwind Config Extractor: AI wajib membaca <script id="tailwind-config"> di dalam file-file HTML (seperti palet warna primary: "#032a7e96", dll) dan menerapkannya ke dalam Filament Custom Theme (tailwind.config.js milik Filament).

Styling Komponen: Jika komponen form/table bawaan Filament tidak sesuai dengan UI HTML, gunakan ->extraAttributes(['class' => '...']) pada skema Filament untuk menyuntikkan kelas Tailwind dari file HTML, atau buat Custom View khusus.

4. Logika Bisnis & Input Aktif (Write-Back)
   Fitur input oleh Widyaiswara (berjalan di dalam Relation Manager halaman Detail Kelas):

Materi (MateriRelationManager): Widyaiswara dapat unggah materi (PDF/Docs, Maks 5MB).

Diskusi (DiskusiRelationManager): Menggunakan Livewire component kustom di dalam Relation Manager untuk mendukung format Hierarchical Threading (Balasan bertingkat).

Penilaian (PenilaianRelationManager):

Form input TextInput berjenis numeric dengan validasi min:0|max:100.

Locking Mechanism: Jika field status_penilaian = 'Final', maka input nilai otomatis menjadi disabled() di Filament, dan dilindungi Observer/Policy di level backend untuk menolak pembaruan data.

5. Skema Database Inti (MySQL)

CRITICAL DB CONSTRAINT: Proyek ini menggunakan legacy database (pelatihan.sql). Dilarang keras membuat Migration yang mengubah struktur tabel, nama kolom, atau tipe data bawaan. Seluruh Model Eloquent harus di-mapping secara presisi ke tabel yang sudah ada (termasuk custom Primary Key dan status Timestamps).
