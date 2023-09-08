<!--DOCTYPE html-->

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Artikel</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css?v=3.2.0">

    {{-- import css datatable dari cdn --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                {{-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Home</a>
                </li> --}}
                {{-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li> --}}
            </ul>

            <ul class="navbar-nav ml-auto">

                {{-- <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="#" class="brand-link">
                <img src="https://adminlte.io/themes/v3/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Dashboard Admin </span>
            </a>

            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg"
                            class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">ADMIN</a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Artikel
                                    {{-- <span class="right badge badge-danger">New</span> --}}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Kembali
                                    {{-- <span class="right badge badge-danger">New</span> --}}
                                </p>
                            </a>
                    </ul>
                </nav>

            </div>

        </aside>

        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard Artikel</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard Artikel</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <!-- Button trigger modal -->
                                <div class="card-header">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal">
                                        Tambah Artikel
                                    </button>
                                </div>
                                <div class="table-responsive">
                                    <div class="card-body">
                                        <table class="table" id="tabel-artikel">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Judul</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Thumbnail</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($artikel as $data)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>{{ $data->judul }}</td>
                                                        <td>{{ $data->tanggal }}</td>
                                                        <td><img src="{{ url('thumbnail/' . $data->thumbnail) }}"
                                                                width="100px">
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-warning btn-edit"
                                                                data-id="{{ $data->id }}" data-toggle="modal"
                                                                data-target="#editModal">Edit</button>

                                                            {{-- <a href="{{ route('artikel.show', $data->id) }}" class="btn btn-warning" data-id="{{ $data->id }}">Edit</a> --}}
                                                            <form action="{{ route('artikel.destroy', $data->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger">Hapus</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="modal fade" id="editModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Artikel</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div id="judulArtikel"></div>
                                            <div id="Tanggal_Artikel"></div>
                                            <div id="thumbnailArtikel"></div>
                                            <div id="isiArtikel"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Tutup</button>
                                            <button type="button" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <!-- edit Modal -->
                            <div class="modal fade" id="editModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Data Artikel</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('artikel.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Judul :</label>
                                                    <input type="text" name="judul" class="form-control"
                                                        id="judulArtikel" placeholder="Masukan judul">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Tanggal :</label>
                                                    <input id="Tanggal_Artikel" type="date" name="tanggal"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Thumbnail :</label>
                                                    <input id="thumbnailArtikel" type="file" name="thumbnail"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Isi :</label>
                                                    <textarea id="isiArtikel"name="isi" class="form-control" id="editor" rows="3"></textarea>
                                                </div>
                                                <div class="text-center">
                                                    <form id="editForm"
                                                        action="{{ route('artikel.update', $data->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT') {{-- Assuming you are using the PUT method to update data --}}
                                                        <!-- Your form fields here -->
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </form>


                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Data Artikel</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('artikel.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Judul :</label>
                                                    <input type="text" name="judul" class="form-control"
                                                        id="exampleFormControlInput1" placeholder="Masukan judul">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Tanggal :</label>
                                                    <input type="date" name="tanggal" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Thumbnail :</label>
                                                    <input type="file" name="thumbnail" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Isi :</label>
                                                    <textarea name="isi" class="form-control" id="editor" rows="3"></textarea>
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <aside class="control-sidebar control-sidebar-dark">

            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>


        <footer class="main-footer">

            <div class="float-right d-none d-sm-inline">
                Keep Spirit
            </div>

            <strong>Copyright &copy; 2023 <a href="http://cahyotriatmojo070303.epizy.com/">Cahyo Tri
                    Atmojo</a>.</strong> All rights
            reserved.
        </footer>
    </div>

    <script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
    {{-- // Script untuk menampilkan data artikel ke dalam modal --}}
    <script>
        $(document).ready(function() {
            // When the "Edit" button is clicked
            $('.btn-edit').click(function() {
                var id = $(this).data('id');

                // Fetch data from the backend using AJAX
                $.ajax({
                    url: '/admin/artikel/' + id, // Replace with your backend URL
                    method: 'GET',
                    success: function(response) {
                        // Populate the modal form fields with data from the response
                        $('#judulArtikel').val(response.judul);
                        $('#isiArtikel').val(response.isi);
                        $('#Tanggal_Artikel').val(response.tanggal);
                        // Assuming you have the thumbnail file URL in the response
                        // Use the appropriate attribute in your response
                        $('#thumbnailArtikel').val(response.thumbnail);

                        // Show the modal
                        $('#editModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        // Handle any errors if necessary
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // When the "Edit" button is clicked
            $('.btn-edit').click(function() {
                var id = $(this).data('id');

                // Fetch data from the backend using AJAX
                $.ajax({
                    url: '/admin/artikel/' + id, // Replace with your backend URL
                    method: 'GET',
                    success: function(response) {
                        // Populate the modal form fields with data from the response
                        $('#judulArtikel').val(response.judul);
                        $('#isiArtikel').val(response.isi);
                        $('#Tanggal_Artikel').val(response.tanggal);
                        // Assuming you have the thumbnail file URL in the response
                        // Use the appropriate attribute in your response
                        $('#thumbnailArtikel').val(response.thumbnail);

                        // Show the modal
                        $('#editModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        // Handle any errors if necessary
                    }
                });
            });

            // When the "Simpan" button in the edit modal is clicked
            $('#editModal').on('submit', '#editForm', function(e) {
                e.preventDefault(); // Prevent the default form submission

                // Serialize the form data
                var formData = new FormData(this);

                // Send an AJAX request to update the data
                $.ajax({
                    url: $(this).attr('action'), // Use the form's action attribute
                    method: 'POST', // Use POST method since you're updating data
                    data: formData,
                    processData: false, // Don't process the data
                    contentType: false, // Don't set content type
                    success: function(response) {
                        // Handle the success response if needed
                        // For example, close the modal or display a success message
                        $('#editModal').modal('hide');
                        // You may also want to update the table or reload the page to reflect the changes
                    },
                    error: function(xhr, status, error) {
                        // Handle any errors if necessary
                    }
                });
            });
        });
    </script>
    <script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
    <script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js?v=3.2.0"></script>

    {{-- import js datatable dari cdn --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    {{-- import js ckeditor dari cdn --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>

    {{-- inisialisasi datatable --}}
    <script>
        $(document).ready(function() {
            $('#tabel-artikel').DataTable();
        });
    </script>

    {{-- inisialisasi ckeditor --}}
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>


</body>

</html>
