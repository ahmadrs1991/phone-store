@extends('welcome')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h4">List</h1>
            <a href="{{ route('categories.create') }}" class="btn btn-success">Add New Category</a>
        </div>

       <!-- Display category details -->
    {{-- <h1>{{ $category->name }}</h1>

    <!-- Display mobiles in the main category -->
    <h2>Mobiles in this category:</h2>
    <ul>
        @foreach ($mobiles as $mobile)
            <li>{{ $mobile->name }}</li>
        @endforeach
    </ul> --}}

    <!-- Display children categories and their mobiles -->

      <div class="row">
            @foreach($mobiles as $mobile)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm" style="border-radius: 25px; overflow: hidden; transition:  ;">
                        @if($mobile->image)
                            <img src="{{ asset('images/mobiles/' . $mobile->image) }}" class="card-img-top" alt="{{ $mobile->name }}" style="height: 250px; width: 100%; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/250" class="card-img-top" alt="لا توجد صورة" style="height: 250px; width: 100%; object-fit: cover;">
                        @endif
                        <div class="card-body text-center">
                            <h5 class="card-title font-weight-bold">{{ $mobile->name }}</h5>
                            <p class="card-text text-muted">السعر: <span class="text-primary"> $ {{ $mobile->price }} </span></p>
                            <p class="card-text text-muted"><span class="text-primary">{{ $mobile->brand }}</span>: العلامة التجارية</p>
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
            </tbody>
        </table>
    </div>
     <h2>Child Categories and their Mobiles:</h2>
    @foreach ($childMobiles as $childId => $mobiles)
            @foreach ($mobiles as $mobile)
             <div class="col-md-4 mb-4">
                    <div class="card shadow-sm" style="border-radius: 25px; overflow: hidden; transition:  ;">
                        @if($mobile->image)
                            <img src="{{ asset('images/mobiles/' . $mobile->image) }}" class="card-img-top" alt="{{ $mobile->name }}" style="height: 250px; width: 100%; object-fit: cover;">
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
            @endforeach
    @endforeach


@endsection
