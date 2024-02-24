@extends('layouts.app1')
  
@section('title', 'Reservation Klassy Cafe')
  
@section('contents')
<div class="container">
    <div class="d-flex flex-column p-4">
        <div class="d-flex justify-content-between">
            <div>
                <h2>List Reservation</h2>
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
            <th>No Telepon</th>
            <th>Berapa Pengunjung</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Pesan</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @php
         $nilai = 1;
        @endphp
        @foreach($reservations as $reservation)
            <tr>
                <td>{{ $nilai }}</td>
                @php
                $nilai++;
                @endphp
                <td>{{ $reservation->name }}</td>
                <td>{{ $reservation->email }}</td>
                <td>{{ $reservation->phone }}</td>
                <td>{{ $reservation->number_guests }}</td>
                <td>{{ $reservation->date }}</td>
                <td>{{ $reservation->time }}</td>
                <td>{{ $reservation->message }}</td>
                <!-- tambahkan kolom lain sesuai kebutuhan -->
                <td>
                    <a href="{{ route('reservation.edit', $reservation->id) }}"class="btn btn-warning">
                        <i class="fa-solid fa-edit"></i>Edit
                    </a>
                    <!-- tambahkan link atau tombol untuk aksi lainnya -->
                    <form action="{{ route('reservation.destroy', $reservation->id) }}" method="POST" >
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="handleDelete({{ $reservation->id }})">
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
