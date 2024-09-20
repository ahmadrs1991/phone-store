@extends('welcome')

@section('title', 'تعديل الجوال')

@section('content')
    <div class="container">
        <h1>تعديل الجوال</h1>
        <form action="{{ route('accessories.update', $accessory->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name"  > اسم المحلق    </label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $accessory->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">السعر</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $accessory->price) }}" required>
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="brand">العلامة التجارية</label>
                <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand" value="{{ old('brand', $accessory->brand) }}" required>
                @error('brand')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">الوصف</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $accessory->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">الصورة</label>
                <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
                @if($accessory->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $accessory->image) }}" alt="{{ $accessory->name }}" width="100">
                    </div>
                @endif
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">تعديل   </button>
            <a href="{{ route('accessories.index') }}" class="btn btn-secondary">إلغاء</a>
        </form>
    </div>
@endsection
