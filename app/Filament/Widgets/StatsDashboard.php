<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use App\Models\MasterBackground;
use App\Models\MasterStudio;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsDashboard extends StatsOverviewWidget
{
    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $topStudio = Booking::selectRaw('studio_id, COUNT(*) as total')
            ->groupBy('studio_id')
            ->orderByDesc('total')
            ->first();

        $studioName = '-';
        $studioTotal = 0;

        if ($topStudio) {
            $studio = MasterStudio::find($topStudio->studio_id);

            $studioName = $studio?->nama ?? '-';
            $studioTotal = $topStudio->total;
        }

        $topBackground = Booking::selectRaw('background_id, COUNT(*) as total')
            ->groupBy('background_id')
            ->orderByDesc('total')
            ->first();

        $backgroundName = '-';
        $backgroundTotal = 0;

        if ($topBackground) {
            $background = MasterBackground::find($topBackground->background_id);

            $backgroundName = $background?->nama ?? '-';
            $backgroundTotal = $topBackground->total;
        }

        return [

            Stat::make(
                'Total Booking',
                Booking::count()
            )
                ->description('Seluruh booking yang masuk')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('success'),

            Stat::make(
                'Booking Hari Ini',
                Booking::whereDate('created_at', today())->count()
            )
                ->description('Booking yang dibuat hari ini')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),

            Stat::make(
                'Total Studio',
                MasterStudio::count()
            )
                ->description('Studio aktif')
                ->descriptionIcon('heroicon-m-building-office')
                ->color('info'),

            Stat::make(
                'Total Background',
                MasterBackground::count()
            )
                ->description('Background tersedia')
                ->descriptionIcon('heroicon-m-photo')
                ->color('gray'),

            Stat::make(
                '🏆 Studio Terlaris',
                $studioName
            )
                ->description($studioTotal . ' Booking')
                ->color('success'),

            Stat::make(
                '🎨 Background Favorit',
                $backgroundName
            )
                ->description($backgroundTotal . ' Kali Dipilih')
                ->color('warning'),
        ];
    }
}