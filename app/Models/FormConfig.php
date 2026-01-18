<?php

namespace App\Models;
use App\Traits\FileUploadTrait;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Dyrynda\Database\Support\GeneratesUuid;
use Dyrynda\Database\Casts\EfficientUuid;

class FormConfig extends Model implements Auditable
{
    use HasFactory;
    use FileUploadTrait;
    use GeneratesUuid;
    use \OwenIt\Auditing\Auditable;

    protected $table = "form_configs";

     protected $fillable = [
        'category',
        'form_title',
        'form_code',
        'form_codex',
        'description',
        'field_type',
        'field_name',
        'field_label',
        'placeholder',
        'options',
        'page',
        'section',
        'field_group',
        'required',
        'active',
        'sort_order',
    ];

    protected $casts = [
        'uuid' => EfficientUuid::class,
        'options' => 'array',
        'required' => 'boolean',
        'active' => 'boolean',
        'created_at' => 'date',
    ];

    protected $auditExclude = [
        'uuid',
    ];

}
