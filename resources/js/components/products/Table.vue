<template>
	<table class="table" id="tableProduct" @click="getEvent">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Stock</th>
				<th>Descripción</th>
				<th>Precio</th>
                <th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="(product, index) in products" :key="index">
				<td>{{product.name}}</td>
				<td>{{product.stock}}</td>
				<td>{{product.description}}</td>
				<td>$ {{product.price}}</td>
                <td>
                    <section class="d-flex justify-content-end mt-3">
						<button type="button" class="btn btn-secondary me-1" @click="getEvent">Editar</button>
						<button type="submit" class="btn btn-dark me-1" @click="getEvent">Eliminar</button>
					</section>
                </td>
			</tr>
		</tbody>
	</table>
</template>

<script>
export default {
	props: ['products_data'],
	data() {
		return {
			products: [],
			product: {}
		}
	},
	mounted() {
		this.index()
	},
	methods: {
		async index() {
			this.getProducts()
		},
        async getProducts() {
			try {
				this.load = false
				const { data } = await axios.get('/Products/GetAllProducts')
				this.products = data.products
				this.load = true
			} catch (error) {
				console.error(error)
			}
		},
		getEvent(event) {
			const button = event.target
			if (button.getAttribute('role') == 'edit') {
				this.getProduct(button.getAttribute('data-id'))
			}
			if (button.getAttribute('role') == 'delete') {
				this.deletProduct(button.getAttribute('data-id'))
			}
		},
		async getProduct(product_id) {
			try {
				const { data } = await axios.get(`Products/GetProduct/${product_id}`)
				this.$parent.editProduct(data.product)
			} catch (error) {
				console.error(error)
			}
		},
		async deleteProduct(product_id) {
			try {
				const result = await swal.fire({
					icon: 'info',
					name: '¿Eliminar el Producto?',
					showCancelButton: true,
					confirmButtonText: 'Eliminar'
				})
				if (!result.isConfirmed) return
				this.datatable.destroy()
				await axios.delete(`Products/DeleteProduct/${product_id}`)
				this.index()
				swal.fire({
					icon: 'success',
					title: 'OK!',
					text: 'Producto Eliminado!'
				})
			} catch (error) {
				console.error(error)
			}
		}
	}
}
</script>
