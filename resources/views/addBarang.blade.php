<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href={{ URL::asset('style.css') }}>
    <title>Penambahan Barang Baru</title>
</head>

<body class="gradient" style="min-height: 100vh">
    <div class="container">
        <div class="row justify-content-center">
            @if (Session::get('barangAdded'))
                <div class="col-lg-6">
                    <div class="card my-5"
                        style="background: linear-gradient(-45deg, #ffffff11, #ffffff88); border: none; box-shadow: inset 0 0 15px 0 #ffffff88; border-radius: 1rem">
                        <h3 class="card-title text-center mt-4">
                            Barang Berhasil Ditambahkan
                        </h3>

                        <div class="card-body">
                            <div class="form-group">
                                <label class="font-weight-bold" for="barang_nama">Nama Barang</label>
                                <p>{{ Session::get('data')['barang_nama'] }}</p>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="barang_deskripsi">Deskripsi</label>
                                <p>{{ Session::get('data')['barang_deskripsi'] }}</p>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="barang_harga">Harga</label>
                                <p>$ {{ Session::get('data')['barang_harga'] }}</p>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="barang_stok">Stok</label>
                                <p>{{ Session::get('data')['barang_stok'] }} pcs</p>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="barang_kategori">Kategori Barang</label>
                                <p>{{ Session::get('data')['barang_kategori'] }}</p>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold" for="barang_gambar">Gambar Barang</label>
                                <img src="{{ '/images/' . Session::get('imageName') }}" alt="Your Image"
                                    style="max-width: 100%">
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-lg-6">
                <div class="card my-5"
                    style="background: linear-gradient(-45deg, #ffffff11, #ffffff88); border: none; box-shadow: inset 0 0 15px 0 #ffffff88; border-radius: 1rem">
                    <h3 class="card-title text-center mt-4">
                        Tambah barang
                    </h3>

                    <div class="card-body">
                        <!-- menambahkan query string warna dengan value biru -->
                        <form method="POST" action="{{ route('tambah-barang-post') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold" for="barang_nama">Nama Barang</label>
                                <input type="text" class="form-control" id="barang_nama" name="barang_nama"
                                    value="{{ old('barang_nama') }}">
                                @error('barang_nama')
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('barang_nama') as $message)
                                            <p class="m-0">{{ $message }}</p>
                                        @endforeach
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="barang_deskripsi">Deskripsi</label>
                                <textarea type="text" class="form-control" id="barang_deskripsi"
                                    name="barang_deskripsi" rows="3">{{ old('barang_deskripsi') }}</textarea>
                                @error('barang_deskripsi')
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('barang_deskripsi') as $message)
                                            <p class="m-0">{{ $message }}</p>
                                        @endforeach
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="barang_harga" >Harga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="number" class="form-control" id="barang_harga" name="barang_harga"
                                        step="0.01" value="{{ old('barang_harga') }}">
                                </div>
                                @error('barang_harga')
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('barang_harga') as $message)
                                            <p class="m-0">{{ $message }}</p>
                                        @endforeach
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold" for="barang_stok" >Stok</label>
                                <input type="number" class="form-control" id="barang_stok" name="barang_stok" value="{{ old('barang_stok') }}">
                                @error('barang_stok')
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('barang_stok') as $message)
                                            <p class="m-0">{{ $message }}</p>
                                        @endforeach
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group" value="{{ old('barang_kategori') }}">
                                <label class="font-weight-bold" for="barang_kategori">Kategori Barang</label>
                                <div class="d-flex align-items-center flex-wrap">
                                    <div class="form-check mr-3">
                                        <input class="form-check-input" type="radio" value="Alat Tulis" id="alat_tulis"
                                            name="barang_kategori">
                                        <label class="form-check-label" for="alat_tulis">
                                            Alat Tulis
                                        </label>
                                    </div>
                                    <div class="form-check mr-3">
                                        <input class="form-check-input" type="radio" value="Peralatan Dapur"
                                            id="peralatan_dapur" name="barang_kategori">
                                        <label class="form-check-label" for="peralatan_dapur">
                                            Peralatan Dapur
                                        </label>
                                    </div>
                                    <div class="form-check mr-3">
                                        <input class="form-check-input" type="radio" value="Pakaian" id="pakaian"
                                            name="barang_kategori">
                                        <label class="form-check-label" for="pakaian">
                                            Pakaian
                                        </label>
                                    </div>
                                    <div class="form-check mr-3">
                                        <input class="form-check-input" type="radio" value="Elektronik" id="elektronik"
                                            name="barang_kategori">
                                        <label class="form-check-label" for="elektronik">
                                            Elektronik
                                        </label>
                                    </div>
                                </div>
                                @error('barang_kategori')
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('barang_kategori') as $message)
                                            <p class="m-0">{{ $message }}</p>
                                        @endforeach
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold" for="barang_gambar">Gambar Barang</label>
                                <input type="file" class="form-control-file" id="barang_gambar" name="barang_gambar">
                                @error('barang_gambar')
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('barang_gambar') as $message)
                                            <p class="m-0">{{ $message }}</p>
                                        @endforeach
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary" style="display: flex; margin: 0 auto">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src={{ URL::asset('nyan-cat.gif') }} style="position: fixed; right: 0; bottom: 0" width="200px" />

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

</body>

</html>
