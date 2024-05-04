<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\User;


class EventController extends Controller
{
    public  function index()
    {
        $search = request('search');

        if ($search) {

            $events = Event::where([
                ['title', 'like', '%' . $search . "%"]
            ])->get();
        } else {

            $events = Event::all();
        }


        return view('home', ['events' => $events, 'search' => $search]);
    }

    public  function create()
    {
        return view('events.create');
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


        $user = auth()->user();
        $event->user_id = $user->id;
        $event->save();

        return redirect('/')->with('msg', "Evento criado com sucesso!");
    }


    public function show($id)
    {
        $event = Event::findOrFail($id);
        if (auth()->user()) {
            if ($event->user_id === auth()->user()->id) {
                $user = auth()->user();
                $eventOwner = $user;
            }
        } else {
            $eventOwner = User::where('id', $event->user_id)->first()->toArray();
        }


        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]);
    }

    public function dashboard()
    {
        $user = auth()->user();
        $events = $user->events;



        return view('events.dashboard', ['events' => $events]);
    }
}
