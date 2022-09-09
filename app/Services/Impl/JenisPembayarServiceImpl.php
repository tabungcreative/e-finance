<?php

namespace App\Services\Impl;

use App\Http\Requests\JenisPembayaranAddReq;
use App\Models\JenisPembayaran;
use App\Services\JenisPembayaranService;

class JenisPembayaranServiceImpl implements JenisPembayaranService
{
    public function add(JenisPembayaranAddReq $request): JenisPembayaran
    {
        $nama = $request->input('nama');
        $jumlahBayar = $request->input('jumlah_bayar');

        $jenisPembayaran = new JenisPembayaran();
        $jenisPembayaran->nama = $nama;
        $jenisPembayaran->jumlah_bayar = $jumlahBayar;
        $jenisPembayaran->save();

        return $jenisPembayaran;
    }
}