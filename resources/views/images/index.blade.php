@extends('layouts.app1')
  
@section('title', 'Images Klassy Cafe')
  
@section('contents')
<div class="container">
    <div class="d-flex flex-column p-4">
        <div class="d-flex justify-content-between">
            <div>
                <h2>List Images</h2>
            </div>
            <div>
                <a href="{{ route('images.create') }}" class="btn btn-primary">
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
                        <th>Preview</th>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $nilai = 1;
                    @endphp
                    @foreach($images as $image)
                    <tr>
                        <td>{{ $nilai }}</td>
                        @php
                        $nilai++;
                        @endphp
                        <td>
                            <img src="{{ asset($image->image_path) }}" class="img-thumbnail" style="max-width: 25vw" 
                            alt="{{ $image->name }}">
                        </td>
                        <td> {{ $image->name }}</td>
                        <td>{{ $image->description }}</td>
                        <td>
                            <a href="{{ route('images.edit', $image->id) }}" class="btn btn-warning">
                                <i class="fa-solid fa-edit"></i>Edit
                            </a>
                            
                            <form action="{{ route('images.destroy', $image->id) }}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="handleDelete({{ $image->id }})">
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
