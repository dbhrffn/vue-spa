<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Event::all()->jsonSerialize(), Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $event = new Event([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'created_by' => 1,
            'updated_by' => 1
        ]);
        $event->save();
    }

    public function update(Request $request, $id)
    {
        if($request->id != NULL){
            $event = Event::find($id);
            $event->update($request->all());
            $event->save();
        }
        return response(null, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        //
        $event = Event::find($id);
        $event->delete();

        return response(null, Response::HTTP_OK);
    }
}
