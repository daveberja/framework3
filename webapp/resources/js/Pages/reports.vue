<template>
  <div class="bg-gray-900 min-h-screen text-white">
    <Navbar />

    <div v-if="isLoading" class="loading-screen">
      <div class="loading-text">Loading...</div>
    </div>

    <div class="container content-container p-6" :class="{ 'fade-out': isLoading, 'fade-in': !isLoading }">
      <div class="table-responsive">
        <table class="table table-hover table-dark table-striped rounded shadow-lg">
          <thead>
            <tr>
              <th>ID</th>
              <th>Data Points</th>
              <th>Frequency</th>
              <th>Intensity</th>
              <th>Duration (seconds)</th>
              <th>Vibration Level</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="report in reports" :key="report.id">
              <td>{{ report.id }}</td>
              <td>
                <button @click="openModal(report)" class="btn btn-steins-blue btn-hover-blue">View Data Points</button>
              </td>
              <td>{{ report.frequency }}</td>
              <td>{{ report.intensity }}</td>
              <td>{{ report.duration }}</td>
              <td>{{ report.vibration_level }}</td>
              <td>
                <button @click="downloadXML(report)" class="btn steins-btn btn-hover-green">Download XML</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="pagination-container d-flex justify-content-between mt-4">
        <button @click="fetchReports(currentPage - 1)" :disabled="!prevPage" class="btn steins-btn">
          Previous
        </button>
        <button @click="fetchReports(currentPage + 1)" :disabled="!nextPage" class="btn steins-btn">
          Next
        </button>
      </div>
    </div>

    <div v-if="isModalOpen && selectedReport" class="modal fade show d-block" style="background-color: rgba(0, 0, 0, 0.7)">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Data Points for Report {{ selectedReport.id }}</h5>
            <button type="button" class="btn-close btn-close-white" @click="closeModal"></button>
          </div>
          <div class="modal-body overflow-auto">
            <ul class="list-group">
              <li v-for="(point, index) in selectedReport.data_points" :key="index" class="list-group-item bg-dark text-white">
                <strong>Time:</strong> {{ point.time }}s, <strong>Frequency:</strong> {{ point.frequency }}Hz, <strong>Intensity:</strong> {{ point.intensity }}
              </li>
            </ul>
          </div>
          <div class="modal-footer">
            <button @click="closeModal" class="btn btn-outline-light">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from '../Components/steinsNavbar.vue';

export default {
  name: 'SimulationReports',
  components: { Navbar },
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
        const response = await axios.get('/simulation-results', {
          params: { perPage: 10, page: page }, // Adjust perPage as needed
        });
        this.reports = response.data.data; // Access paginated data
        this.nextPage = response.data.next_page_url;
        this.prevPage = response.data.prev_page_url;
        this.currentPage = page;
      } catch (error) {
        console.error('Failed to fetch reports:', error);
        this.reports = [];
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
      xml += `<vibrationLevel>${report.vibration_level}</vibrationLevel>\n<dataPoints>\n`;

      report.data_points?.forEach((point) => {
        xml += `  <dataPoint>\n    <time>${point.time}</time>\n    <frequency>${point.frequency}</frequency>\n    <intensity>${point.intensity}</intensity>\n  </dataPoint>\n`;
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
    },
  },
  mounted() {
    this.fetchReports();
  },
};
</script>

<style scoped>
/* Additional styles if specific overrides are needed */
</style>
