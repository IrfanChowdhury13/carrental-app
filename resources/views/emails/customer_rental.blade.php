<h1>Rental Confirmation</h1>
<p>Dear {{ $rental->user->name }},</p>

<p>Thank you for renting a car from us. Here are your rental details:</p>

<ul>
    <li>Car: {{ $rental->car->name }}</li>
    <li>Rental Start Date: {{ $rental->start_date }}</li>
    <li>Rental End Date: {{ $rental->end_date }}</li>
    <li>Total Price: ${{ $rental->total_price }}</li>
</ul>

<p>We hope you have a great experience!</p>
