<template>
    <div class="bg-gray-900 p-6 rounded-lg shadow-lg mb-6 border border-steins-green">
      <h2 class="text-xl font-semibold mb-4 text-steins-green">Recent Tests</h2>
      <table class="table-auto w-full text-left text-gray-300">
        <thead class="bg-gray-800">
          <tr>
            <th class="py-3 px-4 border-b border-gray-600">Test ID</th>
            <th class="py-3 px-4 border-b border-gray-600">Battery Type</th>
            <th class="py-3 px-4 border-b border-gray-600">Status</th>
            <th class="py-3 px-4 border-b border-gray-600">Duration</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(test, index) in tests" :key="index" class="hover:bg-gray-800 transition ease-in-out duration-200">
            <td class="py-3 px-4 border-b border-gray-700">{{ test.id }}</td>
            <td class="py-3 px-4 border-b border-gray-700">{{ test.batteryType }}</td>
            <td class="py-3 px-4 border-b border-gray-700" :class="test.statusColor">{{ test.status }}</td>
            <td class="py-3 px-4 border-b border-gray-700">{{ test.duration }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      tests: Array
    }
  };
  </script>
  
  <style scoped>
  /* Add any additional styles here */
  </style>
  