<?php

namespace App\Services;

use App\Http\Requests\PembayaranAddReq;
use App\Models\Pembayaran;

interface PembayaranService 
{
    function add(PembayaranAddReq $req, int $jenisPembayaranId): Pembayaran;
}