<template>
	<header>
    <nav class="nav has-shadow">
      <div class="container">
        <div class="nav-left">
          <span class="nav-item">
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
      </div>
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