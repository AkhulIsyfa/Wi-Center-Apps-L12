<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The table associated with the model.
     * Legacy DB: table `users` in `pelatihan` database.
     */
    protected $table = 'users';

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
     * Legacy DB only has `created_at`, no `updated_at`.
     * Disable automatic timestamp management.
     */
    public $timestamps = false;

    /**
     * Legacy DB does not have a `remember_token` column.
     * Disable remember token functionality.
     */
    protected $rememberTokenName = '';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_name',
        'name',
        'user_salt',
        'user_password',
        'user_akses',
        'id_balai',
        'user_status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'user_password',
        'user_salt',
    ];

    /**
     * Get the password for the user (used by Authenticatable contract).
     * Maps the legacy `user_password` column to Laravel's auth system.
     */
    public function getAuthPassword(): string
    {
        return $this->user_password;
    }

    /**
     * Get the column name for the "username" used for authentication.
     * Legacy DB uses `user_name` (NIP or username) instead of `email`.
     */
    public function getAuthIdentifierName(): string
    {
        return 'id';
    }

    /**
     * Check if user account is active.
     * Legacy DB: user_status 0 = active, 1 = inactive.
     */
    public function isActive(): bool
    {
        return $this->user_status === 0;
    }

    /**
     * Get the user access level label.
     */
    public function getAccessLevelLabel(): string
    {
        return match ($this->user_akses) {
            '0' => 'Admin BPSDM',
            '1' => 'Admin Pusat',
            '2' => 'Admin Balai',
            '3' => 'Widyaiswara Pusat',
            '6' => 'Widyaiswara',
            default => 'Unknown',
        };
    }

    /**
     * Relationship: User belongs to a Balai.
     */
    public function balai(): BelongsTo
    {
        return $this->belongsTo(MBalai::class, 'id_balai', 'id');
    }

    public function schedules()
    {
        return $this->hasMany(KelasWi::class, 'id_wi', 'id');
    }
}
