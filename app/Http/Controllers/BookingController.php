<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Display the calendar and booking form.
     */
    public function index()
    {
        return view('bookings.index');
    }

    /**
     * Return all bookings as events for FullCalendar.
     */
    public function getEvents()
    {
        $bookings = Booking::all();
        $events = [];

        foreach ($bookings as $booking) {
            // FullCalendar uses an exclusive end date, so add one day.
            $end = date('Y-m-d', strtotime($booking->check_out . ' +1 day'));
            $events[] = [
                'id'    => $booking->id,
                'title' => $booking->homestay . ' - ' . $booking->nama_penyewa,
                'start' => $booking->check_in,
                'end'   => $end,
                'extendedProps' => [
                    'tujuan' => $booking->tujuan,
                    'alamat' => $booking->alamat,
                    'dewasa' => $booking->dewasa,
                    'kanak'  => $booking->kanak,
                ]
            ];
        }
        return response()->json($events);
    }

    /**
     * Store a new booking.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tujuan'        => 'required|in:Menginap,Kenduri',
            'nama_penyewa'  => 'required|string|max:255',
            'alamat'        => 'required|string|max:255',
            'check_in'      => 'required|date',
            'check_out'     => 'required|date|after_or_equal:check_in',
            'dewasa'        => 'required|integer|min:0',
            'kanak'         => 'required|integer|min:0',
            'homestay'      => 'required|in:Rumah Kayu Merbau,Rumah Batu Jati,Rumah Batu Meranti',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Check if the same homestay is already booked on any overlapping date.
        $existing = Booking::where('homestay', $request->homestay)
            ->where(function($query) use ($request) {
                $query->whereBetween('check_in', [$request->check_in, $request->check_out])
                      ->orWhereBetween('check_out', [$request->check_in, $request->check_out])
                      ->orWhere(function($q) use ($request) {
                          $q->where('check_in', '<=', $request->check_in)
                            ->where('check_out', '>=', $request->check_out);
                      });
            })->first();

        if ($existing) {
            return redirect()->back()->with('error', 'Homestay telah ditempah pada tarikh tersebut.');
        }

        Booking::create($request->all());
        return redirect()->back()->with('success', 'Tempahan berjaya disimpan.');
    }

    /**
     * Return a booking as JSON for editing.
     */
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        return response()->json($booking);
    }

    /**
     * Update an existing booking.
     */
    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'tujuan'        => 'required|in:Menginap,Kenduri',
            'nama_penyewa'  => 'required|string|max:255',
            'alamat'        => 'required|string|max:255',
            'check_in'      => 'required|date',
            'check_out'     => 'required|date|after_or_equal:check_in',
            'dewasa'        => 'required|integer|min:0',
            'kanak'         => 'required|integer|min:0',
            'homestay'      => 'required|in:Rumah Kayu Merbau,Rumah Batu Jati,Rumah Batu Meranti',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Exclude the current booking from the conflict check.
        $existing = Booking::where('homestay', $request->homestay)
            ->where('id', '<>', $id)
            ->where(function($query) use ($request) {
                $query->whereBetween('check_in', [$request->check_in, $request->check_out])
                      ->orWhereBetween('check_out', [$request->check_in, $request->check_out])
                      ->orWhere(function($q) use ($request) {
                          $q->where('check_in', '<=', $request->check_in)
                            ->where('check_out', '>=', $request->check_out);
                      });
            })->first();

        if ($existing) {
            return redirect()->back()->with('error', 'Homestay telah ditempah pada tarikh tersebut.');
        }

        $booking->update($request->all());
        return redirect()->back()->with('success', 'Tempahan berjaya dikemaskini.');
    }

    /**
     * Delete a booking.
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->back()->with('success', 'Tempahan berjaya dipadam.');
    }

    /**
     * List all bookings in a table.
     */
    public function list()
    {
        $bookings = Booking::all();
        return view('bookings.list', compact('bookings'));
    }

    /**
     * Show a separate edit page (for list view editing).
     */
    public function editPage($id)
    {
        $booking = Booking::findOrFail($id);
        return view('bookings.edit', compact('booking'));
    }
}

