<template>
    <header class="flex justify-between items-center p-6 bg-gray-800 shadow-lg text-white">
        <a href="/dashboard" class="bg-blue-600 px-4 py-2 rounded-lg hover:bg-blue-500 transition">Back</a>
        <h1 class="text-2xl font-semibold">Simulation Dashboard</h1>
        <a href="/" class="bg-blue-600 px-4 py-2 rounded-lg hover:bg-blue-500 transition">Home</a>
    </header>

    <div class="flex justify-between p-10 bg-gray-900 min-h-screen text-white">
        <div class="w-1/9 p-4 border-r border-gray-600">
            <h2 class="text-lg font-bold text-blue-300 mb-4 text-center">Past Simulations</h2>
            <div class="bg-gray-800 shadow-lg rounded-lg p-4">
                <h3 class="text-md font-semibold text-center mb-4">LEAD ACID BATTERY TESTING RESULT</h3>
                <table class="min-w-full border border-gray-600">
                    <thead>
                        <tr class="bg-gray-700">
                            <th class="border px-4 py-2 text-left">Start Time</th>
                            <th class="border px-4 py-2 text-left">End Time</th>
                            <th class="border px-4 py-2 text-left">Frequency (Hz)</th>
                            <th class="border px-4 py-2 text-left">Amplitude</th>
                            <th class="border px-4 py-2 text-left">Acceleration (m/s²)</th>
                            <th class="border px-4 py-2 text-left">Duration</th>
                            <th class="border px-4 py-2 text-left">Battery Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="simulation in pastSimulations"
                            :key="simulation.id"
                            @click="selectSimulation(simulation)"
                            class="cursor-pointer hover:bg-gray-600 transition"
                        >
                            <td class="border px-4 py-2">{{ simulation.startTime }}</td>
                            <td class="border px-4 py-2">{{ simulation.endTime }}</td>
                            <td class="border px-4 py-2">{{ simulation.frequency }}</td>
                            <td class="border px-4 py-2">{{ simulation.amplitude }}</td>
                            <td class="border px-4 py-2">{{ simulation.acceleration }}</td>
                            <td class="border px-4 py-2">{{ formatDuration(simulation.duration) }}</td>
                            <td class="border px-4 py-2">{{ simulation.batteryName }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="flex flex-col w-1/3 p-4 items-center">
            <h2 class="text-lg font-bold text-blue-300 mb-4 text-center">Selected Simulation</h2>
            <div v-if="selectedSimulation" class="bg-gray-800 shadow-lg rounded-lg p-4 mb-4">
                <h3 class="font-semibold text-md">You selected: <span class="text-blue-400">{{ selectedSimulation.batteryName }}</span></h3>
                <p><strong>Start Time:</strong> {{ selectedSimulation.startTime }}</p>
                <p><strong>End Time:</strong> {{ selectedSimulation.endTime }}</p>
                <p><strong>Frequency:</strong> {{ selectedSimulation.frequency }} Hz</p>
                <p><strong>Amplitude:</strong> {{ selectedSimulation.amplitude }}</p>
                <p><strong>Acceleration:</strong> {{ selectedSimulation.acceleration }} m/s²</p>
                <p><strong>Duration:</strong> {{ formatDuration(selectedSimulation.duration) }}</p>
                <div class="mt-4 flex justify-center space-x-2">
                    <button @click="deleteSimulation" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-500 transition">Delete</button>
                    <button @click="unselectSimulation" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-500 transition">Unselect</button>
                    <button @click="useSimulation" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-500 transition">Use</button>
                </div>
            </div>
            <div v-else class="text-gray-400 text-center mb-4">No simulation selected.</div>
        </div>

        <div class="w-1/3 p-4">
            <h2 class="text-lg font-bold text-blue-300 mb-4 text-center">Deleted Simulations</h2>
            <div class="bg-gray-800 shadow-lg rounded-lg p-4">
                <ul v-if="deletedSimulations.length > 0">
                    <li v-for="deleted in deletedSimulations" :key="deleted.id" class="flex justify-between items-center py-2 border-b border-gray-600">
                        <span>{{ deleted.batteryName }}</span>
                        <div>
                            <button @click="retrieveSimulation(deleted)" class="bg-green-600 text-white px-2 py-1 rounded-lg hover:bg-green-500 transition">Retrieve</button>
                            <button @click="permanentlyDeleteSimulation(deleted)" class="bg-red-700 text-white px-2 py-1 rounded-lg hover:bg-red-600 transition">Delete Permanently</button>
                        </div>
                    </li>
                </ul>
                <div v-else class="text-gray-400 text-center p-2">
                    No deleted simulations.
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            pastSimulations: [],
            selectedSimulation: null,
            deletedSimulations: [],
            showDeleted: false,
        };
    },
    created() {
        this.fetchPastSimulations();
    },
    methods: {
        fetchPastSimulations() {
            fetch('/api/past-simulations') // Adjust the endpoint based on your setup
                .then(response => response.json())
                .then(data => {
                    this.pastSimulations = data; // Assuming the API returns an array of simulations
                })
                .catch(error => {
                    console.error('Error fetching simulations:', error);
                });
        },
        selectSimulation(simulation) {
            this.selectedSimulation = simulation;
        },
        deleteSimulation() {
            if (this.selectedSimulation) {
                this.deletedSimulations.push(this.selectedSimulation); // Move to deleted simulations
                this.pastSimulations = this.pastSimulations.filter(sim => sim.id !== this.selectedSimulation.id);
                this.showDeleted = true; // Automatically show deleted simulations
                this.selectedSimulation = null; // Clear selection
            }
        },
        unselectSimulation() {
            this.selectedSimulation = null;
        },
        useSimulation() {
            // Logic to use the selected simulation
        },
        formatDuration(duration) {
            const seconds = Math.floor(duration / 1000);
            const minutes = Math.floor(seconds / 60);
            return `${minutes} minutes ${seconds % 60} seconds`;
        },
        retrieveSimulation(deleted) {
            this.pastSimulations.push(deleted);
            this.deletedSimulations = this.deletedSimulations.filter(sim => sim.id !== deleted.id);
        },
        permanentlyDeleteSimulation(deleted) {
            this.deletedSimulations = this.deletedSimulations.filter(sim => sim.id !== deleted.id);
        }
    }
};
</script>

<style scoped>
/* Add your styles here */
</style>
