@extends('welcome')

@section('title', 'قائمة الجوالات')

@section('content')

   @if(auth()->user() && auth()->user()->usertyp == 'admin')
    <h1 class="mt-4 mb-4 text-center">قائمة الاكسسورات</h1>
    <a href="{{ route('accessories.create') }}" class="btn btn-primary mb-4">إضافة ملحق جديد</a>
    @endif


 <br><br><br><br><br>
 <br><br>
</div>
 <div class="container">
        <div class="row">
            @foreach($accessories as $accsessory)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm" style="border-radius: 25px; overflow: hidden; transition: transform 0.2s ease;">
                        @if($accsessory->image)
                            <img src="{{ asset('images/accessories/' . $accsessory->image) }}" class="card-img-top" alt="{{ $accsessory->name }}" style="height: 250px; width: 100%; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/250" class="card-img-top" alt="لا توجد صورة" style="height: 250px; width: 100%; object-fit: cover;">
                        @endif
                        <div class="card-body text-center">
                            <h5 class="card-title font-weight-bold">{{ $accsessory->name }}</h5>
                            <p class="card-text text-muted">السعر: <span class="text-primary"> $ {{ $accsessory->price }} </span></p>
                            <p class="card-text text-muted"><span class="text-primary">{{ $accsessory->brand }}</span>: العلامة التجارية</p>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('accessories.edit', $accsessory->id) }}" class="btn btn-warning btn-sm mx-2">تعديل</a>
                                <form action="{{ route('accessories.destroy', $accsessory->id) }}" method="POST">
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
