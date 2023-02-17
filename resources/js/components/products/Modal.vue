<template>
	<div class="modal fade" id="product_modal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						{{`${is_create?'Crear':'Actualizar'} Producto`}}
					</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
					</button>
				</div>
				<div class="modal-body">
					<form @submit.prevent="saveProduct" enctype="multipart/form-data">
						<div class="mb-3">
							<label for="name" class="form-label">Nombre</label>
							<input type="text" class="form-control" id="name" v-model="product.name">
						</div>
						<div class="mb-3">
							<label for="stock" class="form-label">Stock</label>
							<input type="number" class="form-control" id="stock" v-model="product.stock">
						</div>
						<div class="mb-3">
							<label for="description" class="form-label">Descripción</label>
							<textarea class="form-control" id="description" rows="3" v-model="product.description"></textarea>
						</div>
                        <div class="mb-3">
							<label for="price" class="form-label">Precio</label>
							<v-select id="price"  v-model="product.price">
							</v-select>
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
		data() {
			return {
                is_create: true,
				products: [],
				product: {}

			}
		},
		created() {
			this.index(),
            this.setProduct()
		},
		methods: {
			index() {
				this.getProduct()
				this.setProduct()
			},
            setProduct() {
				if (!this.product_data) return
				this.product = { ...this.product_data }
				this.is_create = false
			},
			loadFormData() {
				const form_data = new FormData()
				form_data.append('name', this.product.name)
				form_data.append('stock', this.product.stock)
				form_data.append('description', this.product.description)
				form_data.append('price', this.product.price)
				return form_data
			},
			async saveProduct() {
				try {
					const product = this.loadFormData()
					if (this.is_create) {
						await axios.post('/Products/SaveProduct', product)
					} else {
						await axios.post(`/Products/UpdateProduct/${this.product_id}`, product)
					}
					swal.fire({
						icon: 'success',
						title: 'OK!',
						text: 'Producto almacenado!'
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
