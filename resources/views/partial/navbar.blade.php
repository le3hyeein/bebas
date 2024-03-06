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
                        <li><a href="/home" class="active">Home</a></li>
                        <li><a href="/tambah"><i class="fa-solid fa-plus"></i> Tambah foto</a></li>
                        <li><a href="/postingan">Postingan</a></li>
                        @if (auth()->user()->level=="admin")
                        <li><a href="/datagaleri">Data Pengguna</a></li>
                        @endif
                        <li><a href="/profile">Profile <img src="assets/images/profile-header.jpg" alt=""></a></li>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>77788
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
