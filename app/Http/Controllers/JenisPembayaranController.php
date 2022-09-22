<?php

namespace App\Http\Controllers;

use App\Exceptions\InvariantException;
use App\Http\Requests\JenisPembayaranAddReq;
use App\Models\JenisPembayaran;
use App\Services\Impl\JenisPembayaranServiceImpl;
use App\Services\JenisPembayaranService;
use Illuminate\Http\Request;

class JenisPembayaranController extends Controller
{
    private JenisPembayaranService $jenisPembayaranService;
    
    public function __construct() {
        $this->jenisPembayaranService = new JenisPembayaranServiceImpl();
    }

    public function index()
    {
        $jenisPembayaran = JenisPembayaran::all();
        return view('jenis-pembayaran.index', compact('jenisPembayaran'));
    }

    public function store(JenisPembayaranAddReq $request)
    {
        try {
            $this->jenisPembayaranService->add($request);
            return redirect()->back()->with('success', 'Berhasil menambah data jenis pembayaran');
        } catch (InvariantException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $jenisPembayaran = JenisPembayaran::find($id);
        return view('jenis-pembayaran.edit', compact('jenisPembayaran'));
    }

    public function update(JenisPembayaranAddReq $request, $id)
    {
        try {
            $this->jenisPembayaranService->update($request, $id);
            return redirect()->route('admin.jenis-pembayaran.index')->with('success', 'Berhasil menambah data jenis pembayaran');
        } catch (InvariantException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
