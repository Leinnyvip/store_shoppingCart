<template>
	<div class="modal fade" id="category_modal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						{{`${is_create?'Crear':'Actualizar'} Categoria`}}
					</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="mb-3">
							<label for="name" class="form-label">Nombre</label>
							<input type="text" class="form-control" id="name" v-model="category.name">
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
				categories: [],
				category: {},

			}
		},
		created() {
			this.index()
		},
		methods: {
			index() {
				this.getCategories()
			},
        }
    }
</script>
