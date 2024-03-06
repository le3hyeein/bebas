<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>Gallery</title>

    <!-- Memuat jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Memuat JavaScript Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">



    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-cyborg-gaming.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <!--TemplateMo 579 Cyborg Gaming
  https://templatemo.com/tm-579-cyborg-gaming-->
</head>

@include('partial.navbar')



<body style="cursor: pointer;">
    <div class="container">


        <div class="most-popular">

            <div class="row">

                @foreach ($posts as $post)
                    <div class="col-lg-3 col-sm-6">
                        <div class="item" style="padding: 0px 15px;max-height: 425px;min-height:425px">

                            <h4>{{ $post->user->username }}<br>
                                <!-- <img style="height: 260px;margin-top:10px" src="assets/images/popular-01.jpg" alt=""> -->
                                <div class="show_image"><a href="#modal_{{ $post->id }}" data-toggle="modal"><img
                                            src="image/{{ $post->image }}"></a></div>

                                <div style="display:flex;margin-top:10px">
                                    @if (auth()->user()->level == 'user')
                                        <i style="font-size: 25px;" class="fa-regular fa-heart"></i>
                                        <span style="margin-left: 10px;">2</span>
                                        <i style="margin-left: 35px;font-size: 25px;" class="fa-regular fa-comment"></i>
                                        <span style="margin-left: 10px;">{{ $post->comments()->count() }}</span>
                                        <button onclick="copyToClipboard('{{ $post->image }}')"
                                            style="border: none; background: transparent;">
                                            <i style="font-size: 20px;color:#656565; margin-left: 10px" id="icon3"
                                                class="fa fa-share"></i>
                                            </button>
                                    @endif


                                </div>
                                <a href="/delete/{{ $post->id }}" class="fa fa-trash"
                                    onclick="return confirm('Apakah anda yakin ingin hapus foto ini?');"></a>
                                <span
                                    style="margin-top: 15px;color: white;word-break: break-all">{{ $post->deskripsi }}</span>
                            </h4>
                        </div>
                    </div>

                    <!-- Modal -->

                    <div class="modal fade" id="modal_{{ $post->id }}">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="show_image2"><a href="#modal_{{ $post->id }}"><img
                                                src="image/{{ $post->image }}"></a></div>

                                    <div class="desc-post" style="text-align: center;">
                                        {{ $post->deskripsi }}
                                    </div>

                                    <div class="panel-footer" style="border-radius: 12px;">

                                        <span style="color: white;" class="user-info">by
                                            {{ $post->user->username }}</span>

                                        <span style="color: white;float:right"
                                            class="user-time pull-right">{{ $post->created_at->diffForHumans() }}</span>
                                    </div>
                                    <br>
                                    <h4>Comment:</h4>
                                    <form action="{{ route('addComent', $post->id) }}" method="post"
                                        style="margin-top: 10px;">
                                        @csrf
                                        <div class="form-group">
                                            <textarea required type="text" name="content" class="form-control" placeholder="Comment here"></textarea>
                                        </div>
                                        <button class="btn btn-success btn-block" type="submit"
                                            style=" border-color: hotpink;background: hotpink;">Comment</button>
                                    </form>

                                    @if (session('notif'))
                                        <div class="alert alert-success" style="margin-top: 15px;">
                                            {{ session('notif') }}
                                        </div>
                                    @endif
                                    <hr>

                                    <div class="komen-list">
                                        @if ($post->comments->isEmpty())
                                            <div class="text-center" style="color: white;">Tidak Ada Komentar.</div>
                                        @else
                                            @foreach ($post->comments as $comment)
                                                <div class="komen-body">
                                                    <p style="color: white;">{{ $comment->content }}</p>
                                                    <span style="color: black;font-size:15px;">by
                                                        {{ $comment->user->username }}</span>
                                                    <span
                                                        style="color: black;font-size:15px;float:right">{{ $comment->created_at->diffForHumans() }}</span>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach


            </div>
        </div>
        <script>
            // Fungsi untuk menyalin link ke clipboard
            function copyToClipboard() {
                // Mengambil elemen input atau textarea dengan value berisi link yang ingin disalin
                const linkInput = document.createElement('input');
                const linkText = window.location.href;

                // Menambahkan link ke elemen input
                linkInput.value = linkText;

                // Menambahkan elemen input ke body
                document.body.appendChild(linkInput);

                // Memilih dan menyalin teks di dalam elemen input
                linkInput.select();
                document.execCommand('copy');

                // Menghapus elemen input setelah disalin
                document.body.removeChild(linkInput);

                // Pemberitahuan bahwa link berhasil disalin (opsional)
                alert('Link has been copied to clipboard: ' + linkText);
            }

            // Menambahkan event listener pada tombol
            const shareButton = document.getElementById('shareButton');
            shareButton.addEventListener('click', copyToClipboard);
        </script>
</body>

<style type="text/css">
    .show_image img {
        width: 100%;
        height: 280px;
        margin-top: 10px;
    }

    .show_image2 img {
        width: 258px;
        height: 280px;
        border-radius: 20px;
        position: relative;
        left: 33%;
    }

    .modal-fade {
        width: 100px;
    }

    .desc-post {
        padding: 14px;
        margin-bottom: 22px;
        color: white;
    }

    .modal-content {
        background-color: #27292a;
        border-radius: 30px;
    }

    .komen-body {
        background-color: hotpink;
        padding: 15px;
        border-radius: 6px;
        margin: 10px 0;
    }

    .komen-body p {
        margin-bottom: 10px;
        border-bottom: 1px solid white;
    }
</style>



</html>
