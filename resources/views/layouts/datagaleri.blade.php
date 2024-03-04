<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">


    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-cyborg-gaming.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <header class="header-area header-sticky">
        <div class="container" style="margin-left: 133px;">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <!-- <a href="index.html" class="logo">
                        <img src="assets/images/logo.png" alt="">
                    </a> -->
                        <p style="font-size: 30px;color: #e75e8d;">Gallery Photo</p>
                        <!-- ***** Logo End ***** -->

                        <ul class="nav">
                            <li><a href="/home">Home</a></li>
                            <li><a href="/tambah"><i class="fa-solid fa-plus"></i> Tambah foto</a></li>
                            @if (auth()->user()->level == 'admin')
                                <li><a href="/datagaleri" class="active">Data Galeri</a></li>
                            @endif
                            <li><a href="/profile">Profile <img src="assets/images/profile-header.jpg"
                                        alt=""></a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
</head>

<body style="padding: 0 143px;">
    <div class="card" style="margin-top: 100px;padding: 15px 10px;background: #27292a">
        <div class="container">
            <h1 style="color:#e75e8d">Data Pengguna</h1>
            <table class="table" style="margin-top: 10px">
                <thead style="color: white">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Email</th>
                        <th scope="col">Username</th>
                        <th scope="col">Level</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody style="color: white">
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->level }}</td>
                            <td>
                                <!-- Tambahkan tombol-tombol aksi sesuai kebutuhan -->
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

</body>
