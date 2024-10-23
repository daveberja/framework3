<template>
    <div class="bg-gradient-to-r from-blue-50 to-blue-100 min-h-screen"> <!-- Light gradient background -->
      <header class="bg-blue-700 flex justify-between items-center p-6 shadow-lg"> <!-- Darker header -->
        <div class="flex items-center">
          <a href="/dashboard" class="text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">Back</a>
          <h1 class="text-3xl text-white font-bold mx-auto">Simulation</h1>
        </div>
        <nav class="flex items-center">
          <a href="/" class="text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">Home</a>
        </nav>
      </header>
  
      <div class="relative isolate px-6 pt-4 lg:px-8">
        <div class="max-w-5xl mx-auto sm:py-4 flex flex-col lg:flex-row"> <!-- Centered container -->
          <div class="flex-1"> <!-- Left side for control parameters -->
            <div class="text-center mb-6">
              <h2 class="text-2xl font-bold text-gray-900">Control Parameters</h2>
              <p class="mt-2 text-lg text-gray-700">
                Adjust the parameters for your simulation below.
              </p>
            </div>
  
            <!-- Outer Card -->
            <div class="p-8 rounded-xl bg-white shadow-xl border border-gray-300 transition-transform transform hover:scale-105"> <!-- Enhanced card style -->
              <div class="space-y-6">
  
                <!-- Frequency Control -->
                <div>
                  <label class="block text-base font-semibold text-gray-900">Frequency (Hz)</label>
                  <input type="range" min="0" max="100" v-model="sliderValueFrequency" step="10" class="slider w-full mt-2" />
                  <span class="text-blue-600 font-semibold">{{ sliderValueFrequency }} Hz</span>
                </div>
  
                <!-- Acceleration Control -->
                <div>
                  <label class="block text-base font-semibold text-gray-900">Acceleration (m/s²)</label>
                  <input type="range" min="0" max="100" v-model="sliderValueAcceleration" step="10" class="slider w-full mt-2" />
                  <span class="text-blue-600 font-semibold">{{ sliderValueAcceleration }} m/s²</span>
                </div>
  
                <!-- Duration Control -->
                <div>
                  <label class="block text-base font-semibold text-gray-900">Duration</label>
                  <div class="flex space-x-4 mb-4 mt-2">
                    <div class="flex flex-col w-1/3">
                      <label class="text-center text-gray-700">Hours</label>
                      <input type="number" v-model="durationHours" min="0" placeholder="HH" class="p-3 border border-gray-300 rounded-lg text-center focus:ring focus:ring-blue-500 transition" />
                    </div>
                    <div class="flex flex-col w-1/3">
                      <label class="text-center text-gray-700">Minutes</label>
                      <input type="number" v-model="durationMinutes" min="0" max="59" placeholder="MM" class="p-3 border border-gray-300 rounded-lg text-center focus:ring focus:ring-blue-500 transition" />
                    </div>
                    <div class="flex flex-col w-1/3">
                      <label class="text-center text-gray-700">Seconds</label>
                      <input type="number" v-model="durationSeconds" min="0" max="59" placeholder="SS" class="p-3 border border-gray-300 rounded-lg text-center focus:ring focus:ring-blue-500 transition" />
                    </div>
                  </div>
                </div>
              </div>
  
              <!-- Start Simulation Button -->
              <div class="text-center mt-6">
                <button @click="startSimulation" class="bg-blue-700 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-200 font-semibold shadow-md">
                  Start Simulation
                </button>
              </div>
            </div>
          </div>
  
          <!-- Waveform and Pie Chart Display Section on the Right Side -->
          <div class="mt-8 lg:mt-0 lg:ml-8 max-w-md w-full"> <!-- Add margin-top for mobile spacing -->
            <div class="mb-8"> <!-- Waveform Display Card -->
              <h2 class="text-2xl font-bold text-gray-900 mb-4">Waveform Display</h2>
              <canvas ref="waveformCanvas" class="border border-gray-300 w-full h-40 rounded-lg shadow-sm"></canvas>
            </div>
  
            <div> <!-- Countdown Pie Chart Card -->
              <h2 class="text-2xl font-bold text-gray-900 mb-4">Countdown Timer</h2>
              <canvas ref="pieChartCanvas" class="border border-gray-300 w-full h-40 rounded-lg shadow-sm"></canvas>
            </div>
          </div>
        </div>
  
        <!-- Frequency and Acceleration Readings Overlay -->
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        sliderValueFrequency: 50, // Initial value for the frequency slider
        sliderValueAcceleration: 50, // Initial value for the acceleration slider
        durationHours: 0, // Initial value for hours
        durationMinutes: 0, // Initial value for minutes
        durationSeconds: 0, // Initial value for seconds
        timer: null, // Timer reference
        totalTime: 0, // Total time in seconds
        elapsedTime: 0, // Elapsed time in seconds
      };
    },
    computed: {
      formattedTime() {
        const remainingTime = this.totalTime - this.elapsedTime;
        const hours = Math.floor(remainingTime / 3600);
        const minutes = Math.floor((remainingTime % 3600) / 60);
        const seconds = remainingTime % 60;
        return `${hours}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`; // Format as HH:MM:SS
      },
    },
    mounted() {
      this.drawWaveform();
      this.drawPieChart();
    },
    watch: {
      sliderValueFrequency() {
        this.drawWaveform();
      },
      sliderValueAcceleration() {
        this.drawWaveform();
      },
    },
    methods: {
      startSimulation() {
        this.elapsedTime = 0;
        this.totalTime = this.durationHours * 3600 + this.durationMinutes * 60 + this.durationSeconds;
        this.timer = setInterval(this.updateTimer, 1000);
        console.log(`Starting simulation with Frequency: ${this.sliderValueFrequency} Hz, Acceleration: ${this.sliderValueAcceleration} m/s², Duration: ${this.totalTime} seconds.`);
      },
      updateTimer() {
        if (this.elapsedTime < this.totalTime) {
          this.elapsedTime++;
          this.drawPieChart();
        } else {
          clearInterval(this.timer);
          this.timer = null;
          alert("Time's up!");
        }
      },
      drawWaveform() {
        const canvas = this.$refs.waveformCanvas;
        const ctx = canvas.getContext('2d');
        const width = canvas.width;
        const height = canvas.height;
        ctx.clearRect(0, 0, width, height); // Clear the canvas
  
        const frequency = this.sliderValueFrequency;
        const acceleration = this.sliderValueAcceleration;
  
        // Draw waveform
        ctx.beginPath();
        for (let x = 0; x < width; x++) {
          const y = height / 2 + Math.sin((x / width) * frequency * Math.PI * 2) * (acceleration / 2);
          ctx.lineTo(x, y);
        }
        ctx.strokeStyle = '#1d4ed8'; // Waveform color
        ctx.lineWidth = 2;
        ctx.stroke();
  
        // Draw overlay readings on the waveform
        ctx.fillStyle = 'rgba(255, 255, 255, 0.8)'; // White background for text
        ctx.fillRect(10, 10, 200, 60); // Rectangle background
        ctx.fillStyle = '#1d4ed8'; // Text color
        ctx.font = '16px Arial';
        ctx.fillText(`Frequency: ${frequency} Hz`, 20, 30);
        ctx.fillText(`Accel: ${acceleration} m/s²`, 20, 50);
      },
      drawPieChart() {
        const canvas = this.$refs.pieChartCanvas;
        const ctx = canvas.getContext('2d');
        const width = canvas.width;
        const height = canvas.height;
        const radius = Math.min(width, height) / 2;
        ctx.clearRect(0, 0, width, height); // Clear the canvas
  
        // Draw the elapsed time as a pie chart
        const totalTime = this.totalTime;
        const elapsedTime = this.elapsedTime;
        const startAngle = -Math.PI / 2;
  
        // Draw the elapsed time
        ctx.beginPath();
        ctx.arc(width / 2, height / 2, radius, startAngle, startAngle + (Math.PI * 2 * elapsedTime) / totalTime);
        ctx.lineTo(width / 2, height / 2);
        ctx.closePath();
        ctx.fillStyle = '#1d4ed8'; // Pie chart color
        ctx.fill();
  
        // Draw the remaining time
        ctx.beginPath();
        ctx.arc(width / 2, height / 2, radius, startAngle + (Math.PI * 2 * elapsedTime) / totalTime, startAngle + Math.PI * 2);
        ctx.lineTo(width / 2, height / 2);
        ctx.closePath();
        ctx.fillStyle = '#e5e7eb'; // Remaining time color
        ctx.fill();
  
        // Draw text in the center
        ctx.fillStyle = '#1d4ed8'; // Text color
        ctx.font = '24px Arial';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillText(this.formattedTime, width / 2, height / 2);
      },
    },
  };
  </script>
  
  <style scoped>
  .slider {
      -webkit-appearance: none;
      height: 6px;
      background: #ddd;
      border-radius: 5px;
      outline: none;
  }
  
  .slider::-webkit-slider-thumb {
      -webkit-appearance: none;
      appearance: none;
      width: 20px;
      height: 20px;
      background: #1d4ed8;
      border-radius: 50%;
      cursor: pointer;
  }
  
  .slider::-moz-range-thumb {
      width: 20px;
      height: 20px;
      background: #1d4ed8;
      border-radius: 50%;
      cursor: pointer;
  }
  </style>
  