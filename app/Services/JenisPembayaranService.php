<?php

namespace App\Services;

use App\Http\Requests\JenisPembayaranAddReq;
use App\Models\JenisPembayaran;

interface JenisPembayaranService {
    function add(JenisPembayaranAddReq $request): JenisPembayaran;
    function update(JenisPembayaranAddReq $request, $id): JenisPembayaran;
}