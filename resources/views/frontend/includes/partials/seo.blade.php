<meta name="title" content="{{ appSettings()->seo_title }}">
<meta name="keywords" content="{{ appSettings()->seo_keyword }}">
<meta name="author" content="{{ env('APP_AUTHOR') }}">
<meta name="description" content="{{ appSettings()->seo_description }}">
<meta name="canonical" content="{{ env('APP_URL') }}">
<meta name=”robots” content="index, follow">

<meta property="og:type" content="article" />
<meta property="og:title" content="{{ appSettings()->seo_title }}" />
<meta property="og:description" content="{{ appSettings()->seo_description }}" />
<meta property="og:image" content="{{ Storage::disk('public')->url('img/settings/logo/' . appSettings()->logo) }}" />
<meta property="og:url" content="{{ env('APP_URL') }}" />
<meta property="og:site_name" content="{{ appSettings()->app_name }}" />

<meta name="twitter:title" content="{{ appSettings()->seo_title }}">
<meta name="twitter:description" content="{{ appSettings()->seo_description }}">
<meta name="twitter:image" content="{{ Storage::disk('public')->url('img/settings/logo/' . appSettings()->logo) }}">
<meta name="twitter:site" content="{{ env('APP_URL') }}">
<meta name="twitter:creator" content="{{ env('APP_AUTHOR') }}">

