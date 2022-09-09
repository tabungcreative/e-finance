<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{
    public function index()
    {

        $pembayaran = Pembayaran::all(); 
        return response()->json([
            'status' => 'success',
            'data' => $pembayaran
        ]);
    }

    public function show($noPembayaran)
    {
        $pembayaran = Pembayaran::where('no_pembayaran', $noPembayaran)->first();

        if ($pembayaran != null) {
            return response()->json([
                'status' => 'success',
                'data' => $pembayaran
            ]);
        }

        return response()->json([
            'message' => "data mahasiswa tidak ditemukan",
        ], 404);
    }
}
