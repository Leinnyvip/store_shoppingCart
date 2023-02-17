<template>
	<table class="table" id="tableUsers" @click="getEvent">
		<thead>
			<tr>
				<th>N. Identificación</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Correo</th>
                <th>Contraseña</th>
				<th>Teléfono</th>
				<th>Dirección</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="(user, index) in users" :key="index">
				<td>{{ user.number_id }}</td>
				<td>{{ user.name }}</td>
				<td>{{ user.last_name }}</td>
				<td>{{ user.email }}</td>
                <td>{{ user.password }}</td>
				<td>{{ user.phone }}</td>
				<td>{{ user.address }}</td>
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
	props: ['user_data'],
	data() {
		return {
			is_create: true,
			users: [],
			user: null
		}
	},
	mounted() {
		this.index()
	},
	methods: {
		async index() {
			this.getUsers()
		},
		async getUsers() {
			try {
				this.load = false
				const { data } = await axios.get('/Users/GetAllUsers')
				this.users = data.users
				this.load = true
			} catch (error) {
				console.error(error)
			}
		},
		getEvent(event) {
			const button = event.target
			if (button.getAttribute('role') == 'edit') {
				this.getUser(button.getAttribute('data-id'))
			}
			if (button.getAttribute('role') == 'delete') {
				this.deleteUser(button.getAttribute('data-id'))
			}
		},
		async getUser(user_id) {
			try {
				const { data } = await axios.get(`Users/GetAnUser/${user_id}`)
				// this.$parent.editUser(data.user)
			} catch (error) {
				console.error(error)
			}
		},
		async deleteUser(user_id) {
			try {
				const result = await swal.fire({
					icon: 'info',
					name: '¿Eliminar el Usuario?',
					showCancelButton: true,
					confirmButtonText: 'Eliminar'
				})
				if (!result.isConfirmed) return
				this.datatable.destroy()
				await axios.delete(`Users/DeleteUser/${user_id}`)
				this.index()
				swal.fire({
					icon: 'success',
					title: 'Felicidades!',
					text: 'Usuario Eliminado!'
				})
			} catch (error) {
				console.error(error)
			}
		}
	}
}
</script>
