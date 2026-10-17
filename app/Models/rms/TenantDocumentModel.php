<?php 
namespace App\Models\rms;
use Illuminate\Database\Eloquent\Model;
class TenantDocumentModel extends Model
{
    protected $table = 'rms_tenant_documents';
    protected $fillable = [
        'tenant_id', 'photo', 'identity_proof',
        'pan_card', 'address_proof', 'employment_proof'
    ];
}