@extends('layouts.app1')
  
@section('title', 'Users Klassy Cafe')
  
@section('contents')
<div class="container">
    <div class="d-flex flex-column p-4">
        <div class="d-flex justify-content-between">
            <div>
                <h2>List Users</h2>
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
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php
         $nilai = 1;
        @endphp
        @foreach($users as $user)
            <tr>
                <td>{{ $nilai }}</td>
                @php
                $nilai++;
                @endphp
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <!-- tambahkan kolom lain sesuai kebutuhan -->
                <td>
                    <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                    <!-- tambahkan link atau tombol untuk aksi lainnya -->
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
