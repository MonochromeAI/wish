@extends('layouts.app1')
  
@section('title', 'Edit Menu')
  
@section('contents')
<div class="container">
    <div class="d-flex flex-column p-4">
        <form action="{{ route('menu.update', $menu->id) }}" method="post" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="d-flex justify-content-between">
                <div>
                    <h2>Edit Menu</h2>
                </div>
                <div>
                    <button type="submit" class="btn btn-success">
                        <i class="fa-solid fa-save"></i> Save
                    </button>
                </div>
            </div>

            {{-- List error validasi, jika ada --}}
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

            <h5>Kode Menu :</h5>
            <input type="text" id="kd_menu" name="kd_menu" class="w-50 mb-3" value="{{ $menu->kd_menu }}" required>

            <h5>Nama Gambar:</h5>
            <input type="text" id="name" name="name" class="w-50 mb-3" value="{{ $menu->name }}" required>
        
            <h5>Ganti Gambar:</h5>
            <input type="file" id="image" name="image" class="w-50 mb-3" accept="image/*">
        
            <h5>Deskripsi:</h5>
            <textarea id="description"  class="mb-3" name="description">{{ $menu->description }}</textarea>

            <h5>Harga :</h5>
            <input type="text" id="harga" name="harga" class="w-50 mb-3" value="{{ $menu->harga }}" required>
        
        </form>
</div>
@endsection
