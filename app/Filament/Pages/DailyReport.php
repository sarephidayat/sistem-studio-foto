<?php

namespace App\Filament\Pages;

use App\Models\Booking;
use App\Models\Order;
use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;

class DailyReport extends Page
{
    protected static string|\UnitEnum|null $navigationGroup = 'Transaction';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCalendarDays;

    protected static ?string $navigationLabel = 'Daily Report';

    protected string $view = 'filament.pages.daily-report';

    public $tanggal;

    public function mount()
    {
        $this->tanggal = now()->format('Y-m-d');
    }

    public function getBookings()
    {
        return Booking::with([
            'user',
            'studio',
            'background',
            'waktu',
            'pembayaran',
        ])
            ->whereDate('tanggal', $this->tanggal)
            ->get();
    }
}