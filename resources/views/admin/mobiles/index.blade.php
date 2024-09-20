@extends('welcome')

@section('title', 'قائمة الجوالات')

@section('content')

        <h1 class="mt-4 mb-4 text-center">قائمة الاجهزة</h1>

         <a href="{{ route('mobiles.create') }}" class="btn btn-primary mb-4">إضافة جوال جديد</a>

          <div class="container1">
         @foreach($categories as $category)
         <div class="section">
            <li>
                 <a href="{{ route('mobiles.create') }}" class="btn btn-light mb-1 "> {{ $category->name }}     </a>
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
    </div>
<div>
 <br><br><br><br><br>
 <br><br>
</div>
 <div class="container">
        <div class="row">
            @foreach($mobiles as $mobile)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm" style="border-radius: 25px; overflow: hidden; transition: transform 0.2s ease;">
                        @if($mobile->image)
                            <img src="{{ asset('images/mobiles/' . $mobile->image) }}" class="card-img-top" alt="{{ $mobile->name }}" style="height: 250px; width: 100%; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/250" class="card-img-top" alt="لا توجد صورة" style="height: 250px; width: 100%; object-fit: cover;">
                        @endif
                        <div class="card-body text-center">
                            <h5 class="card-title font-weight-bold">{{ $mobile->name }}</h5>
                            <p class="card-text text-muted">السعر: <span class="text-primary"> $ {{ $mobile->price }} </span></p>
                            <p class="card-text text-muted"><span class="text-primary">{{ $mobile->brand }}</span>:  Model</p>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('mobiles.edit', $mobile->id) }}" class="btn btn-warning btn-sm mx-2">تعديل</a>
                                <form action="{{ route('mobiles.destroy', $mobile->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mx-2" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
  </div>

    <style>
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

    </style>
@endsection
