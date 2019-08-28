<template id="post-list">
	<div class="row">
		<div class="ml-auto">
			<br>
			<router-link class="btn btn-outline-primary" v-bind:to="{path: '/add-post'}">
				<span>
					<i class="fa fa-plus-circle"></i>
				</span>
				Add New Post
			</router-link>
			</br></br>
		</div>
		<table class="table table-striped table-dark">
			<thead>
				<tr>
					<th>#</th>
					<th>Post Title</th>
					<th>Post Body</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(post, index) in filteredPosts">
					<td>{{ index + 1 }}</td>
					<td>{{ post.title }}</td>
					<td>{{ post.body }}</td>
					<td>
						<router-link class="btn btn-info btn-sm" v-bind:to="{name: 'Viewpost', params: {id: post.id}}">Show <i class="fa fa-external-link"></i></router-link>
						<router-link class="btn btn-warning btn-sm" v-bind:to="{name: 'Editpost', params: {id: post.id}}">Edit <i class="fa fa-pencil-square-o"></i></router-link>
						<router-link class="btn btn-danger btn-sm" v-bind:to="{name: 'Deletepost', params: {id: post.id}}">Delete <i class="fa fa-trash-o"></i></router-link>
					</td>
				</tr>
			</tbody>	
		</table>
	</div>
</template>

<script>
export default {
	data: function() {
		return { posts: '' };
		},
		created: function() {
			let uri = 'http://127.0.0.1:8000/posts/';
			Axios.get(uri).then((response) => {
				this.posts = response.data;
				});
			},
			computed: {
				filteredPosts: function() {
					if(this.posts.length) {
						return this.posts;
					}
				}
			}
		}
</script>

<style>
	
</style>