<div class="container trip-order-page">
    <img src="/storage/{{ $order['image'] }}" alt="hotel">
    <h2>Order #{{ $order['id'] }}</h2>
    <p>Price: {{ $order['price'] }}$</p>
    @if ($order['paid'])
        <p>You have paid this order</p>
    @else
        <p>You have not paid this trip and reservetion expires {{ $order['reservation_expires'] }}</p>
    @endif
    <p>Download details:</p>
    <a href="/orders/{{ $order['id'] }}/report?extension=pdf" class="header-sign buy-btn" target="_blank">PDF</a>
    <a href="/orders/{{ $order['id'] }}/report?extension=docx" class="header-sign buy-btn" target="_blank">DOC</a>
</div>
