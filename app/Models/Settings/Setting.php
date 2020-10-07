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
        'app_name',
        'logo',
        'favicon',
        'seo_title',
        'seo_keyword',
        'seo_description',
//        Chỉnh sửa chung
        'fb_link',
        'twitter_link',
        'printerest_link',
        'rss_link',

        'header_color',
        'footer_color',
        'header_title',

        'blog_title',
        'product_title',
        'contact_title',
        'document_title',
        'event_title',

//        Trang chủ
        'section_index_1',
        'section_index_2',
        'section_index_3',

//        Company Detail
        'company_logo',
        'company_name',
        'company_contact_1',
        'company_contact_2',
        'company_address',
        'company_email',
        'company_map',
//        End Company Detail

//    Contact
//            Contact 1
        'contact_1_title',
        'contact_name_1_0',
        'contact_number_1_0',
        'contact_name_1_1',
        'contact_number_1_1',
        'contact_name_1_2',
        'contact_number_1_2',
        'contact_name_1_3',
        'contact_number_1_3',

//            Contact 2
        'contact_2_title',
        'contact_name_2_0',
        'contact_number_2_0',
        'contact_name_2_1',
        'contact_number_2_1',
        'contact_name_2_2',
        'contact_number_2_2',
        'contact_name_2_3',
        'contact_number_2_3',

//            Contact 3
        'contact_3_title',
        'contact_name_3_0',
        'contact_number_3_0',
        'contact_name_3_1',
        'contact_number_3_1',
        'contact_name_3_2',
        'contact_number_3_2',
        'contact_name_3_3',
        'contact_number_3_3',
//    End Contact
        'terms',
        'disclaimer',
        'google_analytics'
    ];

    // $attributes
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('access.settings_table');
    }
}
