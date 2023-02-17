<template>
	<x-app>
		<section class="container">
			<div class="card my-5">
				<div class="card-header d-flex justify-content-between">
					<h2>Categorías</h2>
					<button @click="openModal" class="btn btn-success">Crear Categoría</button>
				</div>

				<div class="card-body">
					<section class="table-responsive" v-if="load">
						<table class="table" id="categoryTable">
							<thead>
								<tr>
									<th>Nombre de la categoria</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="(category, index) in categories" :key="index">
									<th>{{ category.name }}</th>
									<td>
										<section class="d-flex justify-content-end mt-3">
											<button type="button" class="btn btn-secondary me-1">
												Editar
											</button>
											<button type="submit" class="btn btn-dark me-1">
												Eliminar
											</button>
										</section>
									</td>
								</tr>
							</tbody>
						</table>
					</section>
				</div>

				<section v-if="load_modal">
					<modal :category_data="category" />
				</section>
			</div>
		</section>
	</x-app>
</template>

<script>
import Modal from './Modal.vue'
export default {
    components: {
       Modal
    },
	props: ['categories_data'],
	data() {
		return {
			category: [],
            categories: null,
			load: false,
			load_modal: false

		}
	},
	created() {
		this.index
	},
	methods: {
		async index() {
			this.getCategories()
		},
		async getCategories() {
			try {
				const { data } = await axios.get('/Categories/GetCategories')
				this.categories = data.categories
			} catch (error) {
				console.log(error)
			}
		},
        openModal() {
			this.load_modal = true
			setTimeout(() => {
				this.modal = new bootstrap.Modal(document.getElementById('category_modal'), {
					keyboard: false
				})
				this.modal.show()
				const modal = document.getElementById('category_modal')
				modal.addEventListener('hidden.bs.modal', () => {
					this.load_modal = false
					this.category = null
				})
			}, 200)
		},
		closeModal() {
			this.modal.hide()
		},
		editCategoryt(category) {
			this.category = category
			this.openModal()
		}
	}
}
</script>


