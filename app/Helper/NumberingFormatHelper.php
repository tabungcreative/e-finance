<?php

namespace App\Helper;

use App\Exceptions\InvariantException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class NumberingFormatHelper {
    public static function pembayaranFormat($lastNumberPayment, $kodePembayaran)
    {
        $year = Carbon::parse(now())->translatedFormat('Y');

        $explode = explode('-', $lastNumberPayment);
        
        $lastYear = $explode[1];
        
        $lastNumber = end($explode);

        $newNumber = 0;
        if ($year == $lastYear) {
            $newNumber = $lastNumber + 1;
        }else {
            $newNumber = 1;
        }
        
        $nomer = str_pad($newNumber, 4, '0', STR_PAD_LEFT);
        
        $no_pembayaran = $kodePembayaran . '-'.$year.'-'. $nomer ;

        return $no_pembayaran;
    }
}
