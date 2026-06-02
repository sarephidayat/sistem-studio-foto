<?php

namespace App\Filament\Pages;

use App\Models\Booking;
use App\Models\Order;
use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Filament\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Exports\DailyReportExport;

class DailyReport extends Page
{
    protected static string|\UnitEnum|null $navigationGroup = 'Report';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCalendarDays;

    protected static ?string $navigationLabel = 'Daily Report';
    protected function getHeaderActions(): array
    {
        return [

            Action::make('exportExcel')
                ->label('Export Excel')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('success')
                ->action(function () {

                    $fileName =
                        'daily-report-' .
                        $this->tanggal .
                        '.xlsx';

                    return Excel::download(
                        new DailyReportExport(
                            $this->tanggal
                        ),
                        $fileName
                    );

                }),

            Action::make('exportPdf')
                ->label('Export PDF')
                ->icon('heroicon-o-document')
                ->color('danger')
                ->action(function () {

                    $bookings = $this->getBookings();

                    $pdf = Pdf::loadView(
                        'pdf.daily-report',
                        [
                            'bookings' => $bookings,
                            'tanggal' => $this->tanggal,
                        ]
                    );

                    return response()->streamDownload(
                        fn() => print ($pdf->output()),
                        'daily-report-' .
                        $this->tanggal .
                        '.pdf'
                    );

                }),

        ];
    }

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