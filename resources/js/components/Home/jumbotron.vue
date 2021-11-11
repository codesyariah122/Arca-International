<template>
	<div>
		<div class="p-5 mb-4 bg-light rounded-3">
			<div class="container-fluid py-5">
				<h1 class="display-5 fw-bold">{{ title }}</h1>
				<p class="col-md-8 fs-4 mt-5">
					{{ content }}
				</p>
				<a :href="url" class="btn btn-primary btn-lg" type="button">To Website</a>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: ['title', 'content'],

		data(){
			return {
				url: 'https://arcacorp-frontend-test.netlify.app/'
			}
		},

		computed: {
			webpage(){
				window.open(this.url)
			}
		}
	}
</script>

<style>
	.display-5 {
		text-transform: capitalize;
		font-family: Reey Regular;
	}
</style>