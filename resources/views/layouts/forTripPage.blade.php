<div class="container trip-order-page">
    <div class="trip-page">
        <h1>{{ $trip['name'] }}</h1>

        <p>Hotel: <a href="{{ $trip['hotelSlug'] }}">hotel name link</a></p>

        <p>Price: {{ $trip['price'] }}$</p>

        @if ($trip['discount'])
            <p>Discount: {{ $trip['discount'] }}%</p>

            <p>End Price: {{ $trip['endPrice'] }}$</p>
        @endif

        <p>Dates: {{ $trip['dates'] }}</p>

        <div>
            <img src="{{ $trip['image'] }}" alt="hotel">
        </div>

        <a href="/trips/{{ $trip['tripSlug'] }}/buy" class="header-sign buy-btn">BUY</a>
    </div>
</div>
