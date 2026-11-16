<!DOCTYPE html>
<html>
<head>
    <title>Laptop Inventory</title>
</head>
<body>
    <h1>Laptop Inventory</h1>

    <a href="{{ route('laptops.create') }}">+ Add New Laptop</a>

    <table border="1" cellpadding="8" style="margin-top: 15px;">
        <thead>
            <tr>
                <th>Brand</th>
                <th>Model</th>
                <th>Serial Number</th>
                <th>Daily Rate</th>
                <th>Available</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->brand }}</td>
                    <td>{{ $item->model }}</td>
                    <td>{{ $item->serial_number }}</td>
                    <td>${{ number_format($item->daily_rate, 2) }}</td>
                    <td>{{ $item->is_available ? 'Yes' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>