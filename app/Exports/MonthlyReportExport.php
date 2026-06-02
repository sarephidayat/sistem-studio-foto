<?php

namespace App\Exports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;

class MonthlyReportExport implements FromCollection
{
    protected $month;
    protected $year;

    public function __construct($month, $year)
    {
        $this->month = $month;
        $this->year = $year;
    }

    public function collection()
    {
        return Booking::with([
            'user',
            'studio',
            'background',
            'waktu',
        ])
            ->whereYear('tanggal', $this->year)
            ->whereMonth('tanggal', $this->month)
            ->get()
            ->map(function ($booking) {

                return [

                    'Customer' =>
                        $booking->user->name,

                    'Studio' =>
                        $booking->studio->nama,

                    'Tanggal' =>
                        $booking->tanggal,

                    'Jam' =>
                        $booking->waktu->waktu,

                    'Background' =>
                        $booking->background->nama,

                    'Jumlah Orang' =>
                        $booking->jumlah_orang,

                ];
            });
    }
}