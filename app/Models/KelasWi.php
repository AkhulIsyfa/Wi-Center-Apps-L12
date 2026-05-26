<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelasWi extends Model
{
    /**
     * The table associated with the model.
     * Legacy DB mapping.
     */
    protected $table = 'kelas_wi';

    /**
     * The primary key for the model.
     */
    protected $primaryKey = 'id_kelas_wi';

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
     * has no created_at or updated_at columns.
     */
    public $timestamps = false;

    /**
     * All attributes are mass assignable for now.
     */
    protected $guarded = [];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_wi', 'id');
    }

    public function modul()
    {
        return $this->belongsTo(DiklatModul::class, 'id_modul', 'id_modul');
    }
}
