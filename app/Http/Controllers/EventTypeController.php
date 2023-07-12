<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventType;

class EventTypeController extends Controller
{
    public function allEventTypes()
    {
        $EventTypes = EventType::all();
        return request()->json(200, $EventTypes);
    }

    public function getEventType($id)
    {
        $EventTypes = EventType::find($id);
        return request()->json(200, $EventTypes);
    }

    public function createEventType(Request $request)
    {

        $request->validate([
            'eventName' => 'required',
            'eventDescription' => 'required',
        ]);

        $EventTypes = new EventType();
        $EventTypes->eventName = $request->eventName;
        $EventTypes->eventDescription = $request->eventDescription;
        $EventTypes->save();
        return request()->json(200, $EventTypes);
    }

    public function updateEventType(Request $request, $id)
    {
        $EventTypes = EventType::find($id);

        if($request->eventName != null)
            $EventTypes->eventName = $request->eventName;

        if($request->eventDescription != null)
            $EventTypes->eventDescription = $request->eventDescription;

        $EventTypes->save();
        return request()->json(200, $EventTypes);
    }

    public function deleteEventType($id)
    {
        $EventTypes = EventType::find($id);
        $EventTypes->delete();
        return request()->json(200, $EventTypes);
    }
}
