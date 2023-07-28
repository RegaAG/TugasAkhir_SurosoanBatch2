<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <a class="my-5 btn btn-danger" href="{{ route('Logout') }}">Logout</a>
        <h1>Product</h1>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">Code</th>
                        <th scope="col">Name Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Category</th>
                        <th scope="col">Updated_at</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $item)
                        <tr>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ number_format($item->price) }}</td>
                            <td>{{ $item->category }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td>
                                <!-- Button trigger modal Edit -->
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editProduk{{ $item->id }}">
                                    Edit Produk
                                </button>
                                <!-- Button trigger modal Hapus -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#hapusProduk{{ $item->id }}">
                                    Hapus Produk
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Button trigger modal Tambah -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahProduk">
            Tambah Produk
        </button>

        <!-- Modal Hapus -->
        @foreach ($datas as $item)
            <div class="modal fade" id="hapusProduk{{ $item->id }}" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Apakah Yakin Akan Menghapus Produk
                                {{ $item->name }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="/dashboard/{{ $item->id }}" method="POST">
                            <div class="modal-body">
                                @csrf
                                @method('DELETE')
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">HAPUS</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- Modal Edit -->
        @foreach ($datas as $item)
            <div class="modal fade" id="editProduk{{ $item->id }}" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $item->name }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="/dashboard/{{ $item->id }}" method="POST">
                            <div class="modal-body">
                                @csrf
                                @method('PUT')
                                <div class="form-group m-2">
                                    <label for="code">Code:</label>
                                    <input type="text" name="code" id="code" class="form-control"
                                        value="{{ $item->code }}" autocomplete="off" required>
                                </div>

                                <div class="form-group m-2">
                                    <label for="name">Name:</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ $item->name }}" autocomplete="off" required>
                                </div>

                                <div class="form-group m-2">
                                    <label for="price">Price:</label>
                                    <input type="number" name="price" id="price" class="form-control"
                                        value="{{ $item->price }}" autocomplete="off" required>
                                </div>

                                <div class="form-group m-2">
                                    <label for="category">Category:</label>
                                    <input type="text" name="category" id="category" class="form-control"
                                        value="{{ $item->category }}" autocomplete="off" required>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" value="{{ Auth()->id() }}" name="user_id">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Updated</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- Modal Tambah -->
        <div class="modal fade" id="tambahProduk" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Produk</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="/dashboard" method="POST">
                        <div class="modal-body">
                            @csrf
                            <div class="form-group m-2">
                                <label for="code">Code:</label>
                                <input type="text" name="code" id="code" class="form-control"
                                    autocomplete="off" required>
                            </div>

                            <div class="form-group m-2">
                                <label for="name">Name Produk:</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    autocomplete="off" required>
                            </div>

                            <div class="form-group m-2">
                                <label for="price">Price:</label>
                                <input type="number" name="price" id="price" class="form-control"
                                    autocomplete="off" required>
                            </div>

                            <div class="form-group m-2">
                                <label for="category">Category:</label>
                                <input type="text" name="category" id="category" class="form-control"
                                    autocomplete="off" required>
                            </div>

                            <div class="form-group">
                                <input type="hidden" value="{{ Auth()->id() }}" name="user_id">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>

</html>
