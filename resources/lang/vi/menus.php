<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Menus Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in menu items throughout the system.
    | Regardless where it is placed, a menu item can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'title'  => 'Access Management',
            'export' => 'Export',
            'copy'   => 'Copy',
            'print'  => 'Print',

            'roles' => [
                'all'        => 'All Roles',
                'create'     => 'Create Role',
                'edit'       => 'Edit Role',
                'management' => 'Role Management',
                'main'       => 'Roles',
            ],

            'permissions' => [
                'all'        => 'All Permissions',
                'create'     => 'Create Permission',
                'edit'       => 'Edit Permission',
                'management' => 'Permission Management',
                'main'       => 'Permissions',
            ],

            'users' => [
                'all'               => 'All Users',
                'change-password'   => 'Change Password',
                'create'            => 'Create User',
                'deactivated'       => 'Deactivated Users',
                'deleted'           => 'Deleted Users',
                'edit'              => 'Edit User',
                'main'              => 'Users',
                'view'              => 'View User',
                'action'            => 'Action',
                'list'              => 'List',
                'add-new'           => 'Add new',
                'deactivated-users' => 'Deactivated Users',
                'deleted-users'     => 'Deleted Users',
            ],
        ],

        'log-viewer' => [
            'main'      => 'Log Viewer',
            'dashboard' => 'Dashboard',
            'logs'      => 'Logs',
        ],

        'sidebar' => [
            'dashboard' => 'Dashboard',
            'general'   => 'General',
            'system'    => 'System',
        ],

        'pages' => [
            'all'        => 'All Pages',
            'create'     => 'Create Page',
            'edit'       => 'Edit Page',
            'management' => 'Page Management',
            'main'       => 'Pages',
        ],

        'blogs' => [
            'all'        => 'Tất cả bài viết',
            'create'     => 'Thêm mới bài viết',
            'edit'       => 'Chỉnh sửa bài viết',
            'management' => 'Quản lý bài viết',
            'main'       => 'Các bài viết',
        ],

        'blogcategories' => [
            'all'        => 'Tất cả danh mục bài viết',
            'create'     => 'Thêm mới danh mục',
            'edit'       => 'Chỉnh sửa danh mục',
            'management' => 'Quản lý danh mục bài viết',
            'main'       => 'Trang CMS',
        ],

        'blogtags' => [
            'all'        => 'Tất cả tag bài viết',
            'create'     => 'Tạo mới tag',
            'edit'       => 'Chỉnh sửa tag',
            'management' => 'Quản lý tag bài viết',
            'main'       => 'Các tags bài viết',
        ],

        'blog' => [
            'all'        => 'Tất cả trang bài viết',
            'create'     => 'Thêm bài viết mới',
            'edit'       => 'Chỉnh sửa bài viết',
            'management' => 'Quản lý bài viết',
            'main'       => 'Các trang bài viết',
        ],

        'faqs' => [
            'all'        => 'All Faq Page',
            'create'     => 'Create Faq Page',
            'edit'       => 'Edit Faq Page',
            'management' => 'Faq Management',
            'main'       => 'Faq Pages',
        ],

        'Cài đặt' => [
            'all'        => 'Tất cả settings',
            'create'     => 'Thêm setting',
            'edit'       => 'Chỉnh sửa setting',
            'management' => 'Quản lý settings',
            'main'       => 'Settings',
        ],

        'menus' => [
            'all'        => 'All Menu',
            'create'     => 'Create Menu',
            'edit'       => 'Edit Menu',
            'management' => 'Menu Management',
            'main'       => 'Menus',
        ],

        'modules' => [
            'all'        => 'All Modules Page',
            'create'     => 'Create Module Page',
            'management' => 'Module Management',
            'main'       => 'Module Pages',
        ],
		"products" => [
			"all" => "Tất cả sản phẩm",
			"create" => "Thêm mới sản phẩm",
			"edit" => "Chỉnh sửa sản phẩm",
			"management" => "Quản lý sản phẩm",
			"main" => "Các sản phẩm",
		],
	"files" => [
		"all" => "All FileManagers",
		"create" => "Create FileManager",
		"edit" => "Edit FileManager",
		"management" => "FileManager Management",
		"main" => "FileManagers",
	],
	"productcategories" => [
		"all" => "Tất cả danh mục sản phẩm",
		"create" => "Thêm mới danh mục sản phẩm",
		"edit" => "Chỉnh sửa danh mục sản phẩm",
		"management" => "Quản lý danh mục sản phẩm",
		"main" => "Các danh mục sản ph",
	]
    ],

    'language-picker' => [
        'language' => 'Language',
        /*
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar'    => 'Arabic',
            'da'    => 'Danish',
            'de'    => 'German',
            'el'    => 'Greek',
            'en'    => 'English',
            'es'    => 'Spanish',
            'fr'    => 'French',
            'id'    => 'Indonesian',
            'it'    => 'Italian',
            'nl'    => 'Dutch',
            'pt_BR' => 'Brazilian Portuguese',
            'ru'    => 'Russian',
            'sv'    => 'Swedish',
            'th'    => 'Thai',
        ],
    ],
];
