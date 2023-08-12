<?php
require 'coneksi.php';


$id = $_GET['id'];
$datas = mysqli_query($conn, "SELECT * FROM wisata WHERE id = '$id'");
$result = mysqli_fetch_assoc($datas);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta name="description" content="A well made and handcrafted Bootstrap 5 template">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon.png">
    <meta name="generator" content="Eleventy v2.0.0">
    <meta name="HandheldFriendly" content="true">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="css/theme.min.css">

    <style>
        /* inter-300 - latin */
        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 300;
            font-display: swap;
            src: local(''),
                url('fonts/inter-v12-latin-300.woff2') format('woff2'),
                /* Chrome 26+, Opera 23+, Firefox 39+ */
                url('fonts/inter-v12-latin-300.woff') format('woff');
            /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
        }

        /* inter-400 - latin */
        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: local(''),
                url('fonts/inter-v12-latin-regular.woff2') format('woff2'),
                /* Chrome 26+, Opera 23+, Firefox 39+ */
                url('fonts/inter-v12-latin-regular.woff') format('woff');
            /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: local(''),
                url('fonts/inter-v12-latin-500.woff2') format('woff2'),
                /* Chrome 26+, Opera 23+, Firefox 39+ */
                url('fonts/inter-v12-latin-500.woff') format('woff');
            /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: local(''),
                url('fonts/inter-v12-latin-700.woff2') format('woff2'),
                /* Chrome 26+, Opera 23+, Firefox 39+ */
                url('fonts/inter-v12-latin-700.woff') format('woff');
            /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
        }
    </style>


</head>

<body>

    <body class="bg-black text-white mt-0" data-bs-spy="scroll" data-bs-target="#navScroll">

        <nav id="navScroll" class="navbar navbar-dark bg-black fixed-top px-vw-5" tabindex="0">
            <div class="container">
                <a class="navbar-brand pe-md-4 fs-4 col-12 col-md-auto text-center" href="index.html">
                    <span class="ms-md-1 mt-1 fw-bolder me-md-5">NEUTURAL</span>
                </a>

                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 list-group list-group-horizontal">
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="index.php" aria-label="Homepage">
                            Home
                        </a>
                    </li>

                </ul>
                <?php if (isset($_SESSION['login'])) : ?>
                    <a href="logout.php" aria-label="Download this template" class="btn btn-outline-light"><?= $_SESSION['login']; ?></a>
                <?php else :  ?>
                    <a href="login.php" aria-label="Download this template" class="btn btn-outline-light">Login</a>
                <?php endif;  ?>
                </a>
            </div>
        </nav>
        <main class="mt-10">

            <div class="mb-4 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 24em;">
                <div class="absolute left-0 bottom-0 w-full h-full z-10" style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
                <img src="https://images.unsplash.com/photo-1493770348161-369560ae357d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2100&q=80" class="absolute left-0 top-0 w-full h-full z-0 object-cover" />
                <div class="p-4 absolute bottom-0 left-0 z-20">
                    <a href="#" class="px-4 py-1 bg-black text-gray-200 inline-flex items-center justify-center mb-2"><?= $result['category'] ?></a>
                    <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
                        <?= $result['name'] ?>
                    </h2>
                </div>
            </div>

            <div class="px-4 lg:px-0 mt-12 text-gray-100 max-w-screen-md mx-auto text-lg leading-relaxed">

                <p class="pb-6"><?= $result['body'] ?></p>

            </div>
        </main>
        <footer class="bg-black border-top border-dark">
            <div class="container py-vh-4 text-secondary fw-lighter">
                <div class="row">
                    <div class="col-12 col-lg-5 py-4 text-center text-lg-start">
                        <a class="navbar-brand pe-md-4 fs-4 col-12 col-md-auto text-center" href="index.html">
                            <span class="ms-md-1 mt-1 fw-bolder me-md-5">NEUTURAL</span>
                        </a>

                    </div>
                    <div class="col border-end border-dark">
                        <span class="h6">Company</span>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#" class="link-fancy link-fancy-light">About us</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="link-fancy link-fancy-light">Legal</a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="link-fancy link-fancy-light">Career</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="link-fancy link-fancy-light">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col border-end border-dark">
                        <span class="h6">Services</span>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#" class="link-fancy link-fancy-light">Pricing</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="link-fancy link-fancy-light">Products</a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="link-fancy link-fancy-light">Customers</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="link-fancy link-fancy-light">Portfolio</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="link-fancy link-fancy-light">Success Stories</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="link-fancy link-fancy-light">More</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col">
                        <span class="h6">Support</span>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#" class="link-fancy link-fancy-light">About us</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="link-fancy link-fancy-light">Legal</a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="link-fancy link-fancy-light">Career</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="link-fancy link-fancy-light">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/aos.js"></script>
        <script>
            AOS.init({
                duration: 800,
            });
        </script>
        <script>
            let scrollpos = window.scrollY;
            const header = document.querySelector(".navbar");
            const header_height = header.offsetHeight;

            const add_class_on_scroll = () => header.classList.add("scrolled", "shadow-sm");
            const remove_class_on_scroll = () => header.classList.remove("scrolled", "shadow-sm");

            window.addEventListener('scroll', function() {
                scrollpos = window.scrollY;

                if (scrollpos >= header_height) {
                    add_class_on_scroll();
                } else {
                    remove_class_on_scroll();
                }

                console.log(scrollpos);
            })
        </script>
    </body>

</html>