<meta name="title" content="{{ $blog->meta_title }}">
<meta name="keywords" content="{{ $blog->meta_keywords }}">
<meta name="author" content="{{ env('APP_AUTHOR') }}">
<meta name="description" content="{{ $blog->meta_description }}">
<meta name="canonical" content="{{ $blog->cannonical_link ? $blog->cannonical_link : env('APP_URL') }}">
<meta name=”robots” content="index, follow">

<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $blog->meta_title }}" />
<meta property="og:description" content="{{ $blog->meta_description }}" />
<meta property="og:image" content="{{ Storage::disk('public')->url('img/blog/' . $blog->featured_image) }}" />
<meta property="og:url" content="{{ route('frontend.blogs.detail', ['slug' => $blog->slug]) }}" />
<meta property="og:site_name" content="{{ appSettings()->app_name }}" />
