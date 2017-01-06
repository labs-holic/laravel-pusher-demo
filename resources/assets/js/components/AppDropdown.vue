<template>
	<span>
		<a href="#" class="nav-item dropdown" @click="toggleShow">
      <span class="icon is-small">
        <i :data-count="total" class="fa fa-bell badge" :data-badge="total" :class="{'hide-count': !hasUnread}"></i>
      </span>
    </a>
		<app-dropdown-list :class="{ 'is-showing': showing }" :total="total"></app-dropdown-list>
	</span>
</template>

<script>
	Vue.component('app-dropdown-list', require('./AppDropdownList.vue'))

	export default {
		name: 'app-dropdown',

		components: [
			'app-dropdown-list'
		],

		data() {
	  	return {
		  	showing: false,

		  	total: 0
	  	}
	  },

	  methods: {
	  	toggleShow() {
	  		this.showing = ! this.showing
	  	},

	  	notShow(e) {
	  		if (this.showing && e.keyCode === 27) {
		  		this.showing = false
	  		}
	  	},

	  	increment() {
	  		this.total++
	  	},

	  	decrement() {
	  		this.total--
	  	},

	  	zero() {
	  		this.total = 0
	  	}
	  },

	  computed: {
	  	hasUnread() {
	  		return this.total > 0
	  	}
	  },

	  created() {
	  	this.$root.$on('increment', this.increment)
	  	this.$root.$on('decrement', this.decrement)
	  	this.$root.$on('zero', this.zero)
	  	window.addEventListener('keyup', this.notShow)
	  }
	}
</script>