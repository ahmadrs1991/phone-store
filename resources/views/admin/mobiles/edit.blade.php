@extends('welcome')

@section('title', 'تعديل الجوال')

@section('content')
    <div class="container">
        <h1>تعديل الجوال</h1>
        <form action="{{ route('mobiles.update', $mobile->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">اسم الجوال</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $mobile->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">السعر</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $mobile->price) }}" required>
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="brand"> Model</label>
                <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand" value="{{ old('brand', $mobile->brand) }}" required>
                @error('brand')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">الوصف</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $mobile->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">الصورة</label>
                <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
                @if($mobile->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $mobile->image) }}" alt="{{ $mobile->name }}" width="100">
                    </div>
                @endif
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">تحديث</button>
            <a href="{{ route('mobiles.index') }}" class="btn btn-secondary">إلغاء</a>
        </form>
    </div>
@endsection
