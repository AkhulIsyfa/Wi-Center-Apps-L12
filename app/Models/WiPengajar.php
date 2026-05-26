<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WiPengajar extends Model
{
    /**
     * The table associated with the model.
     * Legacy DB mapping.
     */
    protected $table = 'wi_pengajar';

    /**
     * The primary key for the model.
     */
    protected $primaryKey = 'id_pengajar';

    /**
     * Indicates if the model's ID is auto-incrementing.
     */
    public $incrementing = true;

    /**
     * The data type of the primary key.
     */
    protected $keyType = 'float'; // The table structure shows double for some reason, but we'll use float/int mapping behavior

    /**
     * Disable standard Laravel timestamps because the legacy table
     * has no created_at or updated_at columns.
     */
    public $timestamps = false;

    /**
     * All attributes are mass assignable for now.
     */
    protected $guarded = [];
}
