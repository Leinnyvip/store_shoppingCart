<template>
	<div class="card mx-5 my-5">
		<div class="card-header d-flex justify-content-between">
			<h2>Usuarios</h2>
			<button @click="openModal" class="btn btn-primary">Crear Usuario</button>
		</div>

		<div class="card-body">
			<tableUsers-component ref="table" />
		</div>

		<section v-if="load_modal">
			<modal :user_data="user" />
		</section>
	</div>
</template>

<script>
import TableUsersComponent from './TableUsers.vue'
import Modal from './Modal.vue'
export default {
	components: {
		TableUsersComponent,
		Modal
	},
	data() {
		return {
			load_modal: false,
			modal: null,
			user: null
		}
	},
	methods: {
		openModal() {
			this.load_modal = true
			setTimeout(() => {
				this.modal = new bootstrap.Modal(document.getElementById('user_modal'), {
					keyboard: false
				})
				this.modal.show()
				const modal = document.getElementById('user_modal')
				modal.addEventListener('hidden.bs.modal', () => {
					this.load_modal = false
					this.user = null
				})
			}, 200)
		},
		closeModal() {
			this.modal.hide()
			this.$refs.table.destroy()
			this.$refs.table.index()
		},
		editUser(user) {
			this.user = user
			this.openModal()
		}
	}
}
</script>

