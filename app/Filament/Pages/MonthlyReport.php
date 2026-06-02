<?php

namespace App\Filament\Pages;

use App\Models\Booking;
use App\Models\Order;
use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Filament\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MonthlyReportExport;
use Barryvdh\DomPDF\Facade\Pdf;

class MonthlyReport extends Page
{
    protected static string|\UnitEnum|null $navigationGroup = 'Report';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCalendarDays;

    protected static ?string $navigationLabel = 'Monthly Report';

    protected string $view = 'filament.pages.monthly-report';

    protected function getHeaderActions(): array
    {
        return [

            Action::make('exportExcel')
                ->label('Export Excel')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('success')
                ->action(function () {

                    [$year, $month] = explode('-', $this->bulan);

                    $bulan = [
                        1 => 'januari',
                        2 => 'februari',
                        3 => 'maret',
                        4 => 'april',
                        5 => 'mei',
                        6 => 'juni',
                        7 => 'juli',
                        8 => 'agustus',
                        9 => 'september',
                        10 => 'oktober',
                        11 => 'november',
                        12 => 'desember',
                    ];

                    $fileName = 'monthly-report-' .
                        $bulan[(int) $month] .
                        '-' .
                        $year .
                        '.xlsx';

                    return Excel::download(
                        new MonthlyReportExport(
                            $month,
                            $year
                        ),
                        $fileName
                    );

                }),

            Action::make('exportPdf')
                ->label('Export PDF')
                ->icon('heroicon-o-document')
                ->color('danger')
                ->action(function () {

                    [$year, $month] = explode('-', $this->bulan);

                    $bulan = [
                        1 => 'januari',
                        2 => 'februari',
                        3 => 'maret',
                        4 => 'april',
                        5 => 'mei',
                        6 => 'juni',
                        7 => 'juli',
                        8 => 'agustus',
                        9 => 'september',
                        10 => 'oktober',
                        11 => 'november',
                        12 => 'desember',
                    ];

                    $bookings = $this->getBookings();

                    $periode =
                        ucfirst($bulan[(int) $month]) .
                        ' ' .
                        $year;

                    $fileName =
                        'monthly-report-' .
                        $bulan[(int) $month] .
                        '-' .
                        $year .
                        '.pdf';

                    $pdf = Pdf::loadView(
                        'pdf.monthly-report',
                        [
                            'bookings' => $bookings,
                            'periode' => $periode,
                        ]
                    );

                    return response()->streamDownload(
                        fn() => print ($pdf->output()),
                        $fileName
                    );

                }),

        ];
    }

    public $bulan;

    public function mount(): void
    {
        $this->bulan = now()->format('Y-m');
    }

    public function getBookings()
    {
        [$year, $month] = explode('-', $this->bulan);

        return Booking::with([
            'user',
            'studio',
            'background',
            'waktu',
        ])
            ->whereYear('tanggal', $year)
            ->whereMonth('tanggal', $month)
            ->get();
    }

}