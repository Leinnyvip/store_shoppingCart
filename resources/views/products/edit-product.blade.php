<x-app>
	<section class="container my-5">
		<div class="card">
			<div class="card-header">
				<h2>Editar Producto</h2>
			</div>
			<div class="card-body">
				<form action="{{route('product.edit.put', ['product' => $product->id])}}" method="POST">
					@csrf
					@method('PUT')
					<x-products.form-product :product="$product" :roles="$roles" />
				</form>
			</div>
		</div>
	</section>
</x-app>
