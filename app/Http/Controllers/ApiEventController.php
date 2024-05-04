<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;


class ApiEventController extends Controller
{

    public function index()
    {
        $search = request('search');

        if ($search) {

            $events = Event::where([
                ['title', 'like', '%' . $search . "%"]
            ])->get();
        } else {

            $events = Event::all();
        }

        return response()->json($events);
    }






    public  function store(Request $request)
    {
        $event = new Event;

        $event->title = $request->title;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;
        $event->date = $request->date;


        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            echo $requestImage;
            $extension = $requestImage->extension();
            echo $extension;
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;

            $request->image->move(public_path('img/events'), $imageName);

            $event->image = $imageName;
        }


        $event->save();

        return response()->json([
            "message" => "Evento criado com sucesso!",
            "event" => $event
        ]);
    }


    public function show($id)
    {
        $event = Event::findOrFail($id);
        return response()->json($event);
    }
}
