<div class="dropdown" id="cart">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        Carrinho
    </a>
    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
        <?php if(session()->has('Cart') && count(session('Cart')) > 0): ?>
            <?php $__currentLoopData = session('Cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="dropdown-item" style="float:none;">
                    <a href="#" style="color: black;"><?php echo e($p['name']); ?>

                        (<?php echo e($p['amount']); ?>)</a>
                    <button class="btn btn-danger btn-xs btn-circle" style="float: right;"
                        onclick="removeFromCart('<?php echo e(csrf_token()); ?>', <?php echo e(array_search($p, session('Cart'), true)); ?>);"><i
                            class="fas fa-minus"></i></button>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div style="margin-top: 10px;">
                <button type="button" class="btn btn-info btn-sm"
                    onclick="clearCart('<?php echo e(csrf_token()); ?>')">Limpar</button>
            </div>

        <?php else: ?>
            Vazio
        <?php endif; ?>
    </ul>
</div>

                        <?php /**PATH C:\Users\x\Desktop\0xTech\resources\views/components/cart.blade.php ENDPATH**/ ?>