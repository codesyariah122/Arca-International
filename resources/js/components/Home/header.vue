<template>
	<div>
		<header class="pb-3 mb-4 border-bottom">
			<a href="/" class="d-flex align-items-center text-dark text-decoration-none">

				<Logo/>

				<span class="fs-5 brand">
					{{ brand.toUpperCase() }}
				</span>
			</a>
		</header>
	</div>
</template>

<script>
	import {Logo} from '../molecules'

	export default {
		props: ['brand'],
		components: {
			Logo
		}
	}
</script>

<style>
	.brand{
		font-weight: 700;
		font-family:Walkway;
		font-size: 25px!important;
	}
</style>