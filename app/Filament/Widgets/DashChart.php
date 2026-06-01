<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use App\Models\MasterStudio;
use Filament\Widgets\ChartWidget;

class DashChart extends ChartWidget
{
    protected static ?int $sort = 40;

    protected int|string|array $columnSpan = 'full';

    protected ?string $heading = 'Performa Studio';

    protected function getData(): array
    {
        $studios = MasterStudio::all();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Booking',
                    'data' => $studios->map(function ($studio) {
                        return Booking::where(
                            'studio_id',
                            $studio->id
                        )->count();
                    })->toArray(),
                ],
            ],

            'labels' => $studios
                ->map(function ($studio) {
                    return str($studio->nama)
                        ->limit(30, '...');
                })
                ->toArray(),
        ];
    }

    protected function getOptions(): array
    {
        return [
            'indexAxis' => 'y',
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}