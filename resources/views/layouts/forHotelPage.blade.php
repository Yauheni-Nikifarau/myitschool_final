<div class="container">
    <div class="hotel-page">
        <h1>{{ $hotel['name'] }} hotel</h1>

        <div>
            <img src="{{ $hotel['image'] }}" alt="hotel">
        </div>

        <p>Description: {{ $hotel['description'] }}</p>

        <h3>Weather Forecast on the nearest 7 days at this hotel's area</h3>

        <table class="weather-table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Weather</th>
                <th scope="col">Morning</th>
                <th scope="col">Day</th>
                <th scope="col">Evening</th>
                <th scope="col">Night</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hotel['weather'] as $day)
                    <tr>
                        <th scope="row">{{ $day['date'] }}</th>
                        <td>{{ $day['weather'] }}</td>
                        <td>{{ $day['morning'] }}</td>
                        <td>{{ $day['day'] }}</td>
                        <td>{{ $day['evening'] }}</td>
                        <td>{{ $day['night'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="/trips?hotel={{ $hotel['slug'] }}" class="header-sign">Hotel's trips</a>

    </div>
</div>
