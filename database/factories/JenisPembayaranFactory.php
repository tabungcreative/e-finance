<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JenisPembayaran>
 */
class JenisPembayaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_pembayaran' => 'Seminar Proposal',
            'kode_pembayaran' => 'SEMPRO',
            'jumlah_bayar' => 200000,
        ];
    }
}
