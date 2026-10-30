<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessRolePermission extends Model
{
    use HasFactory;

    protected $table = 'access_role_permissions';

    protected $fillable = [
        'role_id',
        'module_id',
        'can_view',
        'can_create',
        'can_edit',
        'can_delete',
        'can_export',
        'status',
    ];

    protected $casts = [
        'can_view'   => 'boolean',
        'can_create' => 'boolean',
        'can_edit'   => 'boolean',
        'can_delete' => 'boolean',
        'can_export' => 'boolean',
        'status' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | Role
    |--------------------------------------------------------------------------
    */

    public function role()
    {
        return $this->belongsTo(
            AccessRole::class,
            'role_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Module
    |--------------------------------------------------------------------------
    */

    public function module()
    {
        return $this->belongsTo(
            AccessModule::class,
            'module_id'
        );
    }
}