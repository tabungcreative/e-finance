<?php

namespace App\Helper;

use App\Exceptions\InvariantException;
use Illuminate\Support\Facades\Http;

class MahasiswaHelper {
    public static function cekNim($nim) {
        $url = 'https://feb-unsiq.ac.id/api';
        $response = Http::get($url .'/mahasiswa/' . $nim);
        
        if ($response->status() == 200) {
            return true;
        }

        return false;
    }

    public static function getMahasiswa($nim)
    {
        $url = 'https://feb-unsiq.ac.id/api';
        $response = Http::get($url .'/mahasiswa/' . $nim);
        
        if ($response->status() == 200) {
            $mahasiswa = json_decode($response->body(), $depth=512, JSON_THROW_ON_ERROR)['data'];
            return $mahasiswa;
        }
        
        return null;
    }
} 