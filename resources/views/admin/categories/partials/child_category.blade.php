
<li>
       <a href="{{ route('categories.show', $child_category->id) }}" class="btn btn-light mb-1  "> {{ $child_category->name }}     </a>
    @if($child_category->children->count())
        <ul>
            @foreach($child_category->children as $child)
                @include('admin.categories.partials.child_category', ['child_category' => $child])
            @endforeach
        </ul>
    @endif
</li>
