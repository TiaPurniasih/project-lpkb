<?php

namespace App\Models;
use App\Traits\FileUploadTrait;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Dyrynda\Database\Support\GeneratesUuid;
class Kanwil extends Model implements Auditable
{
    use HasFactory;
    use FileUploadTrait;
    use \OwenIt\Auditing\Auditable;

    protected $table = "kanwil";
   
    protected $casts = [
        'created_at' => 'date',
    ];

    protected $auditExclude = [
        'uuid',
    ];

}
