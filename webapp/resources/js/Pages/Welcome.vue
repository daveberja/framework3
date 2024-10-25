<template>
  <div class="min-h-screen bg-gradient-to-r from-black via-gray-900 to-black text-white">
    <div class="flex flex-col items-center justify-center min-h-screen">
      <div class="p-10 bg-gray-800 shadow-lg rounded-lg border border-steins-green">
        <h1 class="text-5xl font-bold text-steins-green mb-6 text-center">
          Vehicular Vibration Simulator Platform
        </h1>
        <p class="text-lg text-gray-300 text-center mb-4">
          A project designed to test the performance of lead-acid batteries under simulated vehicular vibrations.
        </p>
        <div class="text-center mt-4">
          <a href="/dashboard" class="px-6 py-2 text-gray-900 bg-steins-green rounded-full hover:bg-green-600 hover:text-black shadow-lg transition ease-in-out duration-300">
            Learn More
          </a>
        </div>
      </div>

      <div class="mt-8 max-w-2xl text-center">
        <h2 class="text-3xl font-semibold text-steins-green mb-4">Project Overview</h2>
        <p class="mb-2 text-gray-400">
          In collaboration with the Advanced Batteries Center, this project aims to address the need for standardized
          vibration testing facilities for batteries used in electric vehicles (EVs).
        </p>
        <p class="mb-4 text-gray-400">
          Our goal is to develop a cost-effective prototype that meets IEC standards for battery testing, providing an affordable
          alternative to existing vibration equipment in the Philippines.
        </p>
        <div class="flex justify-center gap-6">
          <div class="bg-gray-800 p-4 rounded-lg shadow-lg border border-steins-green">
            <h3 class="text-xl font-semibold text-steins-green">Client</h3>
            <p class="mt-2 text-gray-300">Advanced Batteries Center</p>
          </div>
          <div class="bg-gray-800 p-4 rounded-lg shadow-lg border border-steins-green">
            <h3 class="text-xl font-semibold text-steins-green">Estimated Cost</h3>
            <p class="mt-2 text-gray-300">₱14,473.56</p>
          </div>
          <div class="bg-gray-800 p-4 rounded-lg shadow-lg border border-steins-green">
            <h3 class="text-xl font-semibold text-steins-green">Project Timeline</h3>
            <p class="mt-2 text-gray-300">Prototype: 2nd Week of November</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  // Add any JavaScript functionality here if needed
};
</script>

<style scoped>
@tailwind base;
@tailwind components;
@tailwind utilities;

/* Steins;Gate Green */
.text-steins-green {
  color: #00FF41; /* Matrix green */
}

.bg-steins-green {
  background-color: #00FF41; /* Matrix green */
}

/* Custom slider for Steins;Gate theme */
.bg-steins-slider {
  background: linear-gradient(to right, #00FF41, #006400); /* Green gradient slider */
}

/* Glow effect when input values change */
.input-changed {
  animation: pulse 0.4s ease-in-out;
}

@keyframes pulse {
  0% {
    box-shadow: 0 0 10px #00FF41;
  }
  100% {
    box-shadow: none;
  }
}

/* Button hover effects */
button:hover {
  box-shadow: 0 0 10px #00FF41, 0 0 20px #00FF41;
}

/* Loader for Create/Update Simulation buttons */
.loader {
  border: 2px solid #f3f3f3;
  border-top: 2px solid #00FF41;
  border-radius: 50%;
  width: 16px;
  height: 16px;
  animation: spin 1s linear infinite;
  position: absolute;
  right: 10px;
}

@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

/* Glowing effect for text */
h2 {
  text-shadow: 0 0 10px #00FF41;
}

/* Tooltip styles */
label span {
  font-size: 0.8rem;
  margin-left: 5px;
}
</style>
