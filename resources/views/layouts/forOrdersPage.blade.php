<div class="container">

    <h1 class="page-title">My orders</h1>

    <table class="weather-table orders-table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Created</th>
            <th scope="col">Price</th>
            <th scope="col">Paid</th>
            <th scope="col">Country</th>
            <th scope="col">Hotel</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ordersList as $order)
                <tr>
                    <th scope="row">
                        <a href="/orders/{{ $order['id'] }}" class="list-group-item list-group-item-action">{{ $order['id'] }}</a>
                    </th>
                    <td>{{ $order['created_at'] }}</td>
                    <td>{{ $order['price'] }}$</td>
                    <td>{{ $order['paid'] }}</td>
                    <td>{{ $order['country'] }}</td>
                    <td>{{ $order['hotel'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if (count($ordersList) == 0)
        <div class="info warning">
            Empty result
        </div>
    @endif

</div>
