<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Produtos</title>


    <link href="/libs/bootstrap.min.css" rel="stylesheet">

    <script src="/libs/bootstrap.bundle.min.js">
    </script>
    <script type="text/javascript" src=
"https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>

    <script src="/js/components/toast.js"></script>
    <script src="/js/controll.js"></script>
    <script src="/js/cart.js"></script>
    <script src="/js/payment.js"></script>
    <script src="/libs/fontawesome.js"></script>
    <link rel="stylesheet" href="/css/fonts.css">
    <link rel="stylesheet" href="/css/buttons.css">
    <link rel="stylesheet" href="/css/appStyle.css">
</head>

<body id="dashbackground" style="height: 100%;">
    <div class="">
        <nav class="navbar mainBar navbar-expand-lg blur">
            <div class="container-fluid">
                <img id="logo" src="../img/logo.png">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="window.location = '/dashboard'">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">Produtos</a>
                        </li>
                    </ul>
                    <ul class="d-flex">
                        <div class="userOptions">
                            <div class="profilePhoto" onclick="toggleUserOptions()">
                                <img src="../img/userIcon.png">
                            </div>
                            <div class="menu">
                                <h3>Nome</h3>
                                <ul>
                                    <li><a href="#" onclick="window.location = 'profile';">Meu perfil</a></li>
                                    <li><a href="#" onclick="window.location = '/auth/logout';">Sair</a></li>
                                </ul>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="menu-products">
            <div class="title m-5">
                Procure pela melhor opção para você
            </div>
            <div class="search">
                <input type="search" class="form-control" placeholder="Procurar">
                <button class="s-blue px-4">Ir</button>
            </div>
            <div class="filters d-flex flex-row mb-5" id="filters">
                <div class="form-check m-2 root">
                    <input class="form-check-input" type="checkbox" value="0" id="flexCheckDefault" onchange="checkFilters(this)" checked>
                    <label class="form-check-label" for="flexCheckDefault">
                    Todos
                    </label>
                </div>
                <div class="form-check m-2">
                    <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" onchange="checkFilters(this)">
                    <label class="form-check-label" for="flexCheckDefault">
                    Vestidos
                    </label>
                </div>
                <div class="form-check m-2">
                    <input class="form-check-input" type="checkbox" value="2" id="flexCheck" onchange="checkFilters(this)">
                    <label class="form-check-label" for="flexCheck">
                    Calçados
                    </label>
                </div>
            </div>

            @include('components.cart')           
        </div>
    </div>

    <div id="products" class="mt-5 overflow-hidden">
        @foreach($products as $product)
            <div class="card product mx-2" id="product">
                <div class="card-header">
                    {{ $product->name }}
                </div>
                <div class="card-body">
                    <div id="product{{ preg_replace('/\s+/', '', $product->name) }}" class="carousel slide"
                        data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="spinner spinner-grow text-dark mx-auto my-auto" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="carousel-item active">
                                <img src="{{ $product->first_photo_url }}" class="imgSlider d-block w-100"
                                    alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button"
                            data-bs-target="#product{{ preg_replace('/\s+/', '', $product->name) }}"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button"
                            data-bs-target="#product{{ preg_replace('/\s+/', '', $product->name) }}"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
                <div class="card-footer">
                    <div>
                        <label>
                            {{ number_format($product->price, 2) }}
                        </label>
                    </div>
                    <div class="d-flex justify-content-end">
                            <div class="">
                                <button onclick="configPaymentForm('{{ csrf_token() }}', {{ $product->id }}, '{{ $product->name }}', {{ $product->price }})" class="transparent", data-bs-toggle="modal" data-bs-target="#paymentModal">
                                    <i class="far fa-credit-card text-light"></i>
                                </button>
                            </div>
                            <div>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#amountProductModal" class="transparent" onclick="setProduct({{ $product->id }}, '{{ $product->name }}', {{ $product->price }})">
                                    <i class="fas fa-cart-plus text-light"></i>
                                </button>
                            </div>
                    </div>
                </div>
            </div>

        @endforeach
        <div class="listControllers">
            <button onclick="slide('left')" class="btn-lg scrollController rounded-circle left"><i class="fas fa-arrow-left"></i></button>
            <button onclick="slide('right')" class="btn-lg scrollController rounded-circle right"><i class="fas fa-arrow-right"></i></button>
        </div>

    </div>

    @include('components.amountToCart')
    @include('components.paymentModal')

    <footer class="text-light">
        <button class="btn-lg scrollController rounded-circle goTop" onclick="window.scrollTo(0,0);"><i class="fas fa-arrow-up"></i></button>
        <div class="content d-flex flex-row mt-5">
            <ul class="content-col">
                <li>Home</li>
                <li>Produtos</li>
                <li>Me registrar</li>
                <li>Promoçoes da semana</li>
                <li>Meus pedidos</li>
                <li>Central de ajuda</li>
                <li>Sobre</li>
            </ul>
            <ul class="content-col">
                <li>Chat da comunidade</li>
                <li>Fale Conosco</li>
            </ul>
            <div class="additional-info ms-auto mt-auto d-flex flex-row">
                <div class="contacts text-light d-flex flex-column justify-content-center">
                    <p>(00) 90000-0000</p>
                    <p>aline@gmail.com</p>
                </div>
                <div>
                    <div class="personal-media">
                        <a><i class="fab fa-discord" style="font-size:30px; color:#899ad5;"></i></a>
                        <a><i class="fab fa-whatsapp-square" style="font-size:30px; color:#48c857;"></i></a>
                        <a><i class="fab fa-telegram" style="font-size:30px; color:#37aee2;"></i></a>
                    </div>
                    <div class="ilustration">
                        <img src="/img/footerIcon1.png">
                    </div>
                </div>
            </div>
        </div>
        <div class="end">
            <div class="options">
                <ul class="d-flex flex-row">
                    <li>Acessibilidade</li>
                    <li>Termos de uso</li>
                    <li>Privacidade</li>
                </ul>
                <div>

                </div>
            </div>
            <div class="author beauty-font">
                Joabe Wick, 2021 
            </div>
        </div>
    </footer>
</body>

</html>
