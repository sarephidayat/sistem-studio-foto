<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class DashChart extends ChartWidget
{
    protected ?string $heading = 'Dash Chart';

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
