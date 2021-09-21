<?php

namespace App\Http\Livewire;

use Http;
use Livewire\Component;

class ShowWorkouts extends Component
{
    public function render()
    {
        $user = session('user');
        $workouts = Http::withHeaders([
            'Authorization' => "Bearer {$user->token}",
        ])->get('https://api.ua.com/v7.1/workout/6104325667', ['user' => $user->id, 'order_by' => '-start_datetime', 'field_set' => 'time_series'])->object();
        $activity = Http::withHeaders([
            'Authorization' => "Bearer {$user->token}",
        ])->get('https://api.ua.com/v7.1/activity_story', ['feed_type' => 'user', 'feed_id' => $user->id])->object();

        return view('livewire.show-workouts', ['workouts' => $workouts]);
    }
}
