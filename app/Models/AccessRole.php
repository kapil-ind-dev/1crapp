<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessRole extends Model
{
    use HasFactory;

    protected $table = 'access_roles';

    protected $fillable = [
        'agent_id',
        'role_type',
        'name',
        'slug',
        'description',
        'status',
        'created_by',
    ];

    public function permissions()
    {
        return $this->hasMany(
            AccessRolePermission::class,
            'role_id'
        );
    }

    public function modules()
    {
        return $this->belongsToMany(
            AccessModule::class,
            'access_role_permissions',
            'role_id',
            'module_id'
        )->withPivot([
            'can_view',
            'can_create',
            'can_edit',
            'can_delete',
            'can_export',
        ]);
    }
}