<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelasComment extends Model
{
    /**
     * The table associated with the model.
     * Legacy DB mapping.
     */
    protected $table = 'kelas_comment';

    /**
     * The primary key for the model.
     */
    protected $primaryKey = 'id';

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
     * uses `insert_date` and has no updated_at column.
     */
    public $timestamps = false;

    /**
     * All attributes are mass assignable for now.
     */
    protected $guarded = [];
}
