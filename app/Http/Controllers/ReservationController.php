<?php

namespace App\Http\Controllers;
use App\Models\Reservation;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservation.index', compact('reservations'));
    }

    public function create()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'number_guests' => 'required|integer|min:1',
            'date' => 'required|date',
            'time' => 'required',
            'message' => 'nullable',
        ]);

        Reservation::create($request->all());

        return redirect('/home')->with('success', 'Reservation created successfully!');
    }

    public function edit($id)
    {
        $reservation = Reservation::find($id);
        return view('reservation.edit', compact('reservation'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'number_guests' => 'required|integer|min:1',
            'date' => 'required|date',
            'time' => 'required',
            'message' => 'nullable',
        ]);

        Reservation::find($id)->update($request->all());

        return redirect('/reservation')->with('success', 'Reservation updated successfully!');
    }

    public function destroy($id)
    {
        Reservation::find($id)->delete();

        return redirect('/reservation')->with('success', 'Reservation deleted successfully!');
    }
}
