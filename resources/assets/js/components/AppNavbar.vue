<template>
	<header>
    <nav class="nav">
      <div class="nav-left">
        <span class="nav-item is-brand">
          <a href="#">
            Dashboard
          </a>
        </span>
        <span class="nav-item">
          <app-dropdown></app-dropdown>
        </span>
      </div>

      <span class="nav-toggle">
        <span></span>
        <span></span>
        <span></span>
      </span>
    </nav>
  </header>
</template>

<script>
  Vue.component('app-dropdown', require('./AppDropdown.vue'));

	export default {
		name: 'app-navbar',

    components: [
      'app-dropdown'
    ]
	}
</script>