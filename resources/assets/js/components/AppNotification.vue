<template>
	<li class="dropdown-item">
		<div class="card is-fullwidth">
		  <div class="card-content">
		  	<div class="media">
		  		<div class="media-left">
			  		<figure class="image is-32x32">
		          <img src="http://placehold.it/64x64" alt="Image">
		        </figure>
		  		</div>
		  		<div class="media-content">
		  			{{ notification.title }}
		  		</div>
		  		<div class="media-right">
		  			<button class="delete" @click="$emit('remove')"></button>
		  		</div>
		  	</div>
		    <div class="content is-white-space-normal">
		      {{ notification.message }}
		    </div>
		  </div>
		</div>
	</li>
</template>

<script>
	export default {
		name: 'app-notification',

		props: [
			'notification',
			'index'
		]
	}
</script>