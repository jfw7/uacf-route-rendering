<div>
    @dd($workouts->time_series->position)
    @foreach($workouts->_embedded->workouts as $workout)
        @dump($workout)
        <hr>
    @endforeach
</div>
