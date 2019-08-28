<template class="post-delete">
	<div>
		<h3>Delete post {{ post.title }}</h3>
		<form v-on:submit.prevent="deletePost">
			<p>The action can't be undone.</p>
			<button class="btn btn-danger" type="submit" name="button">Delete</button>
			<router-link class="btn btn-primary" v-bind:to="'/'">Back</router-link>
		</form>
	</div>
</template>

<script>
export default {
	data: function() {
		return {post: {body: '', title: ''}}
	},
	created: function() {
		let uri = 'http://127.0.0.1:8000/posts/'+this.$route.params.id+'/edit';
		Axios.get(uri).then((response) => {
			this.post = response.data;
		})
	},
	methods: {
		deletePost: function() {
			let uri = 'http://127.0.0.1:8000/posts/'+this.$route.params.id;
			Axios.delete(uri, this.post).then((response) => {
				this.$router.push({name: 'Listposts'})
			})
		}
	}
}	
</script>