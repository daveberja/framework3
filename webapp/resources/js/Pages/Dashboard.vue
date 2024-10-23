<template>
    <div class="bg-white">
      <header class="absolute inset-x-0 top-0 z-30 bg-gradient-to-r from-blue-600 to-blue-400 flex justify-between items-center p-4 shadow-lg">
        <div class="flex lg:flex-1">
          <h1 class="text-4xl sm:text-6xl tracking-tight text-white ml-4 font-extrabold">
            Testing Dashboard
          </h1>
        </div>
        <nav class="flex items-center justify-end" aria-label="Global">
          <div class="text-right mr-4">
            <a href="/" class="block rounded-lg px-4 py-2 text-base font-semibold leading-7 text-white bg-blue-800 hover:bg-blue-700 transition duration-200 shadow-md">
              Home
            </a>
          </div>
        </nav>
      </header>
  
      <main class="relative isolate px-6 pt-24 lg:px-8">
        <div class="mx-auto max-w-5xl py-32 sm:py-48 lg:py-56">
          <div class="text-center">
            <p class="mt-6 text-lg text-gray-800">
              <span class="inline-block p-4 bg-blue-500 text-white rounded-lg shadow-lg">
                Get started on your testing
              </span>
            </p>
  
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-10">
              <a href="/simulation" class="block rounded-lg p-6 text-lg font-semibold leading-7 text-white bg-blue-400 hover:bg-blue-500 transition duration-200 shadow-md transform hover:scale-105">
                <h3 class="text-2xl">Simulation</h3>
                <p class="mt-2 text-gray-100">Run and analyze your tests in real-time.</p>
              </a>
              <a href="/settings" class="block rounded-lg p-6 text-lg font-semibold leading-7 text-white bg-blue-400 hover:bg-blue-500 transition duration-200 shadow-md transform hover:scale-105">
                <h3 class="text-2xl">Settings</h3>
                <p class="mt-2 text-gray-100">Customize your testing parameters and preferences.</p>
              </a>
              <a href="/history" class="block rounded-lg p-6 text-lg font-semibold leading-7 text-white bg-blue-400 hover:bg-blue-500 transition duration-200 shadow-md transform hover:scale-105">
                <h3 class="text-2xl">History</h3>
                <p class="mt-2 text-gray-100">View past test results and analytics.</p>
              </a>
            </div>
          </div>
        </div>
      </main>
  
      <footer class="bg-gray-200 py-6">
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
        message: 'Hello Vue!' // This is the message you want to display
      };
    }
  }
  </script>
  
  <style scoped>
  /* Additional scoped CSS styles for enhancements */
  .header-bg {
    background: linear-gradient(to right, #3B82F6, #2563EB);
  }
  </style>
  