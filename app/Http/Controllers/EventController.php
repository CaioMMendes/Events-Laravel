<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\File;

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

        $event->title = $request->title ?? 'Evento';
        $event->city = $request->city ?? 'Cidade';
        $event->private = $request->private;
        $event->description = $request->description ?? 'Descrição';
        $event->items = $request->items ?? [];
        $event->date = $request->date ?? now();


        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            echo $requestImage;
            $extension = $requestImage->extension();
            echo $extension;
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;

            $request->image->move(public_path('img/events'), $imageName);

            $event->image = $imageName;
        } else {
            $imageName = 'default.jpg';
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
        $eventsAsParticipant = $user->eventsAsParticipant;


        return view('events.dashboard', ['events' => $events, 'eventsAsParticipant' => $eventsAsParticipant]);
    }


    public function destroy($id)
    {
        $user = auth()->user();
        $event = Event::findOrFail($id);
        if ($user->id === $event->user_id) {

            $imagePath = public_path('img/events/' . $event->image);

            if (File::exists($imagePath) && $event->image !== 'default.jpg') {
                File::delete($imagePath);
            }
            $event->delete();
        } else {
            return redirect('/');
        }
        return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso!');
    }
    public function edit($id)
    {
        $user = auth()->user();
        $event = Event::findOrFail($id);
        if ($user->id !== $event->user_id) {

            return redirect('/');
        }


        return view('events.edit', ['event' => $event]);
    }
    public function update(Request $request)
    {
        $user = auth()->user();
        $event = Event::findOrFail($request->id);
        $data = $request->all();

        if ($user->id !== $event->user_id) {

            return redirect('/');
        }



        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;

            $request->image->move(public_path('img/events'), $imageName);

            $data['image'] = $imageName;


            $imagePath = public_path('img/events/' . $event->image);

            if (File::exists($imagePath) && $event->image !== 'default.jpg') {
                File::delete($imagePath);
            }
        }



        $event->update($data);


        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');
    }

    public function joinEvent($id)
    {
        $user = auth()->user();

        /** @disregard P1013 */
        $user->eventsAsParticipant()->attach($id);

        $event = Event::findOrFail($id);


        return redirect('/dashboard')->with('msg', 'Sua presença está confirmada no evento! ' . $event->title);
    }
}
