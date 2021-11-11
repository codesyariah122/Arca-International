<template>
	<div>
		<div class="container py-4">
			<Header :brand="brand"/>
			<Jumbotron :title="title" :content="content"/>
		</div>
	</div>
</template>

<script>
	import {Header, Jumbotron} from '../../components/Home'

	export default {
		components: {
			Header,
			Jumbotron
		},
		data(){
			return {
				brand: "arca international",
				title: 'welcome in arca::backend - test',
				content: 'Seluruh konten utama aplikasi web dapat di akses, dari tombol dibawah ini.'
			}
		}
	}
</script>


