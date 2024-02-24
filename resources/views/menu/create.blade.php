@extends('layouts.app1')
  
@section('title', 'Create Menu')
  
@section('contents')
<div class="container">
    <div class="d-flex flex-column p-4">
        <form action="{{ route('menu.store') }}" method="post" enctype="multipart/form-data">
            <div class="d-flex justify-content-between">
                <div>
                    <h2>Add Menu</h2>
                </div>
                <div>
                    <button type="submit" class="btn btn-success">
                        <i class="fa-solid fa-save"></i> Save
                    </button>
                </div>
            </div>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            
            <hr>

            @csrf
            <h5>Kode Menu :</h5>
    <input type="text" id="kd_menu" class="w-50 mb-3" name="kd_menu"  value="{{ old('kd_menu') }}" required>

            <h5>Nama :</h5>
    <input type="text" id="name" class="w-50 mb-3" name="name" value="{{ old('name') }}" required>

    <h5>Pilih Gambar : </h5>
    <input type="file" id="image" name="image" class="w-50 mb-3" required accept="image/*">

    <h5>Deskripsi :</h5>
    <textarea id="description" class="mb-3" name="description" >{{ old('description') }}</textarea>

    <h5>Harga :</h5>
    <input type="text" id="harga" class="w-50 mb-3" name="harga" value="{{ old('harga') }}" required>
</form>
    </div>
</div>

@endsection
