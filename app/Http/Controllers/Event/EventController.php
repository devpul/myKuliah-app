<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('event.event');
    }

    public function events()
    {
        $events = Event::all();

        $formatted_events = $events->map(function($event) {
            return [
                'title' => $event->title ?? 'Event Tanpa Judul', // <--- Pastikan ada koma di sini
                'start' => $event->start_time->format('Y-m-d H:i:s'), // <--- Pastikan ada koma di sini
                'end' => $event->end_time ? $event->end_time->format('Y-m-d H:i:s') : null, // <--- Pastikan ada koma di sini (kecuali ini baris terakhir)
                'backgroundColor' => $event->color,
            ];
        })
        ->filter() 
        ->values();

        return response()->json($formatted_events);
    }
}
