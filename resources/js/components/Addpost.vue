<template id="add-post">
	<div>
		<h3>Add new Post</h3>
		<form @submit.prevent="post" @keydown="form.onKeydown($event)">
			<div class="form-group">
				<label for="add-title">Title</label>
				<input id="add-title" type="text" v-model="form.title" name="title" class="form-control" :class="{ 'is-invalid': form.errors.has('title') }">
				<has-error :form="form" field="title"></has-error>
			</div>
			<div class="form-group">
				<label for="add-body">Body</label>
				<textarea class="form-control" rows="10" v-model="form.body" :class="{ 'is-invalid': form.errors.has('body') }"></textarea>
				<has-error :form="form" field="body"></has-error>
			</div>
		<button type="submit" class="btn btn-primary">Create</button>
		<router-link class="btn btn-warning" v-bind:to="'/'">Cancel</router-link>
		</form>
	</div>
</template>

<script>
import Vue from 'vue';
import { Form, HasError, AlertError } from 'vform';

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

export default {
	data () {
    return {
      // Create a new form instance
      form: new Form({
        title: '',
        body: ''
      })
    }
  },
  methods: {
    post () {
      // Submit the form via a POST request
      this.form.post('http://127.0.0.1:8000/posts')
        .then(({ data }) => { console.log(data), 
        	this.$router.push({name: 'Listposts'})})
    }
  }
}
</script>