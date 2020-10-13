<meta name="title" content="{{ $product->meta_title }}">
<meta name="keywords" content="{{ $product->meta_keywords }}">
<meta name="author" content="{{ env('APP_AUTHOR') }}">
<meta name="description" content="{{ $product->meta_description }}">
<meta name="canonical" content="{{ $product->cannonical_link ? $product->cannonical_link : env('APP_URL') }}">
<meta name=”robots” content="index, follow">

<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $product->meta_title }}" />
<meta property="og:description" content="{{ $product->meta_description }}" />
<meta property="og:image" content="{{ Storage::disk('public')->url('img/blog/' . $product->featured_image) }}" />
<meta property="og:url" content="{{ route('frontend.products.detail', ['slug' => $product->slug]) }}" />
<meta property="og:site_name" content="{{ appSettings()->app_name }}" />
