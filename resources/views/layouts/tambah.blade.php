<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


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
                            <li><a href="/tambah" class="active"><i class="fa-solid fa-plus"></i> Tambah foto</a></li>
                            @if (auth()->user()->level=="admin")
                            <li><a href="/datagaleri">Data Pengguna</a></li>
                            @endif
                            <li><a href="/profile">Profile <img src="assets/images/profile-header.jpg" alt=""></a></li>
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

<body>
    <div class="container" style="padding-top: 30px;">



        <div class="most-popular" style="padding: 20px 20px;">
            @include('layouts.notif')
            <p style="font-size: larger;font-weight: bold;">Tambahkan Foto
            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group" style="margin: 20px 0px;">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group" style="margin: 20px 0px;">
                    <textarea class="form-control" name="deskripsi" placeholder="Deskripsi Foto"></textarea>
                </div>
                <button type="submit" style="--bs-btn-bg: #e75e8d;color: white;" class="btn btn-info btn-block">Upload</button>
            </form>
        </div>
    </div>
</body>
