<template>
    <div class="container mx-auto p-6 bg-black text-white">
      <!-- Loading Screen -->
      <div v-if="isLoading" class="loading-screen">
        <div class="loading-text">Loading...</div>
      </div>
  
      <!-- Content -->
      <div :class="['content-container', isLoading ? 'fade-out' : 'fade-in']">
        <div class="d-flex justify-content-between mb-4">
          <h1 class="text-4xl font-bold text-primary">Simulation Reports</h1>
          <router-link to="/dashboard" class="btn btn-outline-light btn-hover">Dashboard</router-link>
        </div>
  
        <!-- Table for ID and Frequency -->
        <div class="table-responsive mb-4">
          <table class="table table-hover table-dark table-striped rounded shadow-lg">
            <thead>
              <tr>
                <th scope="col" class="table-header">ID</th>
                <th scope="col" class="table-header">Frequency</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="report in reports" :key="report.id">
                <td>{{ report.id }}</td>
                <td>{{ report.frequency }}</td>
              </tr>
            </tbody>
          </table>
        </div>
  
        <!-- Table for remaining report details -->
        <div class="table-responsive">
          <table class="table table-hover table-dark table-striped rounded shadow-lg">
            <thead>
              <tr>
                <th scope="col">Data Points</th>
                <th scope="col">Intensity</th>
                <th scope="col">Duration (seconds)</th>
                <th scope="col">Vibration Level</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="report in reports" :key="report.id">
                <td>
                  <button @click="openModal(report)" class="btn btn-success btn-hover">
                    View Data Points
                  </button>
                </td>
                <td>{{ report.intensity }}</td>
                <td>{{ report.duration }}</td>
                <td class="text-success">{{ report.vibration_level }}</td>
                <td>
                  <button @click="downloadXML(report)" class="btn btn-success btn-hover">
                    Download XML
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
  
        <!-- Pagination controls -->
        <div class="d-flex justify-content-center mt-4">
          <button @click="fetchReports(currentPage - 1)" :disabled="!prevPage" class="btn btn-outline-light me-2" :class="{ disabled: !prevPage }">
            Previous
          </button>
          <button @click="fetchReports(currentPage + 1)" :disabled="!nextPage" class="btn btn-outline-light ms-2" :class="{ disabled: !nextPage }">
            Next
          </button>
        </div>
      </div>
  
      <!-- Modal for displaying data points -->
      <div v-if="isModalOpen && selectedReport" class="modal fade show d-block" style="background-color: rgba(0, 0, 0, 0.7)">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content bg-black text-white border border-success">
            <div class="modal-header">
              <h5 class="modal-title">Data Points for Report {{ selectedReport.id }}</h5>
              <button type="button" class="btn-close btn-close-white" @click="closeModal"></button>
            </div>
            <div class="modal-body overflow-auto">
              <ul class="list-group">
                <li v-for="(point, index) in selectedReport.data_points" :key="index" class="list-group-item bg-black text-white">
                  <strong>Time:</strong> {{ point.time }}s, <strong>Frequency:</strong> {{ point.frequency }}Hz, <strong>Intensity:</strong> {{ point.intensity }}
                </li>
              </ul>
            </div>
            <div class="modal-footer">
              <button @click="closeModal" class="btn btn-outline-light btn-hover">
                Close
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        reports: [],
        selectedReport: null,
        isModalOpen: false,
        nextPage: null,
        prevPage: null,
        currentPage: 1,
        isLoading: false,
      };
    },
    methods: {
      async fetchReports(page = 1) {
        this.isLoading = true;
        try {
          const response = await fetch(`/api/simulation-reports/?page=${page}`);
          const data = await response.json();
          this.reports = data.results;
          this.nextPage = data.next;
          this.prevPage = data.previous;
          this.currentPage = page;
        } catch (error) {
          console.error('Failed to fetch reports:', error);
        } finally {
          this.isLoading = false;
        }
      },
      openModal(report) {
        this.selectedReport = report;
        this.isModalOpen = true;
      },
      closeModal() {
        this.selectedReport = null;
        this.isModalOpen = false;
      },
      generateXML(report) {
        let xml = `<?xml version="1.0" encoding="UTF-8"?>\n<simulationReport>\n`;
        xml += `<id>${report.id}</id>\n`;
        xml += `<frequency>${report.frequency}</frequency>\n`;
        xml += `<intensity>${report.intensity}</intensity>\n`;
        xml += `<duration>${report.duration}</duration>\n`;
        xml += `<vibrationLevel>${report.vibration_level}</vibrationLevel>\n`;
        xml += `<dataPoints>\n`;
  
        report.data_points.forEach((point) => {
          xml += `  <dataPoint>\n`;
          xml += `    <time>${point.time}</time>\n`;
          xml += `    <frequency>${point.frequency}</frequency>\n`;
          xml += `    <intensity>${point.intensity}</intensity>\n`;
          xml += `  </dataPoint>\n`;
        });
  
        xml += `</dataPoints>\n</simulationReport>`;
        return xml;
      },
      downloadXML(report) {
        const xmlData = this.generateXML(report);
        const blob = new Blob([xmlData], { type: 'application/xml' });
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = `simulation-report-${report.id}.xml`;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
      }
    },
    mounted() {
      this.fetchReports(); // Fetch reports when the component is mounted
    }
  };
  </script>
  
  <style scoped>
  /* Main container style */
  .container {
    background-color: black; /* Black background */
    color: white; /* White text */
  }
  
  /* Text colors */
  .text-primary {
    color: #28a745; /* Green primary text color */
  }
  
  /* Button hover effects */
  .btn-hover {
    transition: all 0.3s ease;
  }
  
  .btn-hover:hover {
    box-shadow: 0 0 10px #28a745, 0 0 20px #28a745; /* Green hover effect */
  }
  
  /* Loading screen styling */
  .loading-screen {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8); /* Darker loading screen */
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
  }
  
  .loading-text {
    font-size: 2rem;
    color: #28a745; /* Green loading text color */
    font-family: 'Courier New', Courier, monospace;
    animation: flicker 1.5s infinite;
  }
  
  /* Fade animations for content transition */
  .fade-in {
    opacity: 0;
    animation: fadeIn 0.6s ease-in-out forwards;
  }
  
  .fade-out {
    opacity: 1;
    animation: fadeOut 0.6s ease-in-out forwards;
  }
  
  @keyframes fadeIn {
    from {
      opacity: 0;
    }
    to {
      opacity: 1;
    }
  }
  
  @keyframes fadeOut {
    from {
      opacity: 1;
    }
    to {
      opacity: 0;
    }
  }
  
  /* Modal border */
  .modal-content {
    border: 2px solid #28a745; /* Green border */
  }
  
  /* Flickering effect for loading */
  @keyframes flicker {
    0%, 100% {
      opacity: 1;
    }
    50% {
      opacity: 0.5;
    }
  }
  
  /* Custom styles for report rows */
  .report-row {
    color: white; /* White text for reports */
  }
  
  .text-success {
    color: #28a745; /* Green color for vibration levels */
  }
  
  /* Header styles for tables */
  .table-header {
    background-color: #28a745; /* Green header background */
    color: white; /* White header text */
  }
  </style>
  