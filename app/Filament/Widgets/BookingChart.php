<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\ChartWidget;

class BookingChart extends ChartWidget
{
    protected static ?int $sort = 30;

    protected int|string|array $columnSpan = 'full';

    protected ?string $heading = 'Trend Booking';

    public ?string $filter = 'week';

    protected function getFilters(): ?array
    {
        return [
            'week' => '7 Hari',
            'month' => '30 Hari',
            'year' => '1 Tahun',
        ];
    }

    protected function getData(): array
    {
        $labels = [];
        $data = [];

        switch ($this->filter) {

            case 'month':

                for ($i = 29; $i >= 0; $i--) {

                    $date = now()->subDays($i);

                    $labels[] = $date->format('d M');

                    $data[] = Booking::whereDate(
                        'tanggal',
                        $date->toDateString()
                    )->count();
                }

                break;

            case 'year':

                for ($i = 11; $i >= 0; $i--) {

                    $date = now()->subMonths($i);

                    $labels[] = $date->format('M Y');

                    $data[] = Booking::whereYear(
                        'tanggal',
                        $date->year
                    )
                    ->whereMonth(
                        'tanggal',
                        $date->month
                    )
                    ->count();
                }

                break;

            default:

                for ($i = 6; $i >= 0; $i--) {

                    $date = now()->subDays($i);

                    $labels[] = $date->format('d M');

                    $data[] = Booking::whereDate(
                        'tanggal',
                        $date->toDateString()
                    )->count();
                }

                break;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Booking',

                    'data' => $data,

                    'fill' => true,

                    'tension' => 0.4,
                ],
            ],

            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}