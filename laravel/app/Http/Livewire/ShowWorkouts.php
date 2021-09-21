<?php

namespace App\Http\Livewire;

use Http;

use Livewire\Component;
use phpGPX\phpGPX;

class ShowWorkouts extends Component
{
    protected $gpx;
    protected $user;

    public function mount()
    {
        $this->gpx = new phpGpx;
        $this->user = session('user');
    }

    public function render()
    {
        return view('livewire.show-workouts');
    }

    public function getRoutesProperty()
    {
        $stories = collect(Http::withHeaders([
            'Authorization' => "Bearer {$this->user->token}",
        ])->get('https://api.ua.com/v7.1/activity_story', ['token' => '3d5dde80-0f13-11ec-8080-8001177b026b', 'feed_type' => 'user', 'feed_id' => $this->user->id, 'feed_view' => 'me'])->object()); //->_embedded->activity_stories);
        return $stories;
    }
}
