<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartsInvoice extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
     protected $table = 'parts_invoices';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sinister', 
        'vehicle_plate', 
        'office_email',
        'office_telephone', 
        'office_document', 
        'bank',
        'agency', 
        'account', 
        'invoice_parts',
        'invoice_services', 
        'discharge_term'
    ];

    protected $guarded = ['id', 'created_at', 'update_at'];

}
