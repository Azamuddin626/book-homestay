<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Booking;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    /**
     * Display a listing of leads.
     */
    public function index(Request $request)
    {
        $query = Lead::query();

        // Apply filters if provided
        if ($request->has('status') && !empty($request->status)) {
            $query->where('status', $request->status);
        }

        if ($request->has('tujuan') && !empty($request->tujuan)) {
            $query->where('tujuan', $request->tujuan);
        }

        if ($request->has('homestay') && !empty($request->homestay)) {
            $query->where('homestay', $request->homestay);
        }

        if ($request->has('from_date') && !empty($request->from_date)) {
            $query->where('check_in', '>=', $request->from_date);
        }

        if ($request->has('to_date') && !empty($request->to_date)) {
            $query->where('check_out', '<=', $request->to_date);
        }

        if ($request->has('nama_penyewa') && !empty($request->nama_penyewa)) {
            $query->where('nama_penyewa', 'like', '%' . $request->nama_penyewa . '%');
        }

        // Get all leads with pagination
        $leads = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('leads.index', compact('leads'));
    }
    /**
     * Update lead status and potentially convert to booking.
     */
    public function updateStatus(Request $request, Lead $lead)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:pending,confirmed,rejected',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $lead->status = $request->status;
        $lead->save();

        // If status is confirmed, create a booking from the lead
        if ($request->status === 'confirmed') {
            if ($lead->homestay === 'Semua Rumah') {
                $homes = ['Rumah Kayu Merbau', 'Rumah Batu Jati', 'Rumah Batu Meranti'];

                foreach ($homes as $home) {
                    // First, check for any booking conflicts
                    $existing = Booking::where('homestay', $home)
                        ->where(function ($query) use ($lead) {
                            $query->whereBetween('check_in', [$lead->check_in, $lead->check_out])
                                ->orWhereBetween('check_out', [$lead->check_in, $lead->check_out])
                                ->orWhere(function ($q) use ($lead) {
                                    $q->where('check_in', '<=', $lead->check_in)
                                        ->where('check_out', '>=', $lead->check_out);
                                });
                        })->first();

                    if ($existing) {
                        return redirect()->back()->with('error', $home . ' sudah ditempah untuk tarikh tersebut.');
                    }
                }

                // If no conflicts, create bookings for all houses
                foreach ($homes as $home) {
                    Booking::create([
                        'tujuan'       => $lead->tujuan,
                        'nama_penyewa' => $lead->nama_penyewa,
                        'alamat'       => $lead->alamat,
                        'check_in'     => $lead->check_in,
                        'check_out'    => $lead->check_out,
                        'dewasa'       => $lead->dewasa,
                        'kanak'        => $lead->kanak,
                        'homestay'     => $home,
                        'status'       => 'confirmed',
                    ]);
                }
            } else {
                // Check for existing booking at the selected house
                $existing = Booking::where('homestay', $lead->homestay)
                    ->where(function ($query) use ($lead) {
                        $query->whereBetween('check_in', [$lead->check_in, $lead->check_out])
                            ->orWhereBetween('check_out', [$lead->check_in, $lead->check_out])
                            ->orWhere(function ($q) use ($lead) {
                                $q->where('check_in', '<=', $lead->check_in)
                                    ->where('check_out', '>=', $lead->check_out);
                            });
                    })->first();

                if ($existing) {
                    return redirect()->back()->with('error', $lead->homestay . ' sudah ditempah untuk tarikh tersebut.');
                }

                // Create a booking
                Booking::create([
                    'tujuan'       => $lead->tujuan,
                    'nama_penyewa' => $lead->nama_penyewa,
                    'alamat'       => $lead->alamat,
                    'check_in'     => $lead->check_in,
                    'check_out'    => $lead->check_out,
                    'dewasa'       => $lead->dewasa,
                    'kanak'        => $lead->kanak,
                    'homestay'     => $lead->homestay,
                    'status'       => 'confirmed',
                ]);
            }

            return redirect()->back()->with('success', 'Tempahan baru telah dibuat daripada pertanyaan ini.');
        }

        return redirect()->back()->with('success', 'Status pertanyaan telah dikemaskini.');
    }
}
