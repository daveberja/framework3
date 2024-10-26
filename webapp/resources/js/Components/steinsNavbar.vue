<template>
  <nav class="navbar-container">
    <div class="flex space-x-6">
      <a
        href="/dashboard"
        class="nav-link"
        :class="{ 'active-link': isActive('/dashboard') }"
      >
        Dashboard
      </a>
      <a
        href="/reports"
        class="nav-link"
        :class="{ 'active-link': isActive('/reports') }"
      >
        Reports
      </a>
      <a
        href="/settings"
        class="nav-link"
        :class="{ 'active-link': isActive('/settings') }"
      >
        Settings
      </a>
    </div>
  </nav>
</template>

<script>
export default {
  name: 'Navbar',
  methods: {
    isActive(path) {
      return window.location.pathname === path;
    },
  },
};
</script>

<style scoped>
/* Scoped styles if additional specific styles are needed */
</style>
