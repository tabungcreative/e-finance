<?php

namespace App\Services\Impl;

use App\Http\Requests\JenisPembayaranAddReq;
use App\Models\JenisPembayaran;
use App\Services\JenisPembayaranService;

class JenisPembayaranServiceImpl implements JenisPembayaranService
{
    public function add(JenisPembayaranAddReq $request): JenisPembayaran
    {
        $nama = $request->input('nama_pembayaran');
        $kode = $request->input('kode_pembayaran');
        $jumlahBayar = $request->input('jumlah_bayar');

        $jenisPembayaran = new JenisPembayaran();
        $jenisPembayaran->nama_pembayaran = $nama;
        $jenisPembayaran->kode_pembayaran = $kode;
        $jenisPembayaran->jumlah_bayar = $jumlahBayar;
        $jenisPembayaran->save();

        return $jenisPembayaran;
    }

    function update(JenisPembayaranAddReq $request, $id): JenisPembayaran
    {
        $nama = $request->input('nama_pembayaran');
        $kode = $request->input('kode_pembayaran');
        $jumlahBayar = $request->input('jumlah_bayar');
        
        $jenisPembayaran = JenisPembayaran::find($id);
        $jenisPembayaran->nama_pembayaran = $nama;
        $jenisPembayaran->kode_pembayaran = $kode;
        $jenisPembayaran->jumlah_bayar = $jumlahBayar;
        $jenisPembayaran->save();

        return $jenisPembayaran;
    }

}