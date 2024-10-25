<template>
    <div class="bg-gray-900 p-6 rounded-lg shadow-lg mb-6 border border-steins-green">
      <h2 class="text-xl font-semibold mb-4 text-steins-green">Simulation Controls</h2>
  
      <!-- Frequency Control -->
      <div class="mb-4">
        <label class="block mb-2 text-gray-300">Frequency: {{ frequency }} Hz</label>
        <input
          type="range"
          min="1"
          max="100"
          :value="frequency"
          @input="onFrequencyChange"
          class="slider"
        />
      </div>
  
      <!-- Amplitude Control -->
      <div class="mb-4">
        <label class="block mb-2 text-gray-300">Amplitude: {{ amplitude }}</label>
        <input
          type="range"
          min="1"
          max="100"
          :value="amplitude"
          @input="onAmplitudeChange"
          class="slider"
        />
      </div>
  
      <!-- Duration Control -->
      <div class="mb-4">
        <label class="block mb-2 text-gray-300">Duration (minutes):</label>
        <input
          type="number"
          min="1"
          :value="duration"
          @input="onDurationChange"
          class="input-number"
          placeholder="Enter duration"
        />
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      frequency: Number,
      amplitude: Number,
      duration: Number,
    },
    methods: {
      onFrequencyChange(event) {
        const newFrequency = Number(event.target.value);
        this.$emit('updateFrequency', newFrequency);
      },
      onAmplitudeChange(event) {
        const newAmplitude = Number(event.target.value);
        this.$emit('updateAmplitude', newAmplitude);
      },
      onDurationChange(event) {
        const newDuration = Number(event.target.value);
        this.$emit('updateDuration', newDuration);
      }
    }
  };
  </script>
  
  <style scoped>
  .slider {
    -webkit-appearance: none;
    width: 100%; /* Make the slider full width */
    height: 8px; /* Adjust height */
    background: #3a3a3a; /* Slider background */
    border-radius: 5px; /* Rounded corners */
    outline: none; /* Remove outline */
    opacity: 0.8; /* Slightly transparent */
    transition: opacity 0.2s; /* Smooth transition */
  }
  
  .slider:hover {
    opacity: 1; /* Fully visible on hover */
  }
  
  .slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 20px; /* Thumb size */
    height: 20px; /* Thumb size */
    border-radius: 50%; /* Round thumb */
    background: #00FF41; /* Thumb color */
    cursor: pointer; /* Cursor on hover */
  }
  
  .slider::-moz-range-thumb {
    width: 20px; /* Thumb size */
    height: 20px; /* Thumb size */
    border-radius: 50%; /* Round thumb */
    background: #00FF41; /* Thumb color */
    cursor: pointer; /* Cursor on hover */
  }
  
  .input-number {
    width: 100%; /* Full width for input */
    padding: 8px; /* Padding */
    border: 1px solid #555; /* Border color */
    border-radius: 5px; /* Rounded corners */
    background: #333; /* Background color */
    color: #fff; /* Text color */
  }
  
  .input-number:focus {
    outline: none; /* Remove outline */
    border-color: #00FF41; /* Change border color on focus */
  }
  </style>
  