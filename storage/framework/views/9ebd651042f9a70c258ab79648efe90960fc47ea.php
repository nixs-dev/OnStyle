<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Bem vindo</title>


    <link href="/libs/bootstrap.min.css" rel="stylesheet">

    <script src="/libs/bootstrap.bundle.min.js">
    </script>

    <script type="text/javascript" src="/js/components/controll.js">
    </script>

    <link rel="stylesheet" href="/css/fonts.css">
    <link rel="stylesheet" href="/css/buttons.css">
    <link rel="stylesheet" href="/css/appStyle.css">
    <script src="/libs/fontawesome.js"></script>

</head>

<body id="mainbackground">
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="https:www.twitter.com">
                            <i class="fab fa-twitter-square " aria-hidden="true" style="font-size:30px; color:rgb(0, 183, 255)"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https:www.facebook.com">
                            <i class="fab fa-facebook-square" aria-hidden="true" style="font-size:30px; color:rgb(0, 183, 255)"></i>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <?php if(session()->has('LoggedUser')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('auth.login')); ?>">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>


    <div id="welcomeText" class="d-flex flex-column centered-div center-components beauty-font">
        <p class="title">Bem Vindo à Aline's Store</p>
        <p class="description">O lugar certo para renovar seu guarda-roupa!</p>

        <div class="mt-5 align-self-center">
            <button class="btn btn-lg s-blue" onclick="window.location = 'auth/register';">Inscrever-se agora</button>
        </div>
    </div>

    <div style="height: 1000px;">

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
<?php /**PATH C:\Users\x\Desktop\0xTech\resources\views/welcome.blade.php ENDPATH**/ ?>