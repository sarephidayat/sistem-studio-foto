<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Booking;
use App\Models\MasterBackground;
use App\Models\MasterStudio;
use App\Models\User;

class StatsDashboard extends StatsOverviewWidget
{
    protected int|string|array $columnSpan = 'full';
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        return [
            Stat::make(
                'Total Booking',
                Booking::count()
            )
                ->description('Seluruh booking yang masuk'),

            Stat::make(
                'Booking Hari Ini',
                Booking::whereDate('created_at', today())->count()
            )
                ->description('Booking yang dibuat hari ini'),

            Stat::make(
                'Total Studio',
                MasterStudio::count()
            )
                ->description('Studio aktif'),

            Stat::make(
                'Total Background',
                MasterBackground::count()
            )
                ->description('Background tersedia'),
        ];
    }
}
