<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?= base_url('assets/material/css/materialize.min.css') ?>" media=" screen,projection" />

    <!-- My CSS -->
    <style>
        .slider h3,
        .slider h5 {
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        .parallax-container {
            height: 30%;
        }

        .white-text {
            text-shadow: 1px 1px 10px rgba(0, 0, 0, 0.8);
        }

        .parallax img {
            opacity: 0.5 !important;
            /*!important berfungsi untuk jika ada class yg sama maka yg ditampilkan tanda !important */
            filter: grayscale(1);
        }

        section {
            padding: 20px 0;
        }

        .service {
            min-height: 500px;
        }

        .black {
            padding: 5px;
        }
    </style>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SHOP</title>
</head>

<body id="home" class="scrollspy">
    <!-- navbar -->

    <div class="navbar-fixed">
        <nav class="indigo">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="#home" class="brand-logo">SHOP</a>
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="#about">About</a></li>
                        <li><a href="#client">Client</a></li>
                        <li><a href="#service">Service</a></li>
                        <li><a href="#contact">Contact US</a></li>
                        <li><a href="<?= base_url("login") ?>">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- side nav -->
    <ul class="sidenav" id="mobile-demo">
        <li><a href=" ">About</a></li>
        <li><a href=" ">Client</a></li>
        <li><a href=" ">Service</a></li>
        <li><a href=" ">Portfolio</a></li>
        <li><a href=" ">Contact US</a></li>
    </ul>

    <!-- akhir navbar -->

    <!-- slider -->
    <div class="slider">
        <ul class="slides">
            <li>
                <img src="<?= base_url('assets/material/satu.jpeg') ?>" alt="">
                <div class="caption left-align">
                    <h3>Gambar 1</h3>
                    <h5 class="light white-text">Harga Minimal Kualitas Maksimal</h5>
                </div>
            </li>
            <li>
                <img src="<?= base_url('assets/material/dua.jpeg') ?>" alt="">
                <div class="caption center-align">
                    <h3>Gambar 2</h3>
                    <h5 class="light white-text">Hanya Disini Diskon Banyak</h5>
                </div>
            </li>
            <li>
                <img src="<?= base_url('assets/material/tiga.jpeg') ?>" alt="">
                <div class="caption right-align">
                    <h3>Gambar 3</h3>
                    <h5 class="light white-text">Anda Senang Kami Senang</h5>
                </div>
            </li>
        </ul>
    </div>
    <!-- akhir slider -->


    <section class="about scrollspy" id="about">
        <div class="container">
            <div class="row">
                <h3 class="center">About</h3>
                <hr width="200px">
                <div class="col m6">
                    <h5>VISI</h5>
                    <p class="light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque similique consequatur debitis ut ex aliquid placeat iusto accusantium sequi reiciendis voluptate fuga odit quam, repellendus dolorum praesentium reprehenderit, ipsum ducimus.</p>
                </div>
                <div class="col m6 light">
                    <h5>MISI</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut reprehenderit corporis numquam ullam inventore voluptates quam soluta, perferendis recusandae blanditiis provident? Veritatis consequatur consectetur, totam laboriosam laborum maiores, quo neque?</p>
                </div>
            </div>
        </div>
    </section>

    <!-- clients -->
    <section class="client scrollspy" id="client">
        <div class="parallax-container">
            <div class="parallax"><img src="<?= base_url('assets/material/empat.jpeg') ?>" alt=""></div>

            <div class="container">
                <h3 class="center white-text">Our Clients</h3>

                <div class="row">
                    <div class="col m4 s12 left">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum, totam.</p>
                    </div>
                    <div class="col m4 s12 left">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum, totam.</p>
                    </div>
                    <div class="col m4 s12 left">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum, totam.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- akhir clients -->

    <!--service -->
    <section class="service scrollspy" id="service">
        <div class="container">
            <div class="row">
                <h3 class="light center">Our Service</h3>
            </div>

            <div class="row">
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-panel center">
                            <i class="medium material-icons">insert_chart</i>
                            <h5 class="light">MURAH MERIAH</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, magnam!</p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-panel center">
                            <i class="medium material-icons">insert_chart</i>
                            <h5 class="light">Harga Minimal</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, magnam!</p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-panel center">
                            <i class="medium material-icons">insert_chart</i>
                            <h5 class="light">Online 24 Jam</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, magnam!</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- akhir serice -->

    <!-- contact US -->
    <section class="contact scrollspy" id="contact">
        <div class="container">
            <h3 class="center light">Contact US</h3>
            <div class="row">
                <div class="col m5">
                    <div class="card">
                        <div class="card-panel center blue center">
                            <h5>Contact</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, cupiditate?</p>
                        </div>
                    </div>
                    <ul class="collection with-header">
                        <li class="collection-header">
                            <h4>Our Office</h4>
                        </li>
                        <li class="collection-header">Jl. Sidoasih XI/22</li>
                        <li class="collection-header">CV. KANG KONTER</li>
                    </ul>
                </div>

                <div class="col m7 s12">
                    <form action="">
                        <div class="card-panel">
                            <h5>Tolong diisi</h5>
                            <br>
                            <div class="input-field">
                                <input type="text" name="nama" id="nama" required>
                                <label for="nama">Nama</label>
                            </div>
                            <div class="input-field">
                                <input type="email" name="email" id="email" class="validate" required>
                                <label for="email">Email</label>
                            </div>
                            <div class="input-field">
                                <input type="text" name="No.HP" id="No.HP">
                                <label for="No.HP">No.HP</label>
                            </div>
                            <div class="input-field">
                                <textarea name="pesan" id="pesan" class="materialize-textarea"></textarea>
                                <label for="pesan">Pesan</label>
                            </div>
                            <button type="submit" class="btn blue">Send</button>
                            <button type="reset" class="btn blue">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- akhir contact -->

    <!-- footer -->
    <footer class="black">
        <p class="flow-text white-text center">Copyright &copy; Azhar Ozhi Saputra</p>
    </footer>
    <!-- akhir footer -->

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="<?= base_url("assets/material/js/materialize.min.js") ?>"></script>
    <script>
        var sideNav = document.querySelectorAll('.sidenav');
        M.Sidenav.init(sideNav);

        var slider = document.querySelectorAll('.slider');
        M.Slider.init(slider, {
            indicators: false,
            interval: 2000,
            height: 500
        });

        var paralax = document.querySelectorAll('.parallax');
        M.Parallax.init(paralax);

        var boxed = document.querySelectorAll('.materialboxed');
        M.Materialbox.init(boxed, {
            inDuration: 1000,
            outDuration: 1000
        });

        var scroll = document.querySelectorAll('.scrollspy');
        M.ScrollSpy.init(scroll, {
            scrollOffset: 80
        });
    </script>
</body>

</html>