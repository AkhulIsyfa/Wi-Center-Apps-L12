<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DiklatModul extends Model
{
    protected $table = 'diklat_modul';
    protected $primaryKey = 'id_modul';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
    protected $guarded = [];

    public function diklat(): BelongsTo
    {
        return $this->belongsTo(Diklat::class, 'id_diklat', 'id_diklat');
    }
}
