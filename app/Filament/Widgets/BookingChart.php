<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class BookingChart extends ChartWidget
{
    protected int|string|array $columnSpan = 1;
    protected static ?int $sort = 2;
    protected ?string $heading = 'Booking Chart';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Booking',
                    'data' => [12, 19, 8, 15, 22, 30],
                ],
            ],
            'labels' => [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'Mei',
                'Jun',
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
