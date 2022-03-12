<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Post List - Tutorial CRUD Laravel 8 @ qadrlabs.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                <!-- Notifikasi menggunakan flash session data -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
                @endif

                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('pegawai.create') }}" class="btn btn-md btn-success mb-3 float-right">New
                            Pegawai</a>

                        <a href="{{ route('home') }}" class="btn btn-md btn-secondary mb-3 float-left">Home</a>

                        <a class="btn btn-default" href="printpdf" target="_blank"><i class="fa fa-print"></i> Cetak PDF</a>

                        {{-- <a href="{{ route('pegawai.')}}" class="btn btn-md btn-secondary mb-3 float-center"> Cetak </a> --}}

                        <table class="table table-bordered mt-1">
                            <thead class="bg-dark text-light">
                                <tr>
                                    <th scope="col">nip</th>
                                    <th scope="col">nama</th>
                                    <th scope="col">alamat</th>
                                    <th scope="col">posisi jabatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($ewos as $ewos)
                                <tr>
                                    <td>{{ $ewos->nip }}</td>
                                    <td>{{ $ewos->nama }}</td>
                                    <td>{{ $ewos->alamat }}</td>
                                    <td>{{ $ewos->posisijabatan }}</td>
                                    <td class="text-center " style="width: 150px">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('pegawai.destroy', $ewos->id) }}" method="POST">
                                            <a href="{{ route('pegawai.edit', $ewos->id) }}"
                                                class="btn btn-sm btn-primary">EDIT</a>
                                            {{-- <a href="{{ route('pegawai.cetakpegawai', $ewos->id) }}"
                                                class="btn btn-sm btn-primary">cetak</a> --}}
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center text-mute" colspan="4">Data pegawai tidak tersedia</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>