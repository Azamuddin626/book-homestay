<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{

    /**
     * Show the form for creating a new public booking.
     */
    public function publicCreate()
    {
        return view('bookings.public-create');
    }
    /**
     * Store a new lead and prepare WhatsApp redirect.
     */
    public function publicStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tujuan'        => 'required|in:Menginap,Kenduri',
            'nama_penyewa'  => 'required|string|max:255',
            'alamat'        => 'required|string|max:255',
            'telefon'       => 'required|string|max:20',
            'check_in'      => 'required|date',
            'check_out'     => 'required|date|after_or_equal:check_in',
            'dewasa'        => 'required|integer|min:0',
            'kanak'         => 'required|integer|min:0',
            'homestay'      => 'required|in:Rumah Kayu Merbau,Rumah Batu Jati,Rumah Batu Meranti,Semua Rumah',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Check for existing bookings at the same time
        if ($request->homestay === 'Semua Rumah') {
            $homes = ['Rumah Kayu Merbau', 'Rumah Batu Jati', 'Rumah Batu Meranti'];

            foreach ($homes as $home) {
                $existing = Booking::where('homestay', $home)
                    ->where(function ($query) use ($request) {
                        $query->whereBetween('check_in', [$request->check_in, $request->check_out])
                            ->orWhereBetween('check_out', [$request->check_in, $request->check_out])
                            ->orWhere(function ($q) use ($request) {
                                $q->where('check_in', '<=', $request->check_in)
                                    ->where('check_out', '>=', $request->check_out);
                            });
                    })->first();

                if ($existing) {
                    return response()->json([
                        'success' => false,
                        'message' => $home . ' sudah ditempah untuk tarikh tersebut.'
                    ], 400);
                }
            }
        } else {
            // Check for existing booking at the selected house
            $existing = Booking::where('homestay', $request->homestay)
                ->where(function ($query) use ($request) {
                    $query->whereBetween('check_in', [$request->check_in, $request->check_out])
                        ->orWhereBetween('check_out', [$request->check_in, $request->check_out])
                        ->orWhere(function ($q) use ($request) {
                            $q->where('check_in', '<=', $request->check_in)
                                ->where('check_out', '>=', $request->check_out);
                        });
                })->first();

            if ($existing) {
                return response()->json([
                    'success' => false,
                    'message' => $request->homestay . ' sudah ditempah untuk tarikh tersebut.'
                ], 400);
            }
        }

        // Try to create a lead in the leads table first
        try {
            \App\Models\Lead::create([
                'tujuan'       => $request->tujuan,
                'nama_penyewa' => $request->nama_penyewa,
                'alamat'       => $request->alamat,
                'telefon'      => $request->telefon,
                'check_in'     => $request->check_in,
                'check_out'    => $request->check_out,
                'dewasa'       => $request->dewasa,
                'kanak'        => $request->kanak,
                'homestay'     => $request->homestay,
                'status'       => 'pending'
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Permintaan tempahan anda telah direkodkan.'
            ]);
        } catch (\Exception $e) {
            // If the leads table doesn't exist yet, try to save as a booking with lead status
            try {
                Booking::create([
                    'tujuan'       => $request->tujuan,
                    'nama_penyewa' => $request->nama_penyewa,
                    'alamat'       => $request->alamat,
                    'check_in'     => $request->check_in,
                    'check_out'    => $request->check_out,
                    'dewasa'       => $request->dewasa,
                    'kanak'        => $request->kanak,
                    'homestay'     => $request->homestay,
                    'status'       => 'lead' // Mark as a lead in the bookings table
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Permintaan tempahan anda telah direkodkan.'
                ]);
            } catch (\Exception $innerEx) {
                return response()->json([
                    'success' => false,
                    'message' => 'Ralat semasa memproses permintaan anda: ' . $e->getMessage() . ' ' . $innerEx->getMessage()
                ], 500);
            }
        }
    }

    public function index()
    {
        return view('bookings.index');
    }

    /**
     * Return all bookings as events for FullCalendar.
     */
    public function getEvents(Request $request)
    {
        $query = Booking::query();

        // Apply filters
        if ($request->has('tujuan') && $request->has('homestay')) {
            // If both tujuan and homestay filters are provided, show bookings that match either:
            // 1. The selected tujuan + homestay combination
            // 2. Kenduri bookings for the selected homestay (regardless of the selected tujuan)
            $query->where(function ($q) use ($request) {
                $q->where(function ($inner) use ($request) {
                    $inner->where('tujuan', $request->tujuan)
                        ->where('homestay', $request->homestay);
                })->orWhere(function ($inner) use ($request) {
                    $inner->where('tujuan', 'Kenduri')
                        ->where('homestay', $request->homestay);
                });
            });
        } else if ($request->has('tujuan')) {
            $query->where('tujuan', $request->tujuan);
        } else if ($request->has('homestay')) {
            $query->where('homestay', $request->homestay);
        }

        $bookings = $query->get();
        $events = [];

        foreach ($bookings as $booking) {
            // FullCalendar uses an exclusive end date, so add one day
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
            'homestay'      => 'required|in:Rumah Kayu Merbau,Rumah Batu Jati,Rumah Batu Meranti,Semua Rumah',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Special handling for "Semua Rumah" (All Houses) option
        if ($request->homestay === 'Semua Rumah') {
            $homestays = ['Rumah Kayu Merbau', 'Rumah Batu Jati', 'Rumah Batu Meranti'];
            $success = true;
            $conflictHomestay = null;

            // First, check if any of the homestays are already booked for the selected dates
            foreach ($homestays as $homestay) {
                $existing = Booking::where('homestay', $homestay)
                    ->where(function ($query) use ($request) {
                        $query->whereBetween('check_in', [$request->check_in, $request->check_out])
                            ->orWhereBetween('check_out', [$request->check_in, $request->check_out])
                            ->orWhere(function ($q) use ($request) {
                                $q->where('check_in', '<=', $request->check_in)
                                    ->where('check_out', '>=', $request->check_out);
                            });
                    })->first();

                if ($existing) {
                    $success = false;
                    $conflictHomestay = $homestay;
                    break;
                }
            }

            if (!$success) {
                return redirect()->back()->with('error', $conflictHomestay . ' telah ditempah pada tarikh tersebut.');
            }

            // If all homestays are available, create a booking for each
            foreach ($homestays as $homestay) {
                $bookingData = $request->all();
                $bookingData['homestay'] = $homestay;
                Booking::create($bookingData);
            }

            return redirect()->back()->with('success', 'Tempahan untuk semua rumah berjaya disimpan.');
        } else {
            // Original logic for individual homestay booking
            $existing = Booking::where('homestay', $request->homestay)
                ->where(function ($query) use ($request) {
                    $query->whereBetween('check_in', [$request->check_in, $request->check_out])
                        ->orWhereBetween('check_out', [$request->check_in, $request->check_out])
                        ->orWhere(function ($q) use ($request) {
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
            'homestay'      => 'required|in:Rumah Kayu Merbau,Rumah Batu Jati,Rumah Batu Meranti,Semua Rumah',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Exclude the current booking from the conflict check.
        $existing = Booking::where('homestay', $request->homestay)
            ->where('id', '<>', $id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('check_in', [$request->check_in, $request->check_out])
                    ->orWhereBetween('check_out', [$request->check_in, $request->check_out])
                    ->orWhere(function ($q) use ($request) {
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
     * List all bookings in a table with filters and pagination.
     */
    public function list(Request $request)
    {
        $query = Booking::query();
        $pastQuery = Booking::query();
        $today = date('Y-m-d');

        // Apply filters if provided
        if ($request->has('tujuan') && !empty($request->tujuan)) {
            $query->where('tujuan', $request->tujuan);
            $pastQuery->where('tujuan', $request->tujuan);
        }

        if ($request->has('homestay') && !empty($request->homestay)) {
            $query->where('homestay', $request->homestay);
            $pastQuery->where('homestay', $request->homestay);
        }

        if ($request->has('from_date') && !empty($request->from_date)) {
            $query->where('check_in', '>=', $request->from_date);
            $pastQuery->where('check_in', '>=', $request->from_date);
        }

        if ($request->has('to_date') && !empty($request->to_date)) {
            $query->where('check_out', '<=', $request->to_date);
            $pastQuery->where('check_out', '<=', $request->to_date);
        }

        if ($request->has('nama_penyewa') && !empty($request->nama_penyewa)) {
            $query->where('nama_penyewa', 'like', '%' . $request->nama_penyewa . '%');
            $pastQuery->where('nama_penyewa', 'like', '%' . $request->nama_penyewa . '%');
        }

        if ($request->has('status') && !empty($request->status)) {
            $query->where('status', $request->status);
            $pastQuery->where('status', $request->status);
        } else {
            // By default, exclude lead entries from the regular booking list
            $query->where(function ($q) {
                $q->where('status', '!=', 'lead')
                    ->orWhereNull('status');
            });
            $pastQuery->where(function ($q) {
                $q->where('status', '!=', 'lead')
                    ->orWhereNull('status');
            });
        }

        // Filter upcoming and past bookings
        $query->where('check_out', '>=', $today)->orderBy('check_in', 'asc');
        $pastQuery->where('check_out', '<', $today)->orderBy('check_out', 'desc');

        // Get bookings with pagination
        $upcomingBookings = $query->paginate(10, ['*'], 'upcoming_page');
        $pastBookings = $pastQuery->paginate(5, ['*'], 'past_page');

        return view('bookings.list', compact('upcomingBookings', 'pastBookings'));
    }

    /**
     * Display the public calendar view.
     */
    public function publicCalendar()
    {
        return view('bookings.public-calendar');
    }

    /**
     * Show a separate edit page (for list view editing).
     */
    public function editPage($id)
    {
        $booking = Booking::findOrFail($id);
        return view('bookings.edit', compact('booking'));
    }

    /**
     * Update booking dates via drag and drop.
     */
    public function updateDates(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'check_in'  => 'required|date',
            'check_out' => 'required|date|after_or_equal:check_in',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()]);
        }

        // Check for overlapping bookings
        $existing = Booking::where('homestay', $booking->homestay)
            ->where('id', '!=', $id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('check_in', [$request->check_in, $request->check_out])
                    ->orWhereBetween('check_out', [$request->check_in, $request->check_out])
                    ->orWhere(function ($q) use ($request) {
                        $q->where('check_in', '<=', $request->check_in)
                            ->where('check_out', '>=', $request->check_out);
                    });
            })->first();

        if ($existing) {
            return response()->json([
                'success' => false,
                'message' => 'Homestay telah ditempah pada tarikh tersebut.'
            ]);
        }

        $booking->update($request->only(['check_in', 'check_out']));
        return response()->json(['success' => true]);
    }
}
