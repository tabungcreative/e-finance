<?php

namespace App\Http\Controllers;

use App\Exceptions\InvariantException;
use App\Http\Requests\PembayaranAddReq;
use App\Models\JenisPembayaran;
use App\Models\Pembayaran;
use App\Services\Impl\PembayaranServiceImpl;
use App\Services\PembayaranService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class PembayaranController extends Controller
{
    private PembayaranService $pembayaranService;

    public function __construct() {
        $this->pembayaranService = new PembayaranServiceImpl();
    }

    public function index()
    {
        return 'pembayaran/index';
    }

    public function show($id) {     
        $pembayaran = Pembayaran::find($id);
        $url = 'https://feb-unsiq.ac.id/api';
        $response = Http::get($url .'/mahasiswa/' . $pembayaran->nim);
        $mahasiswa = json_decode($response->body(), $depth=512, JSON_THROW_ON_ERROR)['data'];
        if ($response->status() == 200) {
            return view('pembayaran.show', compact('pembayaran', 'mahasiswa'));
        }else {
            throw new InvariantException("Gagal menemukan data mahasiswa");
        }
    }

    public function create()
    {
        $jenisPembayaran = JenisPembayaran::all();
        return view('pembayaran.create', compact('jenisPembayaran'));
    }

    public function store(PembayaranAddReq $request)
    {
        $jenisPembayaranId = $request->input('jenis_pembayaran_id');
        try {
            $pembayaran = $this->pembayaranService->add($request, $jenisPembayaranId);
            return redirect()->route('admin.pembayaran.show', $pembayaran->id)->with('success', 'Berhasil terbayar');
        } catch (InvariantException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function cetakKwitansi($id) {
        $pembayaran = Pembayaran::find($id);
        $url = 'https://feb-unsiq.ac.id/api';
        $response = Http::get($url .'/mahasiswa/' . $pembayaran->nim);
        $mahasiswa = json_decode($response->body(), $depth=512, JSON_THROW_ON_ERROR)['data'];
        $tanggal = Carbon::parse(now())->translatedFormat('d F Y');

        if ($response->status() == 200) {
            $image = base64_encode(file_get_contents(public_path('kop-feb.png')));
            $pdf = Pdf::loadView('kwitansi.index', compact('pembayaran', 'mahasiswa', 'image', 'tanggal'));
            $pdf->setPaper('a5', 'landscape');
            return $pdf->stream();
        }else {
            throw new InvariantException("Gagal menemukan data mahasiswa");
        }
    }
}
