@extends('layouts.app1')
  
@section('title', 'Edit Reservations')
  
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
        <form method="post" action="{{ route('reservation.update', $reservation->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $reservation->name }}">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $reservation->email }}">
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $reservation->phone }}">
            </div>

            <div class="form-group">
                <label for="number_guest">Number of Guests:</label>
                <input type="number" class="form-control" id="number_guests" name="number_guests" value="{{ $reservation->number_guests }}">
            </div>

            <div class="form-group">
                <label for="date">Date:</label>
                <input type="text" class="form-control" id="date" name="date" value="{{ $reservation->date }}">
            </div>

            <div class="form-group">
                <label for="time">Time:</label>
                <input type="text" class="form-control" id="time" name="time" value="{{ $reservation->time }}">
            </div>

            <div class="form-group">
                <label for="message">Message:</label>
                <textarea class="form-control" id="message" name="message">{{ $reservation->message }}</textarea>
            </div>
        
            <!-- tambahkan input untuk kolom lainnya sesuai kebutuhan -->
        
            <button type="submit" class="btn btn-success">
                <i class="fa-solid fa-save"></i> Save
            </button>

            
        </form>
</div>
@endsection
