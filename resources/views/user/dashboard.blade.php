<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Artikel CTA</title>

    <link rel="stylesheet" type="text/css" href="css/vendor.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://demo.templatesjungle.com/deliver/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- script ================================================== -->
    <script src="https://demo.templatesjungle.com/deliver/js/modernizr.js"></script>

</head>

<body data-bs-spy="scroll" data-bs-target="#navbar-example2" tabindex="0">


    <!-- Navigation Section Starts -->

    <section id="navigation-bar" class="navigation position-fixed">

        <nav id="navbar-example2" class="navbar navbar-expand-lg ">

            <div class="navigation container-fluid d-flex flex-wrap align-items-center my-2 pe-4 ps-5 ">

                <div class="col-md-3 brand-logo">
                    <a href="#" class="d-inline-flex link-body-emphasis text-decoration-none">
                        <h2>Artikel CTa</h2>
                    </a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2"
                    aria-label="Toggle navigation"><ion-icon name="menu-outline"></ion-icon></button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar2"
                    aria-labelledby="offcanvasNavbar2Label">

                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbar2Label">Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>

                    <div class="offcanvas-body">
                        <ul class="nav col-12 col-md-auto justify-content-center align-items-center mb-md-0">
                            <li class="nav-list mx-3">
                                <a href="#resources" class="nav-link px-2">
                                    <h5> Home </h5>
                                </a>
                            </li>
                            <li class="nav-list mx-3">
                                <a href="#company" class="nav-link px-2">
                                    <h5> Macam-Macam Artikel </h5>
                                </a>
                            </li>
                        </ul>
                        <div class="col-md-5 account d-flex justify-content-end align-items-center">
                            <div class="col-md-6">
                                <a href="{{ route('artikel.index') }}" class="btn btn-xs btn-info pull-right">Login
                                    Admin</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>

        </nav>

    </section>

    <!-- Articles Section Starts -->

    <section id="articles">
        <div id="company" class="container py-5 my-5">
            <h1 class="text-center  my-5">Articles Update</h1>
            <div class="row g-4 py-5">
                @foreach ($artikel as $data)
                    <div class="feature col-md-4">
                        <div class="artical-post">
                            <div class="feature-icon d-inline-flex align-items-center justify-content-center ">
                                <img src="{{ asset('thumbnail/' . $data->thumbnail) }}" alt=""
                                    class="img-fluid">
                            </div>
                            <div class="artical-content py-5 px-5 ">
                                <h3>{{ $data->judul }}</h3>
                                <p>{!! $data->isi !!}</p>
                                <a href="#" class="icon-link">More info </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center">
                <button type="button" class="btn btn-primary first-button my-5">More Articles</button>
            </div>

        </div>
    </section>



    <!-- Footer Section Starts -->

    <section class="footer-2">
        <footer class="container footer-2-container  d-flex align-items-center">
            <div class="col-md-4">
                <p class="footer2-paragraph">© 2023 Artikel CTA. All rights reserved.</p>
            </div>

            <div class="col-md-4 text-center">
                <a href="https://templatesjungle.com/" class="text-decoration-none">
                    <iconify-icon class="footer-2-icon px-2" icon="ri:facebook-fill"></iconify-icon>
                </a>
                <a href="https://templatesjungle.com/" class="text-decoration-none">
                    <iconify-icon class="footer-2-icon px-2" icon="ri:twitter-fill"></iconify-icon>
                </a>
                <a href="https://templatesjungle.com/" class="text-decoration-none">
                    <iconify-icon class="footer-2-icon px-2" icon="ri:instagram-fill"></iconify-icon>
                </a>
            </div>

            <div class="col-md-4">
                <p class="footer2-paragraph d-flex justify-content-end">Dibuat Dengan Penuh Cinta :<a
                        href="https://templatesjungle.com/" class="nav-link footer-1-link templatesjungle"
                        target="_blank"> <u> CTA </u> </a></p>
            </div>
        </footer>
    </section>


    <!-- Scripts  Starts -->


    <script src="https://demo.templatesjungle.com/deliver/js/jquery-1.11.0.min.js"></script>
    <script src="https://demo.templatesjungle.com/deliver/js/plugins.js"></script>
    <script src="https://demo.templatesjungle.com/deliver/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>
</body>

</html>
