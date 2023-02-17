{{-- Menu --}}
<nav class="navbar navbar-expand-md navbar-light py-4 px-4 mt-3 shadow-sm " style="background-color: #900C3F;">
	<div class="container">
		<a class="navbar-brand text-white font-weight-bold" href="{{ url('/') }}">Store</a>

		{{-- Hamburguesa --}}
		<button class="navbar-toggler text-white font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<!-- Left Side Of Navbar -->
			<ul class="navbar-nav me-auto">
                <li class="nav-item">
                  <a class="nav-link text-white font-weight-bold" href="{{ route('category') }}">Categorias</a>
                </li>
			    <li class="nav-item">
                  <a class="nav-link text-white font-weight-bold" href="{{ route('cart.index') }}">Carrito</a>
                </li>
            </ul>

			<!-- Right Side Of Navbar -->
			<ul class="navbar-nav ms-auto">
				<!-- Authentication Links -->
				@guest
					@if (Route::has('login'))
						<li class="nav-item">
							<a class="nav-link text-white font-weight-bold" href="{{ route('login') }}">Login</a>
						</li>
					@endif

					@if (Route::has('register'))
						<li class="nav-item">
							<a class="nav-link text-white font-weight-bold" href="{{ route('register') }}">Registro</a>
						</li>
					@endif
				@else
					<li class="nav-item dropdown">
						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							{{ Auth::user()->full_name }}
						</a>

						<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
							@role('Admin')
								{{-- Users --}}
								<a class="dropdown-item" href="{{ route('users.index') }}">Usuarios</a>

								{{-- Products --}}
								<a class="dropdown-item" href="{{ route('product.create') }}">Productos</a>
                            @endrole

							{{-- Logout --}}
							<a class="dropdown-item" href="{{ route('logout') }}"
							   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						</div>

					</li>
				@endguest
			</ul>
		</div>
	</div>
</nav>
