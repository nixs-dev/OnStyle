<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title>Perfil</title>


        <link href="/libs/bootstrap.min.css" rel="stylesheet">

        <script src="/libs/bootstrap.bundle.min.js">
        </script>

        <script src="/js/controll.js"></script>

        <script src="https://kit.fontawesome.com/17c066a4d1.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/css/fonts.css">
        <link rel="stylesheet" href="/css/buttons.css">
        <link rel="stylesheet" href="/css/appStyle.css">
    </head>

    <body id="profileEditorBackground">
        <div class="profileEditor rounded centered-div">
            <div class="d-flex photo justify-content-center">
                <img src="/img/userIcon.png" id="profilePhoto" class="rounded-circle" onclick="showExplorer('photoUpload')">
                <div class="edit align-self-center">
                    <i class="fas fa-user-edit"></i>
                    <input type="file" id="photoUpload" class="d-none">
                </div>
            </div>
            <div class="info">
                <div class="pre">
                    Usuário
                </div>
                <div class="data">
                    <?php echo e($User['name']); ?>

                </div>
            </div>
            <div class="info">
                <div class="pre">
                    Email
                </div>
                <div class="data">
                    <?php echo e($User['email']); ?>

                </div>
            </div>
            <div class="info">
                <div class="pre">
                    Senha
                </div>
                <div class="data passwordInput">
                    <input class="form-control" type="password" value="senhaaleatoria">
                    <i class="far fa-eye" onclick="showPassword(this);"></i>
                </div>
            </div>
            <div class="info">
                <div class="pre">
                    Ultimas compras
                </div>
                <div class="itens">
                    
                </div>
            </div>
            <div class="finalOptions w-100 d-flex justify-content-end">
                <button class="softSquare">Salvar</button>
            </div>
        </div>
    </body>
</html><?php /**PATH C:\Users\joabe\Desktop\AlinesStore\resources\views/profile.blade.php ENDPATH**/ ?>