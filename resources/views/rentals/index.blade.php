<x-layouts::app :title="__('My Rentals')">
    @if (session('success'))
    <div class="rounded-lg bg-green-100 p-4 text-green-800">
        {{ session('success') }}
    </div>
@endif

    <div class="flex flex-col gap-6">

        <div>
            <h1 class="text-2xl font-bold">
                My Laptop Rentals
            </h1>
            <a href="{{ route('rentals.create') }}"
   style="display: inline-block; background-color: #2563eb; color: white; padding: 12px 20px; border-radius: 8px; margin: 12px 0; text-decoration: none;">
    + Create New Rental
</a>

            <p class="text-gray-500">
                View and manage your laptop rental history.
            </p>
        </div>

        <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-neutral-700">

            <table class="w-full text-left">

                <thead class="bg-gray-100 dark:bg-neutral-800">
                    <tr>
                        <th class="p-4">Laptop</th>
                        <th class="p-4">Start Date</th>
                        <th class="p-4">End Date</th>
                        <th class="p-4">Status</th>
                        <th class="p-4">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($rentals as $rental)
                        <tr class="border-t border-gray-200 dark:border-neutral-700">

                            <td class="p-4">
                                {{ $rental->laptop->brand }}
                                {{ $rental->laptop->model }}
                            </td>

                            <td class="p-4">
                                {{ $rental->start_date }}
                            </td>

                            <td class="p-4">
                                {{ $rental->end_date }}
                            </td>

                            <td class="p-4">
                                {{ ucfirst($rental->status) }}
                            </td>

<td class="p-4">

    <div class="flex gap-3">

        <a
            href="{{ route('rentals.edit', $rental) }}"
            style="color: #2563eb;"
        >
            Edit
        </a>

        <form
            method="POST"
            action="{{ route('rentals.destroy', $rental) }}"
            onsubmit="return confirm('Are you sure you want to delete this rental?')"
        >
            @csrf
            @method('DELETE')

            <button type="submit" style="color: #dc2626;">
                Delete
            </button>

        </form>

    </div>

</td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-6 text-center text-gray-500">
                                You don't have any rentals yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>

    </div>

</x-layouts::app>