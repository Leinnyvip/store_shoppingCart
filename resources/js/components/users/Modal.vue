<template>
	<div class="modal fade" id="user_modal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						{{`${is_create?'Crear':'Actualizar'} Usuario`}}
					</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
					</button>
				</div>
				<div class="modal-body">
					<form @submit.prevent="storeUser" enctype="multipart/form-data">
						<div class="mb-3">
							<label for="number_id" class="form-label">N. Identificación</label>
							<input type="number" class="form-control" id="number_id" v-model="user.number_id">
						</div>
                        <div class="mb-3">
							<label for="name" class="form-label">Nombre</label>
							<input type="text" class="form-control" id="name" v-model="user.name">
						</div>
                        <div class="mb-3">
							<label for="last_name" class="form-label">Apellido</label>
							<input type="text" class="form-control" id="last_name" v-model="user.last_name">
						</div>

						<div class="mb-3">
							<label for="email" class="form-label">Correo Electrónico</label>
							<input type="email" class="form-control" id="email" rows="3" v-model="user.email">
						</div>
                        <div class="mb-3">
							<label for="password" class="form-label">Contraseña</label>
							<input type="password" class="form-control" id="password" v-model="user.password">
						</div>
						<div class="mb-3">
							<label for="phone" class="form-label">Teléfono</label>
							<input type="number" class="form-control" id="phone" v-model="user.phone">
						</div>
                        <div class="mb-3">
							<label for="address" class="form-label">Dirección</label>
							<input type="text" class="form-control" id="address" v-model="user.address">
						</div>

						<hr>
						<section class="d-flex justify-content-end mt-3">
							<button type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">Cerrar</button>
							<button type="submit" class="btn btn-primary me-1">
								{{`${is_create?'Crear':'Actualizar'}`}}
							</button>
						</section>
					</form>
				</div>

			</div>
		</div>
	</div>
</template>

<script>
	import axios from 'axios'
	export default {
		props: ['user_data'],
		data() {
			return {
				is_create: true,
				user: {},

			}
		},
		created() {
			this.index()
		},
		methods: {
			index() {
				this.setUser()
			},
			setUser() {
				if (!this.user_data) return
				this.user = { ...this.user_data }
				this.is_create = false
			},
			loadFormData() {
				const form_data = new FormData()
				form_data.append('number_id', this.user.number_id)
				form_data.append('name', this.user.last_name)
				form_data.append('last_name', this.user.last_name)
				form_data.append('email', this.user.email)
                form_data.append('password', this.user.password)
				form_data.append('phone', this.user.phone)
				form_data.append('address', this.address)
				return form_data
			},
			async storeUser() {
				try {
					const user = this.loadFormData()
					if (this.is_create) {
						await axios.post('/Users/CreateUser', user)
					} else {
						await axios.post(`/Users/EditUser/{user}/${this.user.id}`, user)
					}
					swal.fire({
						icon: 'success',
						title: 'Felicidades!',
						text: 'Usuario almacenado!'
					})
					this.$parent.closeModal()
				} catch (error) {
					console.error(error)
					swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Algo salio mal!'
					})
				}
			}
		}
	}
</script>
