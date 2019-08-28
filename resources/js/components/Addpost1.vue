<template id="add-post">
	<div>
		<h3>Add new Post</h3>
		<form v-on:submit.prevent="createPost">
			<div class="form-group">
				<label for="add-title">Title</label>
				<input id="add-title" type="text" v-model="post.title" name="title" class="form-control" :class="{ 'is-invalid': post.errors.has('title') }">
				<has-error :form="post" field="title"></has-error>
			</div>
			<div class="form-group">
				<label for="add-body">Body</label>
				<textarea class="form-control" rows="10" v-model="post.body"></textarea>
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
	
	data: function(){
		return {post: {title: '', body: ''}}
	}


	data: function () {
    return {
      // Create a new form instance
      form: new Form({
        title: '',
        body: ''
      })
    }
  },
  methods: {
  	createPost: function(){
  		let uri = 'http://127.0.0.1:8000/posts';
  		Axios.post(uri, this.post).then((response) => {
  			this.$router.push({name: 'Listposts'})
  		})
  	}
  }
	methods: {
    createPost: function () {
      // Submit the form via a POST request
      this.form.post('http://127.0.0.1:8000/posts')
        .then(({ data }) => { console.log(data) })
    }
  }
}
</script>