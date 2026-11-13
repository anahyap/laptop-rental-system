<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laptop Inventory</title>
    <script src="https://tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen p-8">
    <div class="max-w-5xl mx-auto bg-white shadow-sm rounded-lg p-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold">Laptop Inventory</h1>
            <a href="{{ route('laptop.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm font-medium">
                Add Laptop
            </a>
        </div>

        @if($items->isEmpty())
            <p class="text-gray-500">No laptops found in the database.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-left text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 font-semibold">Brand</th>
                            <th class="px-4 py-3 font-semibold">Model</th>
                            <th class="px-4 py-3 font-semibold">Serial Number</th>
                            <th class="px-4 py-3 font-semibold">Daily Rate</th>
                            <th class="px-4 py-3 font-semibold">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($items as $item)
                            <tr>
                                <td class="px-4 py-3">{{ $item->brand }}</td>
                                <td class="px-4 py-3">{{ $item->model }}</td>
                                <td class="px-4 py-3">{{ $item->serial_number }}</td>
                                <td class="px-4 py-3">${{ number_format($item->daily_rate, 2) }}</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full {{ $item->is_available ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $item->is_available ? 'Available' : 'Unavailable' }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</body>
</html>
