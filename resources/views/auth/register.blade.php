<x-app>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('registerForm') }}">
                        @csrf

                        {{-- name --}}
                        <div class="mb-3">
                        	<label for="name" class="form-label">Nombre</label>
                        	<input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        	value="{{old('name')? old('name'): (isset($user)? $user->name: '')}}">

                        	@error('name')
                        		<span class="invalid-feedback" role="alert">
                        			<strong>{{ $message }}</strong>
                        		</span>
                        	@enderror
                        </div>

                        {{-- last name --}}
                        <div class="mb-3">
                        	<label for="name" class="form-label">Apellido</label>
                        	<input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                        	value="{{old('last_name')? old('last_name'): (isset($user)? $user->last_name: '')}}">

                        	@error('last_name')
                        		<span class="invalid-feedback" role="alert">
                        			<strong>{{ $message }}</strong>
                        		</span>
                        	@enderror
                        </div>

                        {{-- number id --}}
                        <div class="mb-3">
                        	<label for="number_id" class="form-label">Cedula</label>
                        	<input type="number" name="number_id" class="form-control @error('number_id') is-invalid @enderror"
                        	value="{{old('number_id')? old('number_id'): (isset($user)? $user->number_id: '')}}">

                        	@error('number_id')
                        		<span class="invalid-feedback" role="alert">
                        			<strong>{{ $message }}</strong>
                        		</span>
                        	@enderror
                        </div>

                        {{-- email --}}
                        <div class="mb-3">
                        	<label for="email" class="form-label">Correo Electrónico</label>
                        	<input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        	value="{{old('email')? old('email'): (isset($user)? $user->email: '')}}">

                        	@error('email')
                        		<span class="invalid-feedback" role="alert">
                        			<strong>{{ $message }}</strong>
                        		</span>
                        	@enderror
                        </div>

                        {{-- password --}}
                        <div class="mb-3">
                        	<label for="password" class="form-label">Contraseña</label>
                        	<input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        	value="{{old('password')? old('password'): (isset($user)? $user->password: '')}}">

                        	@error('password')
                        		<span class="invalid-feedback" role="alert">
                        			<strong>{{ $message }}</strong>
                        		</span>
                        	@enderror
                        </div>

                        {{-- confirm password --}}
                        <div class="mb-3">
                        	<label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                        	<input id="password_confirmation" type="password" name="password_confirmation" class="form-control @error('confirm_password') is-invalid @enderror"
                        	value="{{old('password_confirmation')? old('password_confirmation'): ''}}">

                        	@error('password_confirmation')
                        		<span class="invalid-feedback" role="alert">
                        			<strong>{{ $message }}</strong>
                        		</span>
                        	@enderror
                        </div>

                        {{-- phone --}}
                        <div class="mb-3">
                        	<label for="phone" class="form-label">Teléfono</label>
                        	<input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror"
                        	value="{{old('phone')? old('phone'): (isset($user)? $user->phone: '')}}">

                        	@error('phone')
                        		<span class="invalid-feedback" role="alert">
                        			<strong>{{ $message }}</strong>
                        		</span>
                        	@enderror
                        </div>

                        {{-- address --}}
                        <div class="mb-3">
                        	<label for="name" class="form-label">Dirección</label>
                        	<input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                        	value="{{old('address')? old('address'): (isset($user)? $user->address: '')}}">

                        	@error('address')
                        		<span class="invalid-feedback" role="alert">
                        			<strong>{{ $message }}</strong>
                        		</span>
                        	@enderror
                        </div>
                        {{-- buttons --}}
                        <a href="/"  class="btn btn-danger me-2">Cancelar</a>
                        <button type="submit" class="btn btn-info">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app>
