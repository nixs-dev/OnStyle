<!DOCTYPE html>

<html>

<head>
    <title>Login</title>

    <link href="/libs/bootstrap.min.css" rel="stylesheet">

    <script src="/libs/bootstrap.bundle.min.js">
    </script>

    <script src="/js/controll.js"></script>

    <link rel="stylesheet" href="/css/fonts.css">
    <link rel="stylesheet" href="/css/buttons.css">
    <link rel="stylesheet" href="/css/authStyle.css">
    <script src="https://kit.fontawesome.com/17c066a4d1.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container" class="align-middle">
        <div class="header">
            <a id="back" href="<?php echo e(url('/')); ?>"><i class="far fa-arrow-alt-circle-left" aria-hidden="true" style="font-size:30px; color:rgb(0, 183, 255)"></i></a>
        </div>

        <div class="body">
            <form method="POST" action="<?php echo e(route('auth.check')); ?>">
                <?php echo csrf_field(); ?>

                <div class="title">
                    Login
                </div>


                <div id="inputs">

                    <div class="formInput">
                        <input id="email" type="email" name="email" :value="old('email')" placeholder="Email" required
                            autofocus />
                    </div>

                    <div class="formInput passwordInput">
                        <input id="password" type="password" name="password" placeholder="Senha" required
                            autocomplete="current-password" />
                        <i class="far fa-eye" onclick="showPassword(this);"></i>
                    </div>

                    <div style="float: left; font-size: small;">
                        <?php if(Route::has('password.request')): ?>
                            <a href="<?php echo e(route('password.request')); ?>">
                                Esqueceu sua senha ?
                            </a>
                        <?php endif; ?>

                    </div>
                </div>

                <div id="remember" class="mt-4">
                    <label for="remember_me">
                        <input type="checkbox" id="remember_me" name="remember">
                        <span>Lembrar de mim</span>
                    </label>
                </div><br>



                <div>
                    <?php if($errors->any()): ?>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="error"><?php echo e($error); ?></p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>


                <div class="mt-5">
                    <input class="btn s-blue btn-lg" class="enter" type="submit" value="Entrar">
                </div>

            </form>
        </div>
    </div>
</body>

<html>
<?php /**PATH C:\Users\joabe\Desktop\OnStyle\resources\views/auth/login.blade.php ENDPATH**/ ?>