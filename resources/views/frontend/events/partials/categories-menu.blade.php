<div class="section2_left1 menu">
    <h4>{{ appSettings()->blog_title ? appSettings()->blog_title  : "Bài viết"}}</h4>
    <ul>
        @foreach($blogMenus as $category)
            <li>
                <a class="muiten" href="{{ route('frontend.blogs.listByCategory', ['slug' => $category->slug]) }}">
                    {{ $category->name }}
                </a>
            </li>
        @endforeach
    </ul>
    <hr>
    <h4>{{ appSettings()->product_title ? appSettings()->product_title : "Sản phẩm"}}</h4>
    <ul>
        @foreach($productMenus as $category)
            <li>
                <a class="muiten" href="{{ route('frontend.products.listByCategory', ['slug' => $category->slug]) }}">
                    {{ $category->name }}
                </a>
            </li>
        @endforeach
    </ul>
    <hr>
    <h4>{{ appSettings()->document_title ? appSettings()->document_title : "Tài liệu" }}</h4>
    <ul>
        @foreach($documentMenus as $category)
            <li>
                <a class="muiten" href="{{ route('frontend.documents.listByCategory', ['slug' => $category->slug]) }}">
                    {{ $category->name }}
                </a>
            </li>
        @endforeach
    </ul>

</div>
