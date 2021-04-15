<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Auth;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::all();
        return view('booking.index')->with('bookings', $bookings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('booking.create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'booking_date'=>'required',
            'flexibility'=>'required',
            'vehicle_size'=>'required',
            'contact_number'=>'required',
            'email_address'=>'required',
        ]);

        Booking::create($request->all());

        if (!Auth::guest()) {
            return redirect()->route('booking.index');
        }else{
            return redirect()->route('booking.create');
        }    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        return view('booking.edit')->with('booking', $booking);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        $validatedBooking = $this->validate($request, [
            'name'=>'required',
            'booking_date'=>'required',
            'flexibility'=>'required',
            'vehicle_size'=>'required',
            'contact_number'=>'required',
            'email_address'=>'required',
        ]);

        Booking::updateOrCreate(['id' => $booking->id],$validatedBooking);

        if (!Auth::guest()) {
            return redirect()->route('booking.index');
        }else{
            return redirect()->route('booking.create');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        Booking::findOrFail($booking->id)->delete();
        return redirect()->route('booking.index');
    }

    #   Confirm booking
    public function confirm(Request $request, Booking $booking)
    {
        $data = $request->all();

        if (
            Booking::where('id', $data["booking"])->update(['booking_confirmed' => true])
        ) {
            return response()->json(['status' => 1, 'message' => 'Booking approved', 'data_id' => $booking->id]);
        }
        return response()->json(['status' => 0, 'message' => 'Something went wrong', 'data_id' => $booking->id]);

    }

    
}
