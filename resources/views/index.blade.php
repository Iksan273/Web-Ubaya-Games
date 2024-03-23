@extends('layout.user')

@section('title')
    Home
@endsection


@section('content')
    <div class="banner-section-outer">
        <header>
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <figure class="mb-0"><img src="{{ asset('assets/images/logoUGMINI.png') }}" alt="">
                        </figure>
                    </a>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/peraturan') }}">Peraturan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">Score</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle dropdown-color navbar-text-color" href="#"
                                    id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"> Pendaftaran </a>
                                <div class="dropdown-menu drop-down-content">
                                    <ul class="list-unstyled drop-down-pages">
                                        <li class="nav-item">
                                            <a class="dropdown-item nav-link" href="{{ route('basket.form') }}">BASKET</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="dropdown-item nav-link" href="{{ route('voli.form') }}">VOLI</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="dropdown-item nav-link" href="{{ route('futsal.form') }}">FUTSAL</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="dropdown-item nav-link"
                                                href="{{ route('badminton.form') }}">BADMINTON</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="dropdown-item nav-link" href="{{ route('dance.form') }}">DANCE</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="dropdown-item nav-link" href="{{ route('esport.form') }}">ESPORT</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="dropdown-item nav-link" href="{{ url('/status-pendaftaran') }}">Status Pendaftaran</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!-- BANNER SECTION -->
        <section class="banner-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-md-left text-center">
                        <div class="banner-section-content">
                            <h1 data-aos="fade-up">UBAYA GAMES
                                <span>2024</span>
                            </h1>


                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="banner-section-image">
                            <figure class="mb-0">
                                <img src="{{ asset('assets/images/logoUG.png') }}" alt="" data-aos="fade-up">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- TRADING AUCTION SECTION -->
    <section class="trading_auctions-section">
        <div class="container">
            <div class="carts_outer float-left w-100">
                <div class="carts">
                    <ul class="list-unstyled">
                        <li class="first">
                            <figure class="mb-0 d-inline-block"><img src="./assets/images/cart.png" alt="">
                            </figure>
                            <div class="carts_wrapper">
                                <span class="rating counter">6</span>

                                <span class="profession">Cabang</span>
                            </div>
                        </li>
                        <li class="second">
                            <figure class="mb-0 d-inline-block"><img src="./assets/images/artworks.png" alt="">
                            </figure>
                            <div class="carts_wrapper">

                                <span class="plus_sign">Event By</span>
                                <span class="profession">Bem Ubaya</span>
                            </div>
                        </li>
                        <li class="third">
                            <figure class="mb-0 d-inline-block"><img src="./assets/images/artist.png" alt="">
                            </figure>
                            <div class="carts_wrapper">
                                <span class="rating counter">9</span>

                                <span class="profession">Fakultas dan Politeknik</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="trading_auctions-content">
                        <h2 data-aos="fade-down">Apa itu <span>Ubaya Games ?</span></h2>
                        <p data-aos="fade-right" class="text-justify">Ubaya Games merupakan acara setiap 2 tahun yang
                            diadakan oleh BEM-UBAYA yang mempertemukan talenta-talenta dari berbagai Fakultas dan Politeknik
                            di Universitas Surabaya.

                            Ubaya Games kali ini mempertemukan bibit-bibit unggul dalam cabang olahraga dan seni berupa
                            basket, futsal, voli, badminton, e-sport, dan dance.

                            Dengan mengedepankan semangat kompetisi dan kekeluargaan, Ubaya Games siap menjadi wadah bagi
                            Mahasiswa Universitas Surabaya. Jangan kelewatan acara bergengsi yang dibuat oleh, dari, dan
                            untuk Mahasiswa Universitas Surabaya <span>See you Olympians! </span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CREATE_SELL NFT SECTION -->
    <section class="create-sell_nft_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="create_sell-content">
                        <h2 data-aos="fade-down"> Cabang Lomba <span> Ubaya Games </span></h2>
                    </div>
                </div>
            </div>
            <div class="row mb-3 mt-3">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="create-sell_box_content" data-aos="fade-left">

                        <span class="material-symbols-outlined">
                            sports_basketball
                        </span>

                        <h3>Basket</h3>
                        <p class="sub_p">Lorem ipsum dolor sit amet consecte tur adipiscing elit sed do eiusmod tempor
                            incididunt utlabo.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="create-sell_box_content" data-aos="fade-down">
                        <span class="material-symbols-outlined">
                            sports_esports
                        </span>
                        <h3>Esport</h3>
                        <p class="sub_p">Lorem ipsum dolor sit amet consecte tur adipiscing elit sed do eiusmod tempor
                            incididunt utlabo.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="create-sell_box_content" data-aos="fade-right">
                        <span class="material-symbols-outlined">
                            sports_soccer
                        </span>
                        <h3>Futsal</h3>
                        <p class="sub_p">Lorem ipsum dolor sit amet consecte tur adipiscing elit sed do eiusmod tempor
                            incididunt utlabo.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="create-sell_box_content" data-aos="fade-left">

                        <span class="material-symbols-outlined">
                            sports_tennis
                        </span>

                        <h3>Badminton</h3>
                        <p class="sub_p">Lorem ipsum dolor sit amet consecte tur adipiscing elit sed do eiusmod tempor
                            incididunt utlabo.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="create-sell_box_content" data-aos="fade-down">
                        <span class="material-symbols-outlined">
                            music_note
                        </span>
                        <h3>Dance</h3>
                        <p class="sub_p">Lorem ipsum dolor sit amet consecte tur adipiscing elit sed do eiusmod tempor
                            incididunt utlabo.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="create-sell_box_content" data-aos="fade-right">
                        <span class="material-symbols-outlined">
                            sports_volleyball
                        </span>
                        <h3>Voli</h3>
                        <p class="sub_p">Lorem ipsum dolor sit amet consecte tur adipiscing elit sed do eiusmod tempor
                            incididunt utlabo.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- MARKET PLACE SECTION -->
    <section class="market-place_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="market_place-content">
                        <h2 data-aos="fade-down"><span>Timeline</span> Ubaya Games</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container py-5">
                    <div class="main-timeline">
                        <div class="timeline left">
                            <div class="card background2">
                                <div class="card-body p-4">
                                    <h3>25 Maret 2024</h3>
                                    <p class="mb-0">Open Registration</p>
                                </div>
                            </div>
                        </div>
                        <div class="timeline right">
                            <div class="card background1">
                                <div class="card-body p-4">
                                    <h3>26 April 2024</h3>
                                    <p class="mb-0">Technical Meeting</p>
                                </div>
                            </div>
                        </div>
                        <div class="timeline left">
                            <div class="card background2">
                                <div class="card-body p-4">
                                    <h3>4 Mei 2024</h3>
                                    <p class="mb-0">Opening Ubaya Games 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="timeline right">
                            <div class="card background1">
                                <div class="card-body p-4">
                                    <h3>4 Mei-2 Juni 2024</h3>
                                    <p class="mb-0">Ubaya Games Day</p>
                                </div>
                            </div>
                        </div>
                        <div class="timeline left">
                            <div class="card background2">
                                <div class="card-body p-4">
                                    <h3>2 Juni 2024</h3>
                                    <p class="mb-0"> Closing Ubaya Games 2024</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- PARTNERS SECTION -->
    <section class="partners_section">
        <div class="container">
            <div class="row mb-4">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="partners-content">
                        <h2>Ubaya Games <span>FAQ</span></h2>
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Cabang apa saja yang akan dilombakan?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Untuk Ubaya Games tahun ini akan dilombakan olahraga dan seni berupa basket, voli,
                                badminton, futsal, e-sport, dan dance.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Cara daftarnya bagaimana?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Cara daftarnya bisa menghubungi ketua kontingen tiap fakultas yaa
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Acaranya mulai kapan?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Grand Opening Ubaya Games akan diadakan pada 4 Mei 2024 dan Closingnya akan diadakan pada 2
                                Juni 2024 dengan mendatangkan performances dan DJ untuk memeriahkan penerimaan hadiah
                                pemenang
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

    </section>

    @include('layout.footer')

@endsection
