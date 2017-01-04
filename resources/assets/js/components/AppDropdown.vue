<template>
	<span>
		<a href="#" class="nav-item dropdown" @click="toggleShow">
      <span class="icon is-small">
        <i :data-count="total" class="fa fa-bell badge" :data-badge="total" :class="{'hide-count': !hasUnread}"></i>
      </span>
    </a>
		<app-dropdown-list :class="{'is-showing': showing}"></app-dropdown-list>
	</span>
</template>

<script>
	Vue.component('app-dropdown-list', require('./AppDropdownList.vue'));

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
		  		this.showing = false;
	  		}
	  	},

	  	setTotal(total) {
	  		this.total = total;
	  	}
	  },

	  computed: {
	  	hasUnread() {
	  		return this.total > 0;
	  	}
	  },

	  created() {
	  	this.$root.$on('total-updated', this.setTotal);
	  	window.addEventListener('keyup', this.notShow);
	  }
	}
</script>