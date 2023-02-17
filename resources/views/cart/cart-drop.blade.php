<x-app>
@if(count(Cart::getContent()) > 0)
    @foreach(Cart::getContent() as $item)
        <li class="list-group-item">
            <div class="row">
                <div class="col-lg-3">
                    <img src="https://api.lorem.space/image?w=150&h=180&hash=8B7BCDC2"
                         style="width: 50px; height: 50px;"
                    >
                </div>
                <div class="col-lg-6">
                    <b>{{$item->name}}</b>
                    <br><small>Cant: {{$item->quantity}}</small>
                </div>
                <div class="col-lg-3">
                    <p>${{ Cart::get($item->id)->getPriceSum() }}</p>
                </div>
                <hr>
            </div>
        </li>
    @endforeach
    <br>
    <li class="list-group-item">
        <div class="row">
            <div class="col-lg-10">
                <b>Total: </b>${{ Cart::getTotal() }}
            </div>
            <div class="col-lg-2">
                <form action="{{ route('cart.clearCart') }}" method="POST">
                    @csrf
                    <button class="btn btn-secondary btn-sm"></button>
                </form>
            </div>
        </div>
    </li>
    <br>
    @else
    <li class="list-group-item">Tu carrito esta vacío</li>
@endif
</x-app>
