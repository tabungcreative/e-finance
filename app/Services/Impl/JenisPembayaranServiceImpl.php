<?php

namespace App\Services\Impl;

use App\Exceptions\DatabaseException;
use App\Exceptions\InvariantException;
use App\Http\Requests\AkunAddRequest;
use App\Http\Requests\JenisPembayaranAddReq;
use App\Models\JenisPembayaran;
use App\Services\AkunService;
use App\Services\JenisPembayaranService;
use Exception;
use Illuminate\Support\Facades\DB;

class JenisPembayaranServiceImpl implements JenisPembayaranService
{
    private AkunService $akunService;

    public function __construct() {
        $this->akunService = new AkunServiceImpl();
    }

    public function add(JenisPembayaranAddReq $request): JenisPembayaran
    {
        $nama = $request->input('nama_pembayaran');
        $kode = $request->input('kode_pembayaran');
        $jumlahBayar = $request->input('jumlah_bayar');

        try {
            DB::beginTransaction();
            $jenisPembayaran = new JenisPembayaran();
            $jenisPembayaran->nama_pembayaran = $nama;
            $jenisPembayaran->kode_pembayaran = $kode;
            $jenisPembayaran->jumlah_bayar = $jumlahBayar;
            $jenisPembayaran->save();

            $akunAddRequest = new AkunAddRequest([
                'nama' => $nama,
                'jenis_akun' => 'debit',
            ]);
            
            $this->akunService->add($akunAddRequest);

            DB::commit();
        } catch (Exception $exception) {
            throw new DatabaseException($exception);
            DB::rollBack();
        }

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