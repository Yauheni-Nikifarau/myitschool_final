<div class="container">
    <div class="album">
        @foreach($hotelsList as $hotel)
            <div class="card">
                <img src="{{ $hotel['image'] }}" alt="hotel" class="card-img">
                <a href="{{ $hotel['slugDetails'] }}" class="card-title">{{ $hotel['name'] }}</a>
                <div class="card-footer">
                    <a class="header-sign" href="{{ $hotel['slugDetails'] }}">Details</a>
                    <a class="header-sign" href="{{ $hotel['slugTrips'] }}">Trips</a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="pagination">
        @for ($i = 1; $i <= $pages; $i++)
            <a href="/hotels?page={{ $i }}" class="paginate-btn">{{ $i }}</a>
        @endfor
    </div>
</div>
