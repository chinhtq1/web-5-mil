
@isset($active_category)
    <meta name="title" content="{{ $active_category->name }}">
@else
    <meta name="title" content="{{ appSettings()->seo_title }}">
@endisset


<meta name="keywords" content="{{ appSettings()->seo_keyword }}">
<meta name="author" content="{{ env('APP_AUTHOR') }}">
<meta name="description" content="{{ appSettings()->seo_description }}">
<meta name="canonical" content="{{ route('frontend.documents.index') }}">
<meta name=”robots” content="index, follow">

<meta property="og:type" content="article" />

@isset($active_category)
    <meta property="og:title" content="{{ $active_category->name }}">
@else
    <meta property="og:title" content="{{ appSettings()->seo_title }}" />
@endisset

<meta property="og:description" content="{{ appSettings()->seo_description }}" />
<meta property="og:image" content="{{ Storage::disk('public')->url('img/settings/logo/' . appSettings()->logo) }}" />
<meta property="og:url" content="{{ route('frontend.documents.index') }}" />
<meta property="og:site_name" content="{{ appSettings()->app_name }}" />

