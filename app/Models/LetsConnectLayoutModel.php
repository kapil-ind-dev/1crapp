<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetsConnectLayoutModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_letsconnects_layout';

    protected $fillable = [
        'logo',
        'header_bg_color',
        'header_text_color',
        'btn_text',
        'btn_bg_color',
        'btn_text_color',
        'btn_link',
        'countdown_color',
        'open_new_tab',
        'footer_bg_color',
        'footer_text_color',
        'footer_btn_text',
        'footer_btn_bgcolor',
        'footer_btn_textcolor',
        'footer_btn_link',
        'footer_btn_ont',
        'copyright_text',
        'status',
        'created_by',
    ];

    protected $casts = [
        'open_new_tab' => 'boolean',
        'status'       => 'integer',
        'created_by'   => 'integer',
    ];

    /**
     * Creator relationship
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}