<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <style>
            *{
                box-sizing: border-box;
            }
            body{
                font-family: 'Times New Roman', Times, serif;
                background-color: #ccc;
            }
            .rangkasurat {
                width: 794px;
                margin: 0 auto;
                background-color: #fff;
                height: 561px;
                padding: 20px;
                border: 1px solid #000;
            }
            table.kop {
                border-bottom: 5px solid #000; padding: 2px;
            }
            .tengah {
                text-align: center;
                line-height: 20px;
            }
            #judul{
                text-align:center;
            }

        </style>
        <title>Kwitansi</title>
    </head>
    <body>
        <div class="rangkasurat">
            <table width="100%" class="kop">
                <tr>
                    <td align="center">
                        <img src="{{ asset('img/logo-unsiq.png') }}" alt="" width="140px">
                    </td>
                    <td class="tengah">
                        <h2>UNIVERSITAS SAINS ALQURAN</h2>
                        <h2>JAWA TENGAH DI WONOSOBO</h2>
                        <h2>FAKULTAS EKONOMI DAN BISNIS</h2>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <div class="alamat" style="border: 1px solid #000; font-size: 0.9em">
                            Alamat Kampus: Jl. KH. Hasyim Asy'ari Km 03 Kalibeber, Mojotengah, Wonosobo | Telp. (0286) 339904 | Fax. (0286) 3241560 | https:\\feb-unsiq.ac.id
                        </div>
                    </td>
                </tr>
            </table>
            <div id=halaman>
                <h3 id=judul>KWITANSI</h3>

                <table width="100%">
                    <tr>
                        <td style="width: 30%;">Nomor</td>
                        <td style="width: 5%;">:</td>
                        <td style="width: 65%;">{{ $pembayaran->no_pembayaran }}</td>
                    </tr>
                    <tr>
                        <td style="width: 30%;">Telah terima dari</td>
                        <td style="width: 5%;">:</td>
                        <td style="width: 65%;">{{ $mahasiswa['nama'] }}</td>
                    </tr>
                    <tr>
                        <td style="width: 30%;">Guna Membayar</td>
                        <td style="width: 5%;">:</td>
                        <td style="width: 65%;">{{ $pembayaran->jenisPembayaran->nama_pembayaran }}</td>
                    </tr>
                    <tr>
                        <td style="width: 30%;">Terbilang</td>
                        <td style="width: 5%;">:</td>
                        <td style="width: 65%"><span style="padding: 5px; border: 1px solid #000;">Rp. 5000</span></td>
                    </tr>
                </table>
                <div style="width: 50%; text-align: center; float: right;">Wonosobo, {!! date("d M Y") !!}</div><br>
                <br><br><br><br><br>
                <div style="width: 50%; text-align: center; float: right;">Arbrian Abdul Jamal</div>

            </div>
        </div>
        <script>
            window.print()
        </script>
    </body>
</html>
