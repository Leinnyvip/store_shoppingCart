import './bootstrap'
import { createApp } from 'vue'
import vSelect from 'vue-select'

// Components ---------------------------------------------------
import ExampleComponent from './components/ExampleComponent.vue'
import CategoryComponent from './components/categories/Index.vue'
import ProductComponent from './components/products/Index.vue'
import UserComponent from './components/users/Index.vue'

const app = createApp({
	components: {
		ExampleComponent,
        CategoryComponent,
        ProductComponent,
        UserComponent,


	}
})

app.component('v-select', vSelect)
app.mount('#app')
