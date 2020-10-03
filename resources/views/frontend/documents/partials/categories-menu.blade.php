<div class="section2_left1 menu">
    <ul>
        @foreach($categories as $category)
            <li class="@isset($active_category) @if($category->id == $active_category->id) active @endif @endisset">
                <a class="muiten" href="{{ route('frontend.documents.listByCategory', [ 'slug' => $category->slug]) }}">
                    {{ $category->name }}
                </a>
            </li>
        @endforeach
    </ul>

</div>
