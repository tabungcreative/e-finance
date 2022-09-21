<!DOCTYPE html>
<head>
    <title>Contoh Surat Pernyataan</title>
    <meta charset="utf-8">
    <style>
        /* @page { size: 14cm 21cm portrait; } */
        /* @media print {
            body {transform: rotate(90deg);}
        } */
        * {
            margin: 0;
            padding: 0;
            
        }
        #judul{
            text-align:center;
            margin-bottom: 15px;
        }

        header {
            padding: 30px 30px 10px;
        }
        #halaman{
            width: 100%; 
            height: auto; 
            position: absolute; 
            padding-left: 30px; 
            padding-right: 30px; 
            padding-bottom: 80px;
        }

        .ttd {
            float: right;
            align-items: center;
            margin-right: 100px;
            text-align: center;
        }
        table td {
            padding: 5px;
        }
    </style>

</head>

<body>

    <header>
        <table width="100%">
            <tr>
                <td style="text-align: right">
                    <img src="data:image/png;base64, {{ $image }}" alt="Red dot" width="80px"/>
                </td>
                <td style="text-align: center; color: #5c4eae;">
                    <h3 class="title">UNIVERSITAS SAINS AL QUR’AN (UNSIQ)</h3>
                    <h3>JAWA TENGAH DI WONOSOBO</h3>
                    <h3>FAKULTAS EKONOMI DAN BISNIS</h3>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="width: 100%; text-align: center">
                    <small style="font-size: 10px; border: 1px solid #5c4eae; padding: 7px 40px;" >
                        Alamat Kampus : Jl. KH. Hasyim Asy’ari Km 03 Kalibeber, Mojotengah, Wonosobo 56351 | Telp. (0286) 3399204 | Fax. (0286) 324160 | http://fe.unsiq.ac.id
                    </small>
                </td>
            </tr>
        </table>
    </header>

    <div id=halaman>
        <h4 id="judul">KWITANSI</h4>

        <table width="100%">
            <tr>
                <td style="width: 30%;">No</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $pembayaran->no_pembayaran }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Telah terima dari</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $mahasiswa['nama'] }} / {{ $mahasiswa['nim'] }}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Uang sebanyak</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;"><span style="font: italic small-caps bold 16px/30px Georgia, serif; border: 1px dashed black; padding: 5px 20px;">
                    {{ Riskihajar\Terbilang\Facades\Terbilang::make($pembayaran->jenisPembayaran->jumlah_bayar) }} rupiah
                </span></td>
            </tr>
            <tr>
                <td style="width: 30%;">Guna membayar</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $pembayaran->jenisPembayaran->nama_pembayaran }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Terbilang</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><span style="border: 1px solid black; padding: 5px 20px;">Rp. {{ number_format($pembayaran->jenisPembayaran->jumlah_bayar) }}</span></td>
            </tr>
        </table>


        <div class="ttd">
            <div>Wonosobo, {{ $tanggal }}</div>
            <div>Penerima</div><br><br>
            <div>{{ $mahasiswa['nama'] }}</div>
        </div>

    </div>
</body>

</html>