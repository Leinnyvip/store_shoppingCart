<x-app>
     {{-- A product --}}
	<section class="d-flex justify-content-center flex-wrap">
		@foreach ($products as $product)
			<div class="card mx-3 my-3 font-weight-bold" style="width: 18rem;">
				@if ($product->image)
					<img src="/storage/images/{{$product->image}}" class="card-img-top" alt="producto">
				@else
					<img src="https://api.lorem.space/image?w=150&h=180&hash=8B7BCDC2" class="card-img-top" alt="producto">
				@endif

				<div class="card-body">
					<h5 class="card-title">{{$product->name}}</h5>
					<p class="card-text">$  {{$product->price}}</p>
					<form action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" id="id" name="id">
                        <input type="hidden" value="{{ $product->name }}" id="name" name="name">
                        <input type="hidden" value="{{ $product->price }}" id="price" name="price">
                        <input type="hidden" value="{{ $product->image_path }}" id="img" name="image">
                        <input type="hidden" value="1" id="quantity" name="quantity">
                        <div class="card-footer" style="background-color: #D9D7DA;">
                              <div class="row">
                                <button class="btn btn-info btn-sm" class="tooltip-test" title="add to cart" type="submit">
                                    <i class="fa fa-shopping-cart font-weight-bold"></i> Agregar al carrito
                                </button>
                            </div>
                        </div>
                    </form>
				</div>
			</div>
		@endforeach
	</section>
</x-app>
