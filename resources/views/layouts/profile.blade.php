<head>
    <link rel="stylesheet" href="assets/css/templatemo-cyborg-gaming.css">

    <head>
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
            rel="stylesheet">


        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="assets/css/fontawesome.css">
        <link rel="stylesheet" href="assets/css/templatemo-cyborg-gaming.css">
        <link rel="stylesheet" href="assets/css/owl.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    </head>

    <div style="cursor: pointer;">

        <div style="display: flex;">
            <li><a href="/home" class="active">Home \</a></li>
            <li><a href="/profile" class="active" style="margin-left: 5px;">Profile</a></li>
        </div>

<body style="padding: 50px;">
    <div class="card"
        style="padding: 30px;background-color: #373b3d;width: 800px;position: fixed;left: 25%;border-radius: 50px">

        <p style="text-align: end;color:pink" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Log Out') }}
        </p>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

        <img src="assets/images/popular-02.jpg"
            style="height: 230px;width: 230px;left: 35%;position: relative;border-radius: 115px">
        <p style="text-align:center;margin-top: 20px;font-size:large">{{ Auth::user()->username }}</p>
        <p style="text-align:center;margin:0px 10px;font-size:large">Describe Profile</p>

        <p style="margin-top: 25px;color: white;">Info Pribadi</p>
        <div style="display: flex;">
            <div>
                <p>Nama Lengkap</p>
                <p>Email</p>
            </div>

            <div style="margin: 0px 10px;">
                <p>:</p>
                <p>:</p>
            </div>

            <div>
                <p>{{ Auth::user()->name }}</p>
                <p>{{ Auth::user()->email }}</p>
            </div>
        </div>
    </div>
</body>
</div>
