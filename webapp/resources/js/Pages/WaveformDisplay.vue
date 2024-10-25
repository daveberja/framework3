<template>
    <div class="bg-gray-900 p-6 rounded-lg shadow-lg mb-6 border border-steins-green">
      <h2 class="text-xl font-semibold mb-4 text-steins-green">Waveform Display</h2>
      <canvas ref="canvas" width="800" height="300" class="w-full h-48 bg-black"></canvas>
      <p class="text-gray-300 text-center mt-4">Simulated Sensor Data in Real-Time</p>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        time: 0,
        canvas: null,
        ctx: null
      };
    },
    mounted() {
      this.canvas = this.$refs.canvas;
      this.ctx = this.canvas.getContext('2d');
      this.drawWave();
    },
    methods: {
      drawWave() {
        const midY = this.canvas.height / 2;
        const amplitude = 50;
        const frequency = 5; // Adjust as needed
  
        const animate = () => {
          this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
          this.ctx.beginPath();
          for (let x = 0; x < this.canvas.width; x++) {
            const y = midY + amplitude * Math.sin((x / this.canvas.width) * 2 * Math.PI * frequency + this.time);
            this.ctx.lineTo(x, y);
          }
          this.ctx.strokeStyle = '#00FF41'; // Green wave effect
          this.ctx.lineWidth = 2;
          this.ctx.stroke();
          this.time += 0.05;
          requestAnimationFrame(animate);
        };
  
        animate();
      },
      updateFrequency(newFrequency) {
        // Update the frequency as needed for wave drawing logic
      }
    }
  };
  </script>
  
  <style scoped>
  /* Add any additional styles here */
  </style>
  