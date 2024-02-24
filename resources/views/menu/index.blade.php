@extends('layouts.app1')
  
@section('title', 'Menu Klassy Cafe')
  
@section('contents')
<div class="container">
    <div class="d-flex flex-column p-4">
        <div class="d-flex justify-content-between">
            <div>
                <h2>List Menu</h2>
            </div>
            <div>
                <a href="{{ route('menu.create') }}" class="btn btn-primary">
                    <i class="fa-solid fa-plus"></i> New
                </a>
            </div>
        </div>

        {{-- Tampilkan pesan sukses atau error, jika ada. --}}
        @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            <b>{{ Session::get('success') }}</b>
        </div>
        @elseif (Session::has('error'))
        <div class="alert alert-danger" role="alert">
            <b>{{ Session::get('error') }}</b>
        </div>
        @endif

        <hr>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Menu</th>
                        <th>Gambar</th>
                        <th>Menu</th>
                        <th>Deskripsi</th>
                        <th>harga</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $nilai = 1;
                    @endphp
                    @foreach($menus as $menu)
                    <tr>
                        <td>{{ $nilai }}</td>
                        @php
                        $nilai++;
                        @endphp
                        <td>{{ $menu->kd_menu }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $menu->image) }}" class="img-thumbnail" style="max-width: 25vw" 
                            alt="{{ $menu->name }}">
                        </td>
                        <td> {{ $menu->name }}</td>
                        <td>{{ $menu->description }}</td>
                        <td>{{ $menu->harga }}</td>
                        <td>
                            <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-warning">
                                <i class="fa-solid fa-edit"></i>Edit
                            </a>
                            
                            <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="handleDelete({{ $menu->id }})">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</div>
<script>
    const handleDelete = (id) => {
        if (confirm('Hapus data ini?')) {
            document.getElementById(`form-delete-${id}`).submit();
        }
    } 
</script>
@endsection
