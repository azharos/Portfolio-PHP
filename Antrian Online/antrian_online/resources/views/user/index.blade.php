@extends('layout/main')

@section('title','Dashboard')

@section('content')
    <div class="row">
        <div class="col">
            {{-- <div class="jumbotron bg-primary text-white">
                <p class="lead">Selamat Datang {{ session('nama') }} di</p>
                <h1 class="display-4">Aplikasi Antrian Online</h1>
                <hr class="my-4 bg-white">
                <p>Aplikasi Antrian Online Berbasis Website</p>
            </div> --}}
            <div class="alert alert-info" role="alert">
                Selamat Datang {{ session('nama') }} di Aplikasi Online Berbasis Website
            </div>
        </div>
    </div>

    {{-- <div class="row no-gutters bg-white shadow position-relative">
        <div class="col-md-6 mb-md-0 p-md-4">
            <img src="..." class="w-100" alt="...">
        </div>
        <div class="col-md-6 position-static p-4 pl-md-0">
            <h5 class="mt-0">Columns with stretched link</h5>
            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
            <a href="#" class="stretched-link">Go somewhere</a>
        </div>
    </div> --}}

    <div class="card">
        <div class="card-header p-0">
            <ul class="nav nav-tabs mb-2 pl-3 pt-3 pr-3" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Information</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                </li>
            </ul>
            <div class="tab-content pl-3 mb-3" id="myTabContent">
                <div class="tab-pane fade show active text-dark" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h5 class="card-title" style="font-weight: bold">Informasi Tentang Antrian Online</h5>
                    <ul class="pl-3">
                        <li class="mt-2">Buka Setiap Hari Senin - Jumat Pukul 0{{ session('jambuka') }}.00-{{ session('jamTutup') }}.00</li>
                        <li class="mt-2">Pada Hari Besar Idul Fitri, Antrian Online Tutup</li>
                    </ul>
                </div>
                <div class="tab-pane fade text-dark" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <h5 class="card-title" style="font-weight: bold">Hubungi Kami :</h5>
                    <ol type="1">
                        <li class="mt-2">Instagram : @kangkonter</li>
                        <li class="mt-2">WhatsApp : 085641532396</li>
                        <li class="mt-2">Facebook : Azhar Ozhi Saputra</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


@endsection