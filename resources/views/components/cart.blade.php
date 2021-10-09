<div class="dropdown" id="cart">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        Carrinho
    </a>
    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
        @if (session()->has('Cart') && count(session('Cart')) > 0)
            @foreach (session('Cart') as $p)
                <li class="dropdown-item" style="float:none;">
                    <a href="#" style="color: black;">{{ $p['name'] }}
                        ({{ $p['amount'] }})</a>
                    <button class="btn btn-danger btn-xs btn-circle" style="float: right;"
                        onclick="removeFromCart('{{ csrf_token() }}', {{ array_search($p, session('Cart'), true) }});"><i
                            class="fas fa-minus"></i></button>
                </li>
            @endforeach

            <div style="margin-top: 10px;">
                <button type="button" class="btn btn-info btn-sm"
                    onclick="clearCart('{{ csrf_token() }}')">Limpar</button>
            </div>

        @else
            Vazio
        @endif
    </ul>
</div>

                        