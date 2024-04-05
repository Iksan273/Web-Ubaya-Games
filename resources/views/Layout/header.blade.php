<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="./index.html">
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
                        <a class="nav-link" href="{{ url('peraturan') }}">Peraturan</a>
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
                                    <a class="dropdown-item nav-link" href="{{ route('badminton.form') }}">BADMINTON</a>
                                </li>
                                <li class="nav-item">
                                    <a class="dropdown-item nav-link" href="{{ route('dance.form') }}">DANCE</a>
                                </li>
                                <li class="nav-item">
                                    <a class="dropdown-item nav-link" href="{{ route('esport.form') }}">SENI</a>
                                </li>
                                <li class="nav-item">
                                    <a class="dropdown-item nav-link" href="{{ route('seni.form') }}">SENI</a>
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
