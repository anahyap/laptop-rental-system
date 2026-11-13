<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Laptop</title>
    <script src="https://tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen p-8">
    <div class="max-w-xl mx-auto bg-white shadow-sm rounded-lg p-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold">Add a New Laptop</h1>
            <a href="{{ route('laptop.index') }}" class="text-sm text-gray-600 hover:underline">
                &larr; Back to Inventory
            </a>
        </div>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('laptop.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>
                <input type="text" name="brand" id="brand" value="{{ old('brand') }}" placeholder="e.g., Dell" required
                    class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none">
            </div>

            <div>
                <label for="model" class="block text-sm font-medium text-gray-700">Model</label>
                <input type="text" name="model" id="model" value="{{ old('model') }}" placeholder="e.g., XPS 15" required
                    class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none">
            </div>

            <div>
                <label for="serial_number" class="block text-sm font-medium text-gray-700">Serial Number</label>
                <input type="text" name="serial_number" id="serial_number" value="{{ old('serial_number') }}" placeholder="e.g., SN-987654" required
                    class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none">
            </div>

            <div>
                <label for="daily_rate" class="block text-sm font-medium text-gray-700">Daily Rate ($)</label>
                <input type="number" step="0.01" name="daily_rate" id="daily_rate" value="{{ old('daily_rate') }}" placeholder="25.00" required
                    class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none">
            </div>

            <div>
                <label for="is_available" class="block text-sm font-medium text-gray-700">Availability</label>
                <select name="is_available" id="is_available"
                    class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none">
                    <option value="1" {{ old('is_available', '1') == '1' ? 'selected' : '' }}>Available</option>
                    <option value="0" {{ old('is_available') == '0' ? 'selected' : '' }}>Unavailable</option>
                </select>
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm font-medium">
                    Save Laptop
                </button>
                <a href="{{ route('laptop.index') }}" class="text-sm text-gray-600 hover:underline">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</body>
</html>
