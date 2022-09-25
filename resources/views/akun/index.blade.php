@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-left my-4">
    <div class="col-md-6" id="detail-mhs">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Jenis Pembayaran</h6>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>No</th>
                        <th>Akun</th>
                        <th>Jenis Akun</th>
                        <th>Saldo</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($akun as $item)    
                        <tr>
                            <th>#</th>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jenis_akun }}</td>
                            <td>Rp. {{ number_format($item->saldo) }}</td>
                            <td>
                                <a href="{{ route('admin.jenis-pembayaran.edit', $item->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-md-6" id="detail-mhs">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Jenis Pembayaran</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.jenis-pembayaran.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Jenis Pembayaran</label>
                        <input type="text" name="nama_pembayaran" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kode Pembayaran</label>
                        <input type="text" name="kode_pembayaran" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah</label>
                        <input type="number" name="jumlah_bayar" class="form-control">
                    </div>
                
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection