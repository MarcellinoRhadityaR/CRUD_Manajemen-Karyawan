<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light mt-5">
    <main class="container card">
        <button type="button" class="btn btn-success mt-5 mb-4" data-bs-toggle="modal" data-bs-target="#addModal"
            style="width: 120px">
            Add data <i class="bi bi-plus-lg"></i>
        </button>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center text-capitalize">No</th>
                    <th class="text-center text-capitalize">nama</th>
                    <th class="text-center text-capitalize">alamat</th>
                    <th class="text-center text-capitalize">no telp</th>
                    <th class="text-center text-capitalize">jabatan</th>
                    <th class="text-center text-capitalize">gaji</th>
                    <th class="text-center text-capitalize">jenis kelamin</th>
                    <th class="text-center text-capitalize">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($karyawans as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td class="text-center">{{ $item->nama }}</td>
                        <td class="text-center">{{ $item->alamat }}</td>
                        <td class="text-center">{{ $item->no_telp }}</td>
                        <td class="text-center">{{ $item->jabatan }}</td>
                        <td class="text-center">{{ $item->gaji }}</td>
                        <td class="text-center">{{ $item->jenis_kelamin }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $item->id }}">
                                Edit <i class="bi bi-pencil-square"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#delete{{ $item->id }}">
                                Hapus <i class="bi bi-trash3"></i>
                            </button>
                        </td>
                        {{-- delete modal --}}
                        <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin
                                            Ingin Menghapus Data ini?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('karyawan.destroy', $item->id) }}" method="post">
                                        <div class="modal-body m-auto">
                                            @csrf
                                            @method('DELETE')

                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">yes</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- modal edit --}}
                        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action='{{ route('karyawan.edit', $item->id) }}' method='post'>
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3 row">
                                                <label for="nama"
                                                    class="col-sm-2 col-form-label text-capitalize">nama</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name='nama'
                                                        id="nama" value="{{ $item->nama }}">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="alamat"
                                                    class="col-sm-2 col-form-label text-capitalize">alamat</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name='alamat'
                                                        id="alamat" value="{{ $item->alamat }}">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="no_telp"
                                                    class="col-sm-2 col-form-label text-capitalize">no
                                                    telp</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" name='no_telp'
                                                        id="no_telp" value="{{ $item->no_telp }}">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="jabatan"
                                                    class="col-sm-2 col-form-label text-capitalize">Jabatan</label>
                                                <div class="col-sm-10">
                                                    <select name="jabatan" id="jabatan" class="form-select">
                                                        <option value="" disabled selected
                                                            class="text-capitalize">pilih jabatan
                                                        </option>
                                                        <option value="karyawan"
                                                            {{ $item->jabatan == 'karyawan' ? 'selected' : '' }}
                                                            class="text-capitalize">karyawan</option>
                                                        <option value="manager"
                                                            {{ $item->jabatan == 'manager' ? 'selected' : '' }}
                                                            class="text-capitalize">manager</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="gaji"
                                                    class="col-sm-2 col-form-label text-capitalize">gaji</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" name='gaji'
                                                        id="gaji" value="{{ $item->gaji }}">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="jenis_kelamin"
                                                    class="col-sm-2 col-form-label text-capitalize">jenis_kelamin</label>
                                                <div class="col-sm-10">
                                                    <select name="jenis_kelamin" id="jenis_kelamin"
                                                        class="form-select">
                                                        <option value="" disabled selected
                                                            class="text-capitalize">pilih jenis kelamin
                                                        </option>
                                                        <option value="laki laki"
                                                            {{ $item->jenis_kelamin == 'laki laki' ? 'selected' : '' }}
                                                            class="text-capitaliza">laki laki</option>
                                                        <option value="perempuan"
                                                            {{ $item->jenis_kelamin == 'perempuan' ? 'selected' : '' }}
                                                            class="text-capitalize">perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Add Data --}}
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-capitalize" id="exampleModalLabel">add data karyawan
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action='{{ route('karyawan.store') }}' method='post' class="form-add">
                        <div class="modal-body">
                            @csrf
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-2 col-form-label text-capitalize">nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name='nama' id="nama">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="alamat" class="col-sm-2 col-form-label text-capitalize">alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name='alamat' id="alamat">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="no_telp" class="col-sm-2 col-form-label text-capitalize">no
                                    telp</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name='no_telp' id="no_telp">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jabatan" class="col-sm-2 col-form-label text-capitalize">Jabatan</label>
                                <div class="col-sm-10">
                                    <select name="jabatan" id="jabatan" class="form-select">
                                        <option value="" disabled selected class="text-capitalize">
                                            pilih jabatan</option>
                                        <option value="karyawan" class="text-capitalize">karyawan</option>
                                        <option value="manager" class="text-capitalize">manager</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="gaji" class="col-sm-2 col-form-label text-capitalize">gaji</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name='gaji' id="gaji">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jenis_kelamin"
                                    class="col-sm-2 col-form-label text-capitalize">jenis_kelamin</label>
                                <div class="col-sm-10">
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                                        <option value="" disabled selected class="text-capitalize">
                                            pilih jenis kelamin
                                        </option>
                                        <option value="laki laki" class="text-capitaliza">laki laki
                                        </option>
                                        <option value="perempuan" class="text-capitalize">perempuan
                                        </option>
                                    </select>
                                </div>
                                {{-- </div> --}}
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success text-capitalize">add
                                        data</button>
                                </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <!-- AKHIR DATA -->
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @if (session('store'))
        <script>
            Swal.fire({
                title: 'Sukses!',
                text: '{{ session('store') }}',
                icon: 'success',
                confirmButtonText: 'Ok'
            });
        </script>
    @endif

    @if (session('update'))
        <script>
            Swal.fire({
                title: 'Sukses!',
                text: '{{ session('update') }}',
                icon: 'success',
                confirmButtonText: 'Ok'
            });
        </script>
    @endif
    @if (session('destroy'))
        <script>
            Swal.fire({
                title: 'Sukses!',
                text: '{{ session('destroy') }}',
                icon: 'success',
                confirmButtonText: 'Ok'
            });
        </script>
    @endif

</body>

</html>
