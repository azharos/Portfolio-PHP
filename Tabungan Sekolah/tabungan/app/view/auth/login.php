<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css ">

    <title>Tabungan Sekolah</title>
    <style>
        .ml-auto {
            margin-left: auto;
        }

        .my-row {
            width: 100%;
        }

        .d-flex {
            flex-direction: column;
        }
    </style>
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow rounded">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url ?>auth">Tabungan Sekolah</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-link" href="<?= base_url ?>auth/login"><i class="fas fa-sign-in-alt"></i>&nbsp;LOGIN</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="my-row mt-3 mb-3 d-flex justify-content-center align-items-center" style="height: 55vh;">
        <form action="" method="post" autocomplete="off">
            <div class="card">
                <h5 class="card-header">Login</h5>
                <div class="card-body">
                    <?= Session::flash(); ?>
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" placeholder="Username" name="user">
                    </div>
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" placeholder="Password" name="pass">
                    </div>
                    <button type="submit" name="login" class="btn btn-sm btn-primary">Login</button>
                </div>
            </div>
        </form>
    </div>

    <div class="my-row p-5 bg-dark">
        <div class="col-12 text-center">
            <a href="https://www.linkedin.com/in/azhar-ozhi-saputra-95b6521a5/" class="text-light me-2"><i class="fab fa-linkedin fa-2x"></i></a>
            <a href="https://wa.me/6285641532396" class="text-light me-2"><i class="fab fa-whatsapp fa-2x"></i></a>
            <a href="https://github.com/azharos" class="text-light me-2"><i class="fab fa-github fa-2x"></i></a>
            <a href="https://web.facebook.com/ozhi.saputra.16" class="me-2 text-light"><i class="fab fa-facebook fa-2x"></i></a>
            <a href="https://www.youtube.com/channel/UCZVK-ANlL8ANh-TqSmjIypg" class="text-light"><i class="fab fa-2x fa-youtube"></i></a>

            <h5 class="text-light mt-5">Copyright &copy; Azhar Ozhi Saputra</h5>
        </div>
    </div>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
</body>

</html>