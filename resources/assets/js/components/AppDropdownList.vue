<template>
	<div id="dropdown-list" class="box dropdown-container">
		<div class="level">
			<div clas="level-left">
				<div class="level-item">
					<h5>
						Notifications <span :class="{'is-invisible' : ! hasUnread}">({{ total }})<span>
					</h5>
				</div>
			</div>
			<div class="level-right">
				<div class="level-item">
					<a href="#" @click="removeAll">
						<small :class="{'is-invisible' : ! hasUnread}">
					  	Mark All Read
						</small>
					</a>
				</div>
			</div>
		</div>
		<div class="dropdown-list">
			<ul>
				<app-notification v-for="(notification, index) in notifications" :notification="notification" :index="index" @remove="remove(index)">
				</app-notification>
			</ul>
		</div>
	</div>
</template>

<script>
	Vue.component('app-notification', require('./AppNotification.vue'));

	export default {
		name: 'app-dropdown-list',

		components: [
			'app-notification'
		],

		data() {
	  	return {
		  	notifications: [],

				total: 0,
	  	}
	  },

	  methods: {
	  	remove(index) {
	  		this.notifications.splice(index, 1);
	  		this.setTotal(this.total - 1);
	  	},

	  	removeAll() {
	  		this.notifications.splice(0, this.notifications.length);
	  		this.setTotal(0);
	  	},

	  	addNotification(notification) {
	  		this.notifications.unshift(notification);
	  		this.setTotal(this.total + 1);
	  	},

	  	setTotal(total) {
	  		this.total = total;
	  		this.$root.$emit('total-updated', this.total);
	  	}
	  },

	  computed: {
	  	hasUnread: function () {
	  		return this.total > 0
	  	}
	  },

	  mounted() {
	  	this.setTotal(this.notifications.length);
	  },

	  created() {
	  	this.$root.$on('notify', this.addNotification);
	  }
	}
</script>