<div class="card">
    <img src="{{ $trip['image'] }}" alt="hotel" class="card-img">
    <a href="/trips/{{ $trip['slug'] }}" class="card-title">{{ $trip['name'] }}</a>
    <div class="card-footer">
        <p class="card-footer_price">{{ $trip['price'] }}$</p>
        <p class="card-footer_date">{{ $trip['dates'] }}</p>
        <a class="header-sign" href="/trips/{{ $trip['slug'] }}">Details</a>
    </div>
</div>
