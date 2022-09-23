<?php

namespace App\Services;

use App\Http\Requests\AkunAddRequest;
use App\Models\Akun;

interface AkunService {
    function add(AkunAddRequest $request): Akun;
}