<x-app>

    <div class="container" style="margin-top: 80px">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Carrito de Compras</li>
            </ol>
        </nav>
        @if(session()->has('success_msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
        @endif
        @if(session()->has('alert_msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session()->get('alert_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
        @endif
        @if(count($errors) > 0)
            @foreach($errors0>all() as $error)
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
            @endforeach
        @endif
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <br>
                @if(Cart::getTotalQuantity()>0)
                    <h4>{{ Cart::getTotalQuantity()}} Producto(s) en el carrito</h4><br>
                @else
                    <h4>No Hay Productos En El Carrito</h4><br>
                    <a href="/" class="btn btn-dark">Continuar Comprando</a>
                @endif

                @foreach($cartCollection as $item)
                    <div class="row">
                        <div class="col-lg-3">
                            <img src="https://api.lorem.space/image?w=150&h=180&hash=8B7BCDC2" class="img-thumbnail" width="200" height="200">
                        </div>
                        <div class="col-lg-5">
                            <p>
                                <b><a href="/shop/{{ $item->attributes->slug }}">{{ $item->name }}</a></b><br>
                                <b>Price: </b>${{ $item->price }}<br>
                                <b>Sub Total: </b>${{ Cart::get($item->id)->getPriceSum() }}<br>
                                {{-- <b>With Discount: </b>${{ Cart::get($item->id)->getPriceSumWithConditions() }}--}}
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <form action="{{ route('cart.update') }}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <input type="hidden" value="{{ $item->id}}" id="id" name="id">
                                        <input type="number" class="form-control form-control-sm" value="{{ $item->quantity }}"
                                               id="quantity" name="quantity" style="width: 70px; margin-right: 10px;">
                                        {{-- <button class="btn btn-secondary btn-sm" style="margin-right: 25px;">
                                        <img src="public\images\delete_black.png" style="width: 18px; height:18px " alt="">

                                        </button> --}}
                                    </div>
                                </form>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                    <button class="btn btn-secondary btn-sm mt-3 pr-7">
                                     Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
                @if(count($cartCollection)>0)
                    <form action="{{ route('cart.clear') }}" method="POST">
                        @csrf
                        <button class="btn btn-secondary btn-md">Vaciar Carrito</button>
                    </form>
                @endif
            </div>
            @if(count($cartCollection)>0)
                <div class="col-lg-5">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Total: </b>${{ Cart::getTotal() }}</li>
                        </ul>
                    </div>
                    <br>
                    <a href="{{ route('home') }}" class="btn btn-primary me-3">Continuar Comprando</a>
                    <a href="{{ route('home') }}" class="btn btn-dark">Finalizar Compra</a>

                </div>
            @endif
        </div>
        <br><br>
    </div>
</x-app>
