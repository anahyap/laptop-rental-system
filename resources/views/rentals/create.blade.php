<x-layouts::app :title="__('Create Rental')">

    <div class="mx-auto w-full max-w-2xl">

        <h1 class="mb-2 text-2xl font-bold">
            Rent a Laptop
        </h1>

        <p class="mb-6 text-gray-500">
            Select a laptop and choose your rental dates.
        </p>

        <form method="POST" action="{{ route('rentals.store') }}"
              class="space-y-5">

            @csrf

            <div>
                <label for="laptop_id" class="mb-2 block font-medium">
                    Select Laptop
                </label>

                <select
                    name="laptop_id"
                    id="laptop_id"
                    required
                    class="w-full rounded-lg border border-gray-300 p-3
                           bg-white text-gray-900"
                >
                    <option value="">Choose a laptop</option>

                    @foreach ($laptops as $laptop)
                        <option
                            value="{{ $laptop->id }}"
                            @selected(old('laptop_id') == $laptop->id)
                        >
                            {{ $laptop->brand }}
                            {{ $laptop->model }}
                            - ${{ $laptop->daily_rate }}/day
                        </option>
                    @endforeach

                </select>

                @error('laptop_id')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label for="start_date" class="mb-2 block font-medium">
                    Start Date
                </label>

                <input
                    type="date"
                    name="start_date"
                    id="start_date"
                    value="{{ old('start_date') }}"
                    min="{{ now()->toDateString() }}"
                    required
                    class="w-full rounded-lg border border-gray-300 p-3
                           bg-white text-gray-900"
                >

                @error('start_date')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label for="end_date" class="mb-2 block font-medium">
                    End Date
                </label>

                <input
                    type="date"
                    name="end_date"
                    id="end_date"
                    value="{{ old('end_date') }}"
                    required
                    class="w-full rounded-lg border border-gray-300 p-3
                           bg-white text-gray-900"
                >

                @error('end_date')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex gap-3">

                <button
                    type="submit"
                    class="rounded-lg bg-blue-600 px-5 py-3
                           font-semibold text-white hover:bg-blue-700"
                >
                    Submit Rental
                </button>

                <a
                    href="{{ route('rentals.index') }}"
                    class="rounded-lg border border-gray-300 px-5 py-3"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</x-layouts::app>