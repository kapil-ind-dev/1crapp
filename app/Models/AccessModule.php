<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessModule extends Model
{
    use HasFactory;

    protected $table = 'access_modules';

    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'type',
        'route_name',
        'url',
        'icon',
        'sort_order',
        'is_menu',
        'internal_setting',
        'side',
        'status',
    ];

    /*
    |--------------------------------------------------------------------------
    | Parent
    |--------------------------------------------------------------------------
    */

    public function parent()
    {
        return $this->belongsTo(
            self::class,
            'parent_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Permissions
    |--------------------------------------------------------------------------
    */

    public function permissions()
    {
        return $this->hasMany(
            AccessRolePermission::class,
            'module_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Roles
    |--------------------------------------------------------------------------
    */

    public function roles()
    {
        return $this->belongsToMany(
            AccessRole::class,
            'access_role_permissions',
            'module_id',
            'role_id'
        )->withPivot([
            'can_view',
            'can_create',
            'can_edit',
            'can_delete',
            'can_export',
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | Recursive Children
    |--------------------------------------------------------------------------
    */
    public function children()
    {
        return $this->hasMany(AccessModule::class, 'parent_id')
            ->where('status', 1)
            ->orderBy('sort_order');
    }

    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }
}