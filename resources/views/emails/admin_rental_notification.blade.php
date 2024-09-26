<h1>New Car Rental</h1>
<p>A car has been rented by {{ $rental->user->name }}.</p>

<p>Rental Details:</p>

<ul>
    <li>Car: {{ $rental->car->name }}</li>
    <li>Customer Email: {{ $rental->user->email }}</li>
    <li>Rental Start Date: {{ $rental->start_date }}</li>
    <li>Rental End Date: {{ $rental->end_date }}</li>
    <li>Total Price: ${{ $rental->total_price }}</li>
</ul>
