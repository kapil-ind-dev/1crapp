<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetsConnectMenuModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_letsconnectmenu';

    protected $fillable = [
        'icon',
        'title',
        'page_url',
        'parent_id',
        'type',
        'open_new_tab',
        'status',
        'created_by',
    ];

    protected $casts = [
        'parent_id'    => 'integer',
        'type'         => 'integer',
        'open_new_tab' => 'boolean',
        'status'       => 'integer',
        'created_by'   => 'integer',
    ];

    /**
     * Parent Menu
     */
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
     * Child Menus
     */
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    /**
     * Creator
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}