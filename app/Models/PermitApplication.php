<?php

namespace App\Models;
use App\Traits\FileUploadTrait;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Dyrynda\Database\Support\GeneratesUuid;
use Dyrynda\Database\Casts\EfficientUuid;

class PermitApplication extends Model implements Auditable
{
    use HasFactory;
    use FileUploadTrait;
    use GeneratesUuid;
    use \OwenIt\Auditing\Auditable;

    protected $table = "permit_applications";
    protected $casts = [
        'uuid' => EfficientUuid::class,
    ];

    protected $auditExclude = [
        'uuid',
    ];

    // protected $casts = [
    //     'establishment_date' => 'date',
    // ];
}
