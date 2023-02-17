{{-- name --}}
<div class="mb-3">
	<label for="name" class="form-label">Nombre</label>
	<input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
	value="{{old('name')? old('name'): (isset($product)? $product->name: '')}}">

	@error('name')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

{{-- price --}}
<div class="mb-3">
	<label for="name" class="form-label">Precio</label>
	<input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
	value="{{old('price')? old('price'): (isset($product)? $product->price: '')}}">

	@error('price')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>


{{-- description --}}
<div class="mb-3">
	<label for="name" class="form-label">Descripción</label>
	<input type="text" name="description" class="form-control @error('description') is-invalid @enderror"
	value="{{old('description')? old('description'): (isset($product)? $product->description: '')}}">

	@error('description')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

{{-- stock --}}
<div class="mb-3">
	<label for="name" class="form-label">Stock</label>
	<input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror"
	value="{{old('stock')? old('stock'): (isset($product)? $product->stock: '')}}">

	@error('stock')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

{{-- image --}}
<div class="mb-3">
	<label for="name" class="form-label">Imagen</label>
	<input type="image" name="image_path" class="form-control @error('image_path') is-invalid @enderror"
	value="{{old('image_path')? old('image_path'): (isset($product)? $product->image_path: '')}}">

	@error('image_path')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

{{-- buttons --}}
<a href="/Products"  class="btn btn-danger me-2">Cancelar</a>
<button type="submit" class="btn btn-info">Enviar</button>
