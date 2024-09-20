@extends('welcome')

@section('title', 'Categories')
@section('content')

        <div class="container1">

         @foreach($categories as $category)
         <div class="section">
            <li>
                 <a href="{{ route('categories.show', $category->id) }}" class="btn btn-light mb-3 "> {{ $category->name }}     </a>
                @if($category->children->count())
                    <ul>
                        @foreach($category->children as $child)
                            @include('admin.categories.partials.child_category', ['child_category' => $child])
                        @endforeach
                    </ul>
                @endif
            </li>
            </div>

        @endforeach


@endsection
