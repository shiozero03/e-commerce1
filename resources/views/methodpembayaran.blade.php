@extends('templateshow')
@section('title','Keranjang')
@section('main')

@foreach($keranjangdata as $ker)
<div class="pt-5 pt-lg-1 pt-md-2 ">
    <div class="topshow alert alert-primary rounded mt-5 mt-lg-1 mt-md-1">
        @if($ker->status == 1)
        <a href="/keranjang" class="text-dark"><h4><i class="fas fa-arrow-left"></i> Back</h4></a>
        @else
        <a href="/riwayat" class="text-dark"><h4><i class="fas fa-arrow-left"></i> Back</h4></a>
        @endif
    </div>
</div>

<div class="ps-lg-5 ps-md-5 pe-lg-5 pe-md-5 ps-2 pe-2 pb-2">
    <div class="p-lg-4 p-md-4 p-3 bg-landinglight rounded">
        <?php
            $produk = DB::table('products')->where('id_produk', $ker->id_produk)->get();
        ?>
        @foreach($produk as $pro)
        <div class="topshow alert alert-dark rounded">
            <h3>{{$pro->nama_produk}}</h3>
        </div>
        <div class="float-start col-lg-4 col-md-4 col-12">
            <img src="{{ asset('mystyle/image/'.$pro->featured_image) }}" class="rounded" style="width:100%">
        </div>
        <div class="float-start col-lg-8 col-md-8 col-12">
            <table class="table ms-lg-4 ms-md-4 rounded">
                <tr>
                    <th colspan="2" class="text-center">
                        <h4>Pilih Jenis Pembayaran</h4>
                        <small>Bayar ke nomor rekening yang tertera</small>
                    </th>
                </tr>
            </table>
            <table class="table ms-lg-4 ms-md-4 rounded">
                <tr>
                    <th>Jenis</th>
                    <th>Nomor</th>
                    <th>Atas Nama</th>
                </tr>
                @foreach($metode as $met)
                <tr>
                    <th>{{$met->jenis}}</th>
                    <td>{{$met->nomor}}</td>
                    <td>{{$met->atasnama}}</td>
                </tr>
                @endforeach
            </table>
            @if($ker->bukti_pembayaran == null)
            <form class="ms-lg-4 ms-md-4" action="/keranjang/bayar/cek" method="post" enctype="multipart/form-data">
                <div>
                    @csrf
                    <input type="hidden" name="id_keranjang" value="{{$ker->id_keranjang}}">
                    <label>Jumlah yang harus dibayar</label>
                    <input type="text" name="harga" class="form-control" readonly value="Rp {{ ($pro->harga - (($pro->harga) * ($pro->diskon)/100)) * $ker->jumlah }}">
                    <label>Bukti Pembayaran</label>
                    <input type="file" name="icon" class="form-control" required>
                </div>
                <div class="mt-2">
                    <button name="keranjang" class="btn-landingprimary btn">Kirim</button>
                </div>
            </form>
            @else
            <div class="ms-lg-4 ms-md-4">
                <em><h4><strong>Menunggu Konfirmasi Admin</strong></h4></em>
            </div>
            @endif
            
        </div>
        <div class="clearfix"></div>
        <hr class="mt-2 mb-2">
        @endforeach
    </div>
    @endforeach
</div>
@endsection
