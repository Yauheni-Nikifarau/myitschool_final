<section class="promo">
    <div class="container">
        <div>
            <img src="/img/secondslide.jpg" class="promo_bg" alt="slide">
            <div class="promo_text">
                <p>Buy our trips</p>
                <a class="header-sign" href="/trips">Explore trips</a>
            </div>
        </div>
    </div>
</section>

<div class="album py-5 bg-light">
    <div class="container">

        <h1 class="group-title">The latest offers</h1>
        <div class="album">
            @foreach($latestList as $trip)
            <div class="card">
                <img src="{{ $trip['image'] }}" alt="hotel" class="card-img">
                <a href="/trips/{{ $trip['slug'] }}" class="card-title">{{ $trip['name'] }}</a>
                <div class="card-footer">
                    <p class="card-footer_price">{{ $trip['price'] }}$</p>
                    <p class="card-footer_date">{{ $trip['dates'] }}</p>
                    <a class="header-sign" href="#">Buy it</a>
                </div>
            </div>
            @endforeach
        </div>

        <h1 class="group-title">Hot tours</h1>
        <div class="album">
            @foreach($hotList as $trip)
                <div class="card">
                    <img src="{{ $trip['image'] }}" alt="hotel" class="card-img">
                    <a href="/trips/{{ $trip['slug'] }}" class="card-title">{{ $trip['name'] }}</a>
                    <div class="card-footer">
                        <p class="card-footer_price">{{ $trip['price'] }}$</p>
                        <p class="card-footer_date">{{ $trip['dates'] }}</p>
                        <a class="header-sign" href="#">Buy it</a>
                    </div>
                </div>
            @endforeach
        </div>

        <h1 class="group-title">35% off</h1>
        <div class="album">
            @foreach($offList as $trip)
                <div class="card">
                    <img src="{{ $trip['image'] }}" alt="hotel" class="card-img">
                    <a href="/trips/{{ $trip['slug'] }}" class="card-title">{{ $trip['name'] }}</a>
                    <div class="card-footer">
                        <p class="card-footer_price">{{ $trip['price'] }}$</p>
                        <p class="card-footer_date">{{ $trip['dates'] }}</p>
                        <a class="header-sign" href="#">Buy it</a>
                    </div>
                </div>
            @endforeach
        </div>

        </div>
    </div>
</div>
