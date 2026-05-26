<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diklat extends Model
{
    /**
     * The table associated with the model.
     * Legacy DB mapping.
     */
    protected $table = 'diklat';

    /**
     * The primary key for the model.
     */
    protected $primaryKey = 'id_diklat';

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
     * uses `created_date` and `updated_date` instead of `created_at` and `updated_at`.
     */
    public $timestamps = false;

    /**
     * All attributes are mass assignable for now.
     */
    protected $guarded = [];
}
