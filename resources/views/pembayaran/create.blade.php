@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center">
    <div class="col-md-6">
        <div class="card shadow border-0">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.pembayaran.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Masukan Nomer Induk Mahasiswa</label>
                        <input type="text" name="nim" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Pembayaran</label>
                        <select name="jenis_pembayaran_id" class="form-control">
                            <option value="">-- Pilih Jenis Pembayaran--</option>
                            @foreach ($jenisPembayaran as $value)  
                                <option value="{{ $value->id }}"> {{$value->nama_pembayaran}} --> Rp. {{ number_format($value->jumlah_bayar)  }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Bayar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection