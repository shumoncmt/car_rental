<!DOCTYPE html>
<html>
<head>
    <title>Rental Confirmation</title>
</head>
<body>
    <h1>Rental Confirmation</h1>
    <p>Dear {{ $rental->user->name }},</p>
    <p>Your booking has been confirmed:</p>
    <ul>
        <li>Car: {{ $rental->car->name }} ({{ $rental->car->brand }} {{ $rental->car->model }})</li>
        <li>Start Date: {{ $rental->start_date }}</li>
        <li>End Date: {{ $rental->end_date }}</li>
        <li>Total Cost: ${{ $rental->total_cost }}</li>
    </ul>
    <p>Thank you for choosing us!</p>
</body>
</html>