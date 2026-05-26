<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    /**
     * The table associated with the model.
     * Legacy DB mapping.
     */
    protected $table = 'kelas';

    /**
     * The primary key for the model.
     */
    protected $primaryKey = 'id_kelas';

    /**
     * Indicates if the model's ID is auto-incrementing.
     */
    public $incrementing = true;

    /**
     * The data type of the primary key.
     */
    protected $keyType = 'int';

    /**
     * Disable standard Laravel timestamps because the legacy table
     * uses `created_date` and `updated_date`.
     */
    public $timestamps = false;

    /**
     * All attributes are mass assignable for now.
     */
    protected $guarded = [];

    public function diklat()
    {
        return $this->belongsTo(Diklat::class, 'id_diklat', 'id_diklat');
    }

    public function peserta()
    {
        return $this->hasMany(PesertaDiklat::class, 'id_kelas', 'id_kelas');
    }

    public function jadwal()
    {
        return $this->hasMany(KelasWi::class, 'id_kelas', 'id_kelas');
    }
}
