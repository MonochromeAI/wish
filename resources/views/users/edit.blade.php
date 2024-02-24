@extends('layouts.app1')
  
@section('title', 'Edit Users')
  
@section('contents')
<div class="container">
    <div class="d-flex flex-column p-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        <form method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            
            <label for="name">Nama:</label>
            <input type="text" name="name" value="{{ $user->name }}" required>
        
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ $user->email }}" required>

            <label for="role">Role:</label>
<select name="role" required>
    <option value="pengunjung" {{ $user->role === 'pengunjung' ? 'selected' : '' }}>Pengunjung</option>
    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
</select>
        
            <!-- tambahkan input untuk kolom lainnya sesuai kebutuhan -->
        
            <button type="submit" class="btn btn-success">
                <i class="fa-solid fa-save"></i> Save
            </button>

            
        </form>
</div>
@endsection
