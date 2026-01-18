<?php

namespace App\Models;
use App\Traits\FileUploadTrait;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Dyrynda\Database\Support\GeneratesUuid;
class AppConfig extends Model implements Auditable
{
    use HasFactory;
    use FileUploadTrait;
    use GeneratesUuid;
    use \OwenIt\Auditing\Auditable;
    protected $fillable = [
        'label',
        'name',
        'keyword',
        'value',
        'value_type',
        'description',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    /**
     * Ambil value sesuai type
     */
    public function getTypedValueAttribute()
    {
        if ($this->value === null) {
            return null;
        }

        return match ($this->value_type) {
            'int'   => (int) $this->value,
            'float'=> (float) $this->value,
            'bool' => filter_var($this->value, FILTER_VALIDATE_BOOLEAN),
            'json' => json_decode($this->value, true),
            'date' => \Carbon\Carbon::parse($this->value),
            default => $this->value, // text
        };
    }
}
