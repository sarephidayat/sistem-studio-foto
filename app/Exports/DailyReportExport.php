<?php

namespace App\Exports;

use App\Models\Booking;
use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;

class DailyReportExport implements FromCollection
{
    protected $tanggal;

    public function __construct($tanggal)
    {
        $this->tanggal = $tanggal;
    }

    public function collection()
    {
        return Booking::with([
            'user',
            'studio',
            'background',
            'waktu',
        ])
            ->whereDate('tanggal', $this->tanggal)
            ->get()
            ->map(function ($booking) {

                return [

                    'Customer' => $booking->user->name,
                    'Studio' => $booking->studio->nama,
                    'Tanggal' => $booking->tanggal,
                    'Jam' => $booking->waktu->waktu,
                    'Background' => $booking->background->nama,
                    'Jumlah Orang' => $booking->jumlah_orang,

                ];
            });
    }
}