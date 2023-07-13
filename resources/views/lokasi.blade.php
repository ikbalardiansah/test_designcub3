<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tugas 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="col-md-6 m-auto">
            <div class="card p-4 m-4 bg-primary fw-bold text-white">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Pilih Lokasi</label>
                        <select class="form-select my-3" aria-label="Default select example" id="provinsi">
                            <option>Pilih Provinsi</option>
                            @foreach ($provinces as $provinsi)
                                <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-select my-3" aria-label="Default select example" id="kabupaten">
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-select my-3" aria-label="Default select example" id="kecamatan">
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-select my-3" aria-label="Default select example" id="desa">
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>



    {{-- Jquery --}}
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
        })

        $(function() {
            $('#provinsi').on('change', function() {
                let id_provinsi = $('#provinsi').val()

                $.ajax({
                    type: 'POST',
                    url: "{{ route('getkabupaten') }}",
                    data: {
                        id_provinsi: id_provinsi
                    },
                    cache: false,

                    success: function(msg) {
                        $('#kabupaten').html(msg)
                        $('#kecamatan').html('')
                        $('#desa').html('')
                    },
                    error: function(data) {
                        console.log('error:', error)
                    }
                })
            })

            $('#kabupaten').on('change', function() {
                let id_kabupaten = $('#kabupaten').val()

                $.ajax({
                    type: 'POST',
                    url: "{{ route('getkecamatan') }}",
                    data: {
                        id_kabupaten: id_kabupaten
                    },
                    cache: false,

                    success: function(msg) {
                        $('#kecamatan').html(msg)
                        $('#desa').html('')
                    },
                    error: function(data) {
                        console.log('error:', error)
                    }
                })
            })

            $('#kecamatan').on('change', function() {
                let id_kecamatan = $('#kecamatan').val()

                $.ajax({
                    type: 'POST',
                    url: "{{ route('getdesa') }}",
                    data: {
                        id_kecamatan: id_kecamatan
                    },
                    cache: false,

                    success: function(msg) {
                        $('#desa').html(msg)
                    },
                    error: function(data) {
                        console.log('error:', error)
                    }
                })
            })
        })
    </script>
</body>

</html>
