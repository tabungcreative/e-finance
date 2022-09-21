<?php 

namespace App\Services\Impl;

use App\Exceptions\InvariantException;
use App\Http\Requests\PembayaranAddReq;
use App\Models\JenisPembayaran;
use App\Models\Pembayaran;
use App\Services\PembayaranService;
use Illuminate\Support\Facades\Http;

class PembayaranServiceImpl implements PembayaranService
{
    public function add(PembayaranAddReq $req, int $jenisPembayaranId): Pembayaran
    {
        $nim = $req->input('nim');
        $jenisPembayaran = JenisPembayaran::find($jenisPembayaranId);
        if ($jenisPembayaran == null) {
            throw new InvariantException("Jenis Pembayaran Tidak Diketahui");
        }
        
        $idPembayaran = Pembayaran::orderBy('id', 'DESC')->first()->id;
        $nomer = str_pad(($idPembayaran + 1), 4, '0', STR_PAD_LEFT);
        $no_pembayaran = $nomer .'/'.$jenisPembayaran->kode_pembayaran;
        
        try {
            $url = 'https://feb-unsiq.ac.id/api';
            $response = Http::get($url .'/mahasiswa/' . $nim);
            $mahasiswa = json_decode($response->body(), $depth=512, JSON_THROW_ON_ERROR)['data'];

            if ($response->status() == 200) {
                $pembayaran = new Pembayaran();
                $pembayaran->nim = $mahasiswa['nim'];
                $pembayaran->no_pembayaran = $no_pembayaran;
                $pembayaran->tanggal_bayar = now();
                $jenisPembayaran->pembayaran()->save($pembayaran);
            }else {
                throw new InvariantException("Gagal menemukan data mahasiswa");
            }
        } catch (\Exception $e) {
            throw new InvariantException("Gagal menemukan data mahasiswa");
        }
        
        return $pembayaran;
    }
}