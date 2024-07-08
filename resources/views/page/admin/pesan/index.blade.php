@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center border py-4">
            <div class="col-lg-10 text-center">
                <h3 class="fw-bold">PESAN</h3>
            </div>
            <div class="col-lg-5 my-3">
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 70px;">Nama</td>
                        <td style="width: 50px" class="text-center">:</td>
                        <td>
                            <select name="username" id="nama" class="form-select form-select-lg">
                                @foreach ($nomorTelp as $item)
                                    @unless ($item->username == 'Admin')
                                        <option value="{{ $item->no_tlp }}">{{ $item->username }}</option>
                                    @endunless
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 70px;">Pesan WA</td>
                        <td style="width: 50px" class="text-center">:</td>
                        <td>
                            <input type="hidden" id="no_tlp" name="no_tlp" value="6285221454357">
                            <textarea id="pesan" name="pesan" class="form-control mt-3" cols="30" rows="10">Penyewaan GOR anda telah diterima, silahkan lakukan pembayaran Dp total 200.000 melalui rekening BRI dengan nomor: *** *** *** dan kirim bukti pembayaran melalui WA. sekian terimakasih...</textarea>
                        </td>
                    </tr>
                </table>
                <button class="btn btn-success float-end mt-3 px-3" type="button" onclick="openWhatsApp()"><i
                        class="bi bi-send"></i> Kirim</button>
            </div>
        </div>
    </div>

    <script>
        function openWhatsApp() {
            const no_tlp = document.getElementById('no_tlp').value;
            const nama = document.getElementById('nama').value;
            const pesan = document.getElementById('pesan').value;

            const message = `Hallo ${nama}%0A` +
                `${pesan}`;

            const url = `https://wa.me/${no_tlp}?text=${message}`;
            window.open(url, '_blank');
        }
    </script>
@endsection
