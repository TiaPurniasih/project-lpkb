<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        // Institution Identity
        'user_id',
        'responsible_person_name',
        'institution_name',
        'institution_head_name',
        // 'education_path',
        'organizing_body_name',
        'institution_phone',
        'establishment_date',
        // 'buddhist_education_type',
        'organizing_body_address',

        // Documents
        'registration_certificate_document',
        'articles_of_association_document',

        // Institution Address
        'province',
        'city',
        'district',
        'village',
        'institution_full_address',

        // Photos
        'facility_photo',
        'front_building_photo',
        'side_building_photo',
        'facility_photo_extra',

        // Bank data
        'bank_name',
        'bank_account_number',
        'bank_branch',
        'bank_account_photo',
    ];

    protected $casts = [
        'establishment_date' => 'date',
    ];
}
