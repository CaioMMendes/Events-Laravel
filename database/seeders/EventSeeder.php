<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                'title' => 'Evento 1',
                'city' => 'Cidade A',
                'private' => 0,
                'description' => 'Descrição do evento 1',
                'items' => ['Cadeira', 'Palco'],
                'date' => now(),
                'image' => 'default.jpg',
                'user_id' => 1
            ],
            [
                'title' => 'Evento 2',
                'city' => 'Cidade B',
                'private' => 1,
                'description' => 'Descrição do evento 2',
                'items' => ['Bebida', 'Comida'],
                'date' => now(),
                'image' => 'default.jpg',
                'user_id' => 1
            ],
        ];

        foreach ($events as $eventData) {
            $event = new Event();
            $event->title = $eventData['title'];
            $event->city = $eventData['city'];
            $event->private = $eventData['private'];
            $event->description = $eventData['description'];
            $event->items = $eventData['items'];
            $event->date = $eventData['date'];
            $event->image = $eventData['image'];
            $event->user_id = $eventData['user_id'];
            $event->save();
        }
    }
}
