<x-filament-panels::page>

    <style>

        .filter-wrapper {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 25px;
        }

        .filter-card {
            background: white;
            border-radius: 12px;
            padding: 15px 20px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .filter-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #6b7280;
        }

        .filter-input {
            padding: 10px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
        }

        .report-cards {
            display: grid;
            grid-template-columns: repeat(3,1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .report-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            border: 1px solid #eee;
        }

        .report-card-title {
            color: #666;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .report-card-value {
            font-size: 36px;
            font-weight: bold;
        }

        .booking-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        .booking-table th {
            background: #f8fafc;
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        .booking-table td {
            padding: 15px;
            border-bottom: 1px solid #f1f5f9;
        }

        .booking-table tr:hover {
            background: #fafafa;
        }

        .badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-studio {
            background: #ede9fe;
            color: #6d28d9;
        }

        .badge-orang {
            background: #dcfce7;
            color: #16a34a;
        }

    </style>

    {{-- Filter Bulan --}}
    <div class="filter-wrapper">

        <div class="filter-card">

            <label class="filter-label">
                Pilih Bulan
            </label>

            <input
                type="month"
                wire:model.live="bulan"
                class="filter-input"
            >

        </div>

    </div>

    {{-- Summary --}}
    <div class="report-cards">

        <div class="report-card">

            <div class="report-card-title">
                Total Booking
            </div>

            <div class="report-card-value">
                {{ $this->getBookings()->count() }}
            </div>

        </div>

        <div class="report-card">

            <div class="report-card-title">
                Total Customer
            </div>

            <div class="report-card-value">
                {{ $this->getBookings()->sum('jumlah_orang') }}
            </div>

        </div>

        <div class="report-card">

            <div class="report-card-title">
                Studio Digunakan
            </div>

            <div class="report-card-value">
                {{ $this->getBookings()->pluck('studio_id')->unique()->count() }}
            </div>

        </div>

    </div>

    {{-- Detail --}}
    <table class="booking-table">

        <thead>

            <tr>
                <th>Customer</th>
                <th>Studio</th>
                <th>Tanggal</th>
                <th>Background</th>
                <th>Orang</th>
            </tr>

        </thead>

        <tbody>

            @forelse($this->getBookings() as $booking)

                <tr>

                    <td>
                        {{ $booking->user->name }}
                    </td>

                    <td>

                        <span class="badge badge-studio">
                            {{ $booking->studio->nama }}
                        </span>

                    </td>

                    <td>
                        {{ \Carbon\Carbon::parse($booking->tanggal)->format('d M Y') }}
                    </td>

                    <td>
                        {{ $booking->background->nama }}
                    </td>

                    <td>

                        <span class="badge badge-orang">
                            {{ $booking->jumlah_orang }} Orang
                        </span>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" style="text-align:center;padding:40px;">
                        Tidak ada data bulan ini
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</x-filament-panels::page>