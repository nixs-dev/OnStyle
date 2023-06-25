<div class="modal fade" id="paymentModal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary bg-gradient">
                <h5 class="modal-title" id="exampleModalLabel">Pagamento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5">
                <div class="flex column">

                    <div style="margin-bottom: 30px;">
                        <div style="border: solid 2px black;">
                            <label id="productName">Produto: </label>
                        </div>
                        <div style="border: solid 2px black; border-top: none;">
                            <label id="productPrice">Preço: </label>
                        </div>
                    </div>

                    <ul class="nav nav-tabs" id="paymentOptions" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="cartao-tab" data-bs-toggle="tab"
                                data-bs-target="#cartao" type="button" role="tab" aria-controls="cartao"
                                aria-selected="true">Cartão</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="boleto-tab" data-bs-toggle="tab" data-bs-target="#boleto"
                                type="button" role="tab" aria-controls="boleto"
                                aria-selected="false">Boleto</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="debito-tab" data-bs-toggle="tab" data-bs-target="#debito"
                                type="button" role="tab" aria-controls="debito" aria-selected="false">Debito
                                Online</button>
                        </li>
                    </ul>
                    <div class="tab-content flex center-components" id="paymentOptionsContent"
                        style="margin-top: 20px;">
                        <div class="tab-pane fade show active" id="cartao" role="tabpanel"
                            aria-labelledby="cartao-tab" style="width: 100%;">
                            <form action="<?php echo e(route('product.buy')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input name="id" id="productID" type="hidden">

                                <button type="button" class="btn softSquare btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#cardBrands">
                                    Bandeiras Permitidas
                                </button>

                                <div class="mt-lg-5">
                                    <div class="row">
                                        <label for="cardNumber" class="col-auto col-form-label">Número do
                                            cartão:</label>
                                        <div class="col-auto">
                                            <input type="text" id="cardNumber" class="form-control"
                                                name="cardNumber" onkeyup="getBrand()" maxlength="16" />
                                        </div>
                                        <div class="flex center-components col-auto" id="brand"><img style="width: 90%; height: 70%;" src="https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/42x20/visa.png"></div>
                                    </div>
                                </div>

                                <select name="InstallmentsNum" id="InstallmentsNum" class="form-select-sm">
                                    <option value="">Parcelamento</option>
                                </select>

                                <div>
                                    <input type="hidden" id="tokenCard" name="tokenCard">

                                    <input type="hidden" id="hashCard" name="hashCard">
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="boleto" role="tabpanel" aria-labelledby="boleto-tab"></div>
                        <div class="tab-pane fade" id="debito" role="tabpanel" aria-labelledby="debito-tab"></div>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal-footer bg-primary bg-gradient">
            <button type="button" onclick="end(this.parentNode.parentNode)" class="btn btn-secondary" data-bs-dismiss="modal">Confirmar</button>
        </div>
    </div>
</div>

<div class="modal fade" id="cardBrands" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bandeiras</h5>
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="allowedCardBrands">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="onlineDebit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Débito Online</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="allowedDebit">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\Users\joabe\Desktop\OnStyle\resources\views/components/paymentModal.blade.php ENDPATH**/ ?>