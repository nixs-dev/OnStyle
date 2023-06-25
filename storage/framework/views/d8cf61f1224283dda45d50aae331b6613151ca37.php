<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Página principal</title>


    <link href="/libs/bootstrap.min.css" rel="stylesheet">

    <script src="/libs/bootstrap.bundle.min.js">
    </script>

    <script src="/libs/fontawesome.js"></script>
    <link rel="stylesheet" href="/css/fonts.css">
    <link rel="stylesheet" href="/css/buttons.css">
    <link rel="stylesheet" href="/css/appStyle.css">
</head>

<body id="dashbackground" style="height: 100%;">
    <nav class="navbar mainBar sticky-top navbar-expand-lg blur" id="mainBar">
        <div class="container-fluid">
            <img id="logo" src="../img/logo.png">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="window.location = '/products'">Produtos</a>
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
    <div class="adsDiv mx-auto">
        <div id="ad" class="carousel carousel-dark slide carousel-fade me-auto ms-auto" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#ad" data-bs-slide-to="0" class="active" aria-current="true"></button>
                <button type="button" data-bs-target="#ad" data-bs-slide-to="1"></button>
            </div>
            <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="1500">
                        <img src="../img/offer.png" class="d-block w-100" alt="..." style="width: 300px; height: 400px;">
                    </div>
                    <div class="carousel-item" data-bs-interval="1500">
                        <img src="../img/offer2.jpg" class="d-block w-100" alt="..." style="width: 300px; height: 400px;">
                    </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#ad" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#ad" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="d-flex extra-info flex-row justify-content-center">
        <div class="d-flex item flex-column">
            <img src="../img/item-extra1.jpg">

            <div style="margin-top: 5px; height: 100px">
                Venha conhecer nossos novos calçados
                que acabaram de chegar!
            </div>

            <div class="my-3 align-self-center">
                <button class="darkButton">Ver mais</button>
            </div>
        </div>
        <div class="d-flex item flex-column">
            <img src="../img/item-extra2.jpg">

            <div style="margin-top: 5px; height: 100px">
                Colares e outras jóias de alta qualidade
            </div>

            <div class="my-3 align-self-center">
                <button class="darkButton">Ver mais</button>
            </div>
        </div>
        <div class="d-flex item flex-column">
            <img src="../img/item-extra3.jpg">

            <div style="margin-top: 5px; height: 100px">
                Roupas de diversos tecidos e estilos
            </div>

            <div class="my-3 align-self-center">
                <button class="darkButton">Ver mais</button>
            </div>
        </div>
    </div>

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
                    <p>adm@gmail.com</p>
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

<script>
    function toggleUserOptions() {
        var options = document.querySelector('.menu');
        options.classList.toggle('active');
    }
</script>
</body>

</html>
<?php /**PATH C:\Users\joabe\Desktop\OnStyle\resources\views/dashboard.blade.php ENDPATH**/ ?>