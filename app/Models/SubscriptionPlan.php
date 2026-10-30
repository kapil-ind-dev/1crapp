<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    use HasFactory;
    protected $table = 'subscription_plans';
    protected $fillable = ['id','role_id', 'title', 'sub_title', 'monthly_price', 'yearly_price', 'discount', 'trial_duration', 'status', 'created_at', 'updated_at', 'deleted_at', 'added_by', 'priority', 'features', 'mail_temp_status', 'total_mail_temp', 'button_text', 'tag', 'color'];
    /**
     * The role linked to this plan.
     */
    public function role()
    {
        return $this->belongsTo(AccessRole::class, 'role_id');
    }

    /**
     * Direct relationship to role permissions.
     */
    public function rolePermissions()
    {
        return $this->hasMany(AccessRolePermission::class, 'role_id', 'role_id');
    }
}
