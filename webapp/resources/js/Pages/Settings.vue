<template>
    <div class="bg-dark text-white min-h-screen">
      <!-- Navbar -->
      <nav class="bg-gray-900 text-green-400 p-4 shadow-lg">
      <div class="container mx-auto flex justify-between">
        <h1 class="text-3xl font-semibold text-steins-green">Vibration Simulation Dashboard</h1>
        <div>
          <a href="/" class="px-6 py-2 text-white bg-steins-green rounded-full hover:bg-green-600 hover:text-black shadow-lg transition ease-in-out duration-300">
            Home
          </a>
          <a href="/reports" class="px-6 py-2 text-white bg-steins-green rounded-full hover:bg-green-600 hover:text-black shadow-lg transition ease-in-out duration-300">
            Reports
          </a>
          <a href="/dashboard" class="px-6 py-2 text-white bg-steins-green rounded-full hover:bg-green-600 hover:text-black shadow-lg transition ease-in-out duration-300">
            Settings
          </a>
        </div>
      </div>
    </nav>
  
      <!-- Settings Page Content -->
      <div class="container mx-auto p-6">
        <h1 class="text-4xl font-bold text-steins-green">Settings</h1>
        <p class="text-lg mt-4">Here you can configure your preferences and system settings.</p>
  
        <!-- Connection and Sensor Status Section -->
        <div class="mt-8 p-4 bg-gray-800 rounded-lg shadow-lg">
          <h2 class="text-2xl font-semibold text-steins-green">System Status</h2>
          <div class="mt-4">
            <p><strong>Platform Connection:</strong> {{ platformStatus }}</p>
            <p><strong>Vibration Sensor Status:</strong> {{ vibrationSensorStatus }}</p>
            <p><strong>Temperature Sensor Status:</strong> {{ temperatureSensorStatus }}</p>
            <p><strong>Platform IP Connection:</strong> {{ ipConnectionStatus }}</p>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import { ref, onMounted } from 'vue';

  
  export default {
    components: {
    },
    setup() {
      // State for connection statuses
      const platformStatus = ref('Checking...');
      const vibrationSensorStatus = ref('Checking...');
      const temperatureSensorStatus = ref('Checking...');
      const ipConnectionStatus = ref('Checking...');
  
      // Mock function to simulate connection and sensor status
      const checkPlatformStatus = () => {
        setTimeout(() => {
          platformStatus.value = Math.random() > 0.2 ? 'Connected' : 'Disconnected'; // 80% chance of being connected
        }, 1000);
      };
  
      const checkVibrationSensor = () => {
        setTimeout(() => {
          vibrationSensorStatus.value = Math.random() > 0.2 ? 'OK' : 'FAIL'; // 80% chance of being OK
        }, 1000);
      };
  
      const checkTemperatureSensor = () => {
        setTimeout(() => {
          temperatureSensorStatus.value = Math.random() > 0.2 ? 'OK' : 'FAIL'; // 80% chance of being OK
        }, 1000);
      };
  
      const checkIpConnection = () => {
        setTimeout(() => {
          ipConnectionStatus.value = Math.random() > 0.2 ? 'Reachable' : 'Unreachable'; // 80% chance of being reachable
        }, 1000);
      };
  
      // Simulate checking on component mount
      onMounted(() => {
        checkPlatformStatus();
        checkVibrationSensor();
        checkTemperatureSensor();
        checkIpConnection();
      });
  
      return {
        platformStatus,
        vibrationSensorStatus,
        temperatureSensorStatus,
        ipConnectionStatus,
      };
    },
  };
  </script>
  
  <style scoped>
  /* Add any styles you need here */
  </style>
  