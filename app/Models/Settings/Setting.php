<?php

namespace App\Models\Settings;

use App\Models\BaseModel;

class Setting extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'logo',
        'favicon',
        'seo_title',
        'seo_keyword',
        'seo_description',

//        Company Detail
        'company_logo',
        'company_name',
        'company_contact_1',
        'company_contact_2',
        'company_address',
        'company_email',
        'company_map',
//        End Company Detail

//    Banner
        'banners',
//    End Banner

//    Partner
        'partners',
//    End Partner

        'from_name',
        'from_email',
        'footer_text',
        'copyright_text',
        'terms',
        'disclaimer',
        'google_analytics'
    ];

    protected $casts = [
        'banner' => 'array',
        'partner' => 'array',
    ];
    // $attributes
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('access.settings_table');
    }
}
