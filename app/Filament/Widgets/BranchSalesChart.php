<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class BranchSalesChart extends ChartWidget
{
    protected int|string|array $columnSpan = 1;
    protected static ?int $sort = 3;
    protected ?string $heading = 'Branch Sales Chart';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Booking',
                    'data' => [25, 18, 15, 10, 8],
                ],
            ],
            'labels' => [
                'Semarang',
                'Surabaya',
                'Malang',
                'Jakarta Selatan',
                'Jember',
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
