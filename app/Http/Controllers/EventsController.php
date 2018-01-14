<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\vehicle;
use App\booking_history;
use App\Event;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
         //Query to select booking history based on current logged on user id
        $data = vehicle::select('booking_histories.destination', 'vehicles.title', 'vehicles.start', 'vehicles.end', 'vehicles.color')
        ->leftJoin('booking_histories', 'booking_histories.car_id', '=', 'vehicles.id')->get();

        foreach ($data as $all) {
            if($all['destination'] == null ){
                $all['color'] = '#000000';
            }
        }

        return Response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Vehicle();
        $event->title = $request->title;
        $event->start = $request->date_start . ' ' . $request->time_start;
        $event->end = $request->date_end;
        $event->color = $request->color;
        $event->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Vehicle::find($id);

        if($event == null)
            return Response()->json([
                'message'   =>  'error delete.'
            ]);

        $event->delete();

        return Response()->json([
            'message'   =>  'success delete.'
        ]);

    }
}
