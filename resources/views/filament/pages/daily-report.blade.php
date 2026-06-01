<x-filament-panels::page>

    {{-- Filter Tanggal --}}
    <div class="mb-6">
        <label class="block font-semibold mb-2">
            Pilih Tanggal
        </label>

        <input
            type="date"
            wire:model.live="tanggal"
            class="border rounded-lg p-2"
        >
    </div>

    {{-- Summary --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">

        <div class="bg-white rounded-xl shadow p-4">
            <div class="text-sm text-gray-500">
                Total Booking
            </div>

            <div class="text-3xl font-bold">
                {{ $this->getBookings()->count() }}
            </div>
        </div>

        <div class="bg-white rounded-xl shadow p-4">
            <div class="text-sm text-gray-500">
                Total Customer
            </div>

            <div class="text-3xl font-bold">
                {{ $this->getBookings()->sum('jumlah_orang') }}
            </div>
        </div>

        <div class="bg-white rounded-xl shadow p-4">
            <div class="text-sm text-gray-500">
                Studio Digunakan
            </div>

            <div class="text-3xl font-bold">
                {{ $this->getBookings()->pluck('studio_id')->unique()->count() }}
            </div>
        </div>

    </div>

    {{-- Detail Booking --}}
    <div class="bg-white rounded-xl shadow overflow-hidden">

        <div class="px-4 py-3 border-b font-semibold">
            Detail Booking
        </div>

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>
                    <th class="p-3 text-left">Customer</th>
                    <th class="p-3 text-left">Studio</th>
                    <th class="p-3 text-left">Tanggal</th>
                    <th class="p-3 text-left">Jam</th>
                    <th class="p-3 text-left">Background</th>
                    <th class="p-3 text-left">Orang</th>
                </tr>

            </thead>

            <tbody>

                @forelse($this->getBookings() as $booking)

                    <tr class="border-b">

                        <td class="p-3">
                            {{ $booking->user->name ?? '-' }}
                        </td>

                        <td class="p-3">
                            {{ $booking->studio->nama ?? '-' }}
                        </td>

                        <td class="p-3">
                            {{ \Carbon\Carbon::parse($booking->tanggal)->format('d M Y') }}
                        </td>

                        <td class="p-3">
                            {{ $booking->waktu ? date('H:i', strtotime($booking->waktu->waktu)) : '-' }}
                        </td>

                        <td class="p-3">
                            {{ $booking->background->nama ?? '-' }}
                        </td>

                        <td class="p-3">
                            {{ $booking->jumlah_orang }}
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="p-6 text-center text-gray-500">
                            Tidak ada data booking pada tanggal ini.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</x-filament-panels::page>