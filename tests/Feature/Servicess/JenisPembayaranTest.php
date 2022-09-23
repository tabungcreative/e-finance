<?php

namespace Tests\Feature\Servicess;

use App\Http\Requests\JenisPembayaranAddReq;
use App\Models\Akun;
use App\Services\JenisPembayaranService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertSame;

class JenisPembayaranTest extends TestCase
{
    use RefreshDatabase;
    private JenisPembayaranService $jenisPembayaranService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->jenisPembayaranService = $this->app->make(JenisPembayaranService::class);
    }
    
    public function test_add_success()
    {
        $request = new JenisPembayaranAddReq([
            'nama_pembayaran' => 'test',
            'kode_pembayaran' => 'TEST',
            'jumlah_bayar' => 10
        ]);

        $result = $this->jenisPembayaranService->add($request);

        $this->assertDatabaseCount('jenis_pembayaran', 1);
        $this->assertDatabaseCount('akun', 1);

        $akun = Akun::orderBy('created_at', 'DESC')->first();

        $this->assertSame($akun->nama, $result->nama_pembayaran);
        $this->assertSame(0, $akun->saldo);
        $this->assertSame('debit', $akun->jenis_akun);
    }
}
