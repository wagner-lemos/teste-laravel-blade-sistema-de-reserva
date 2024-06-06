<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'date' => ['required', 'date', function ($attribute, $value, $fail) {
                if (date('N', strtotime($value)) == 7) {
                    $fail('Não é permitido reservas aos domingos.');
                }
            }],
            'start_time' => 'required|date_format:H:i',
            'end_time' => ['required', 'date_format:H:i', 'after:start_time'],
        ]);

        $startDateTime = $validatedData['date'] . ' ' . $validatedData['start_time'];
        $endDateTime = $validatedData['date'] . ' ' . $validatedData['end_time'];

        $horarioConflito = Reservation::where('date', $validatedData['date'])
            ->where(function ($query) use ($startDateTime, $endDateTime) {
                $query->whereBetween('start_time', [$startDateTime, $endDateTime])
                    ->orWhereBetween('end_time', [$startDateTime, $endDateTime])
                    ->orWhere(function ($query) use ($startDateTime, $endDateTime) {
                        $query->where('start_time', '<', $startDateTime)
                            ->where('end_time', '>', $endDateTime);
                    });
            })->get();

        if ($horarioConflito->count() > 0) {
            return redirect()->back()->with('error', 'Não há reservas disponíveis para esse horário.');
        }
        
        $reservation = new Reservation();
        $reservation->name = $validatedData['name'];
        $reservation->email = $validatedData['email'];
        $reservation->date = $validatedData['date'];
        $reservation->start_time = $validatedData['start_time'];
        $reservation->end_time = $validatedData['end_time'];
        $reservation->save();

        return redirect()->back()->with('success', 'Reservado com sucesso!');
    }
}
