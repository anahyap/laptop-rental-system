<x-layouts::app :title="__('Edit Rental')">

    <div class="mx-auto w-full max-w-2xl">

        <h1 class="mb-6 text-2xl font-bold">
            Edit Rental
        </h1>

        <form
            method="POST"
            action="{{ route('rentals.update', $rental) }}"
            class="space-y-5"
        >
            @csrf
            @method('PUT')

            <div>
                <label for="start_date" class="mb-2 block font-medium">
                    Start Date
                </label>

                <input
                    type="date"
                    id="start_date"
                    name="start_date"
                    value="{{ old('start_date', $rental->start_date) }}"
                    required
                    class="w-full rounded-lg border border-gray-300 p-3"
                >

                @error('start_date')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="end_date" class="mb-2 block font-medium">
                    End Date
                </label>

                <input
                    type="date"
                    id="end_date"
                    name="end_date"
                    value="{{ old('end_date', $rental->end_date) }}"
                    required
                    class="w-full rounded-lg border border-gray-300 p-3"
                >

                @error('end_date')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button
                type="submit"
                style="background-color: #2563eb; color: white; padding: 12px 20px; border-radius: 8px;"
            >
                Update Rental
            </button>

            <a href="{{ route('rentals.index') }}"
               class="ml-3">
                Cancel
            </a>

        </form>

    </div>

</x-layouts::app>