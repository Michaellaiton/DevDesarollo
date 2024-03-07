<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;



class CalendarController extends Controller
{
    //

    public function index()
    {
    $events = array();
    $bookings = Booking::all();
    foreach ($bookings as $booking){
        // foreach($booking as $booking){
            // $color = null;
            // if ($booking->title == 'Test') {
            //     # code...
            //     $color = '#924ACE';

            // }
            // if ($booking->title == 'lolito') {
            //     # code...
            //     $color = '#68B01A';

            // }
            

        $events[]= [
            'id'  => $booking->id,
            'title' => $booking->title,
            'start' => $booking->start_date,
            'end' => $booking->end_date,
            // 'color' => $color
            'color' => 'black',
            'textColor' => '#CBD5D4',
            'borderColor' => 'red',
        ];
    }




    return view('calendar.index', ['events' => $events]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string'
        ]);
        $booking = Booking::create([
            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        $color = null;

        if($booking->title == 'Test'){
            $color = '#924ACE';
        }

        return response()->json([
            'id' => $booking->id,
            'start' => $booking->start_date,
            'end' => $booking->end_date,
            'title' => $booking->title,
            'color' => $color ? $color:'',

        ]);
    }

    public function update(Request $request ,$id){
        $booking = Booking::find($id);
        if(!$booking){
            return response()->json([
                'error' => 'No se puede localizar el evento'
            ], 404);
        }
        $booking->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,

        ]);
        return response()->json('Event Updated');
    }

    public function destroy($id)
    {
        try {
            // Busca el evento por ID
            $booking = Booking::find($id);

            // Verifica si el evento existe
            if (!$booking) {
                return response()->json([
                    'error' => 'No se puede localizar el evento',
                ], 404);
            }

            // Elimina el evento
            $booking->delete();

            // Devuelve una respuesta exitosa
            return response()->json(['id' => $id]);
        } catch (\Exception $e) {
            // En caso de error, devuelve una respuesta con detalles del error
            return response()->json([
                'error' => 'Error al eliminar el evento: ' . $e->getMessage(),
            ], 500);
        }
    }
}
