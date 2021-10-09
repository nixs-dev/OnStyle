<div class="modal fade " id="amountProductModal" tabindex="-1"aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary bg-gradient">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar ao carrinho</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="flex column">
                    <div style="border: solid 2px black; margin-bottom: 30px;">
                      <label id="productName">Produto: </label>
                    </div>

                    <div class="form-group w-25">
                      <label class="col-form-label">Unidades:</label>
                      <input type="number" class="form-control" id="amountProduct" value="1" onchange="setAmount(this.value)" onkeydown="return false" min="1"></input>
                    </div>

                    <div class="badge bg-primary text-wrap fw-bold" style="margin-top: 20px; align-self: center; padding: 2%;">
                        <label id="totalPrice">00,00</label>R$
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-primary bg-gradient">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="addToCart('{{csrf_token()}}')">Confirmar</button>
            </div>
        </div>
    </div>
</div>