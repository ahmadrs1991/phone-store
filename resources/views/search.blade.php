@extends('welcome')

@section('content')

            <div class="row">
            @foreach($items as $accsessory)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm" style="border-radius: 25px; overflow: hidden; transition: transform 0.2s ease;">
                        @if($accsessory->image)
                            <img src="{{ asset('images/mobiles/' . $accsessory->image) }}" class="card-img-top" alt="{{ $accsessory->name }}" style="height: 250px; width: 100%; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/250" class="card-img-top" alt="لا توجد صورة" style="height: 250px; width: 100%; object-fit: cover;">
                        @endif
                        <div class="card-body text-center">
                            <h5 class="card-title font-weight-bold">{{ $accsessory->name }}</h5>
                            <p class="card-text text-muted">: <span class="text-primary"> $ {{ $accsessory->price }} </span></p>
                            <p class="card-text text-muted"><span class="text-primary">{{ $accsessory->brand }}</span>: Model</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

@endsection
