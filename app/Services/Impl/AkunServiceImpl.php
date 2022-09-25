<?php

namespace App\Services\Impl;

use App\Http\Requests\AkunAddRequest;
use App\Models\Akun;
use App\Services\AkunService;

class AkunServiceImpl implements AkunService {
    function add(AkunAddRequest $request): Akun
    {
        $nama = $request->input('nama');
        $jenisAkun = $request->input('jenis_akun');

        $akun = new Akun();
        $akun->nama = $nama;
        $akun->jenis_akun = $jenisAkun;
        $akun->saldo = 0;
        $akun->save();
        return $akun;
    }
}