<template>
  <div class="bg-gray-100 min-h-screen">
    <header class="bg-white shadow">
      <nav class="flex items-center justify-between p-6 lg:px-8">
        <div class="flex lg:flex-1">
          <a href="#" class="-m-1.5 p-1.5">
            <span class="sr-only">Your Company</span>
            <img class="h-10 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600" alt="" />
          </a>
        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
          <a href="#" class="text-gray-700 hover:text-blue-600 transition duration-200">Log in</a>
        </div>
      </nav>
    </header>

    <main class="relative isolate px-6 pt-16 lg:px-8">
      <div class="mx-auto max-w-2xl py-16 text-center">
        <h1 class="text-5xl font-extrabold tracking-tight text-gray-900 sm:text-6xl">Vehicular Vibration Simulator Platform</h1>
        <p class="mt-4 text-lg text-gray-700">
          <span class="inline-block p-2 bg-blue-600 text-white rounded-lg shadow-md opacity-90">
            <strong>A project designed to test the capabilities and performance of lead acid batteries (12n12b or 12n12-3b) under simulated vibration conditions.</strong>
          </span>
        </p>
        <div class="mt-10 flex justify-center gap-x-6">
          <a href="/dashboard" class="block rounded-lg px-6 py-3 text-base font-semibold leading-7 text-white bg-blue-600 hover:bg-blue-700 transition duration-300 shadow-lg transform hover:scale-105">
            Get started
          </a>
          <a href="/" class="text-sm font-semibold leading-6 text-gray-900 hover:text-blue-600 transition duration-200">Learn more <span aria-hidden="true">→</span></a>
        </div>
      </div>

      <div class="flex flex-col items-center justify-center">
        <h2 class="text-3xl font-bold text-gray-900 mt-12">Key Features</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
          <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform duration-300 transform hover:scale-105">
            <img src="/images/sample.png" alt="Feature 1" class="w-full h-48 object-cover rounded-t-lg" />
            <div class="p-4">
              <h3 class="text-lg font-semibold mt-2">Real-time Monitoring</h3>
              <p class="text-gray-600">Monitor battery performance in real-time during tests.</p>
            </div>
          </div>
          <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform duration-300 transform hover:scale-105">
            <img src="/images/controllers.jpg" alt="Feature 2" class="w-full h-48 object-cover rounded-t-lg" />
            <div class="p-4">
              <h3 class="text-lg font-semibold mt-2">Customizable Parameters</h3>
              <p class="text-gray-600">Adjust vibration frequency and intensity to match real-world scenarios.</p>
            </div>
          </div>
          <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform duration-300 transform hover:scale-105">
            <img src="/images/analysis.jpg" alt="Feature 3" class="w-full h-48 object-cover rounded-t-lg" />
            <div class="p-4">
              <h3 class="text-lg font-semibold mt-2">Data Visualization</h3>
              <p class="text-gray-600">Visualize test results with detailed graphs and analytics.</p>
            </div>
          </div>
        </div>
      </div>
    </main>

    <footer class="bg-white py-6 mt-12">
      <div class="text-center">
        <p class="text-gray-600">&copy; 2024 Your Company. All rights reserved.</p>
      </div>
    </footer>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isMenuOpen: false,
    };
  },
  methods: {
    toggleMenu() {
      this.isMenuOpen = !this.isMenuOpen;
    },
  },
};
</script>

<style scoped>
/* Add any specific styles here */
</style>
