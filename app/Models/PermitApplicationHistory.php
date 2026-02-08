<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermitApplicationHistory extends Model
{
    use HasFactory;

    protected $table = 'permit_application_status_histories';

    function user(){
        return $this->belongsTo(User::class, 'changed_by');
    }

    function application(){
        return $this->belongsTo(PermitApplication::class, 'permit_application_id');
    }

}
