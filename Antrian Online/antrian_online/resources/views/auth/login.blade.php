<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css ">
    <title>Antrian Online</title>
    <style>
        .my-row {
            width: 100%;
        }

        .d-flex {
            flex-direction: column;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Antrian Online</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="{{ url('/login') }}"><i class="fas fa-sign-in-alt"></i>&nbsp;LOGIN</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="my-row mt-3 mb-3 d-flex justify-content-center align-items-center" style="height: 55vh;">
        <form action="{{ url('/login') }}" method="post" autocomplete="off">
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    @if (session('sukses'))
                    <div class="alert alert-success">
                        {{ session('sukses') }}
                    </div>
                    @endif
                    @if (session('gagal'))
                    <div class="alert alert-danger">
                        {{ session('gagal') }}
                    </div>
                    @endif
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                        <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
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

            <h5 class="text-light mt-5 user-select-none">Copyright &copy; Azhar Ozhi Saputra</h5>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>