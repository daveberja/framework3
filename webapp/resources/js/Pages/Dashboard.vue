<template>
  <div class="bg-black min-h-screen text-white">
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

    <div class="container mx-auto p-6">
      <SimulationControls 
        :frequency="frequency" 
        @updateFrequency="updateFrequency" 
        :amplitude="amplitude" 
        @updateAmplitude="updateAmplitude"
        :duration="duration"
        @updateDuration="updateDuration"
      />

      <WaveformDisplay ref="waveformRef" />

      <RecentTests :tests="recentTests" />
    </div>
  </div>
</template>

<script>
import SimulationControls from './SimulationControls.vue';
import WaveformDisplay from './WaveformDisplay.vue';
import RecentTests from './RecentTests.vue';

export default {
  components: {
    SimulationControls,
    WaveformDisplay,
    RecentTests
  },
  data() {
    return {
      frequency: 30,
      amplitude: 30,
      duration: 60,
      recentTests: [
        { id: '#001', batteryType: '12N12', status: 'Completed', duration: '2 hrs', statusColor: 'text-green-400' },
        { id: '#002', batteryType: '12N12-3B', status: 'In Progress', duration: '1 hr', statusColor: 'text-yellow-400' },
        { id: '#003', batteryType: '12N12', status: 'Error', duration: '30 mins', statusColor: 'text-red-400' },
      ]
    };
  },
  methods: {
    updateFrequency(newFrequency) {
      this.frequency = newFrequency;
      this.$refs.waveformRef.updateFrequency(newFrequency);
    },
    updateAmplitude(newAmplitude) {
      this.amplitude = newAmplitude;
    },
    updateDuration(newDuration) {
      this.duration = newDuration;
    }
  }
};
</script>

<style scoped>
/* Add any additional styles here */
</style>
