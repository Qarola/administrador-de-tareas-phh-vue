<template>
    <div class="max-w-4xl mx-auto mt-8">
      <h2 class="text-2xl font-semibold mb-4">Generar Reporte de Tareas</h2>
  
      <!-- Formulario para seleccionar el rango de fechas -->
      <div class="flex flex-col space-y-4">
        <!-- Elementos de selección de fecha -->
        <div class="flex space-x-4">
          <!-- Campo de selección de fecha de inicio -->
          <input type="date" class="px-12 py-2 border rounded-md mx-2" v-model="startDate">
  
          <!-- Campo de selección de fecha de fin -->
          <input type="date" class="px-12 py-2 border rounded-md" v-model="endDate">
        </div>
  
        <!-- Botón para generar reporte -->
        <button @click="generateReport" class="px-4 py-2 bg-blue-600 text-white rounded-md mt-4">
          Generar Reporte
        </button>
      </div>
  
  
      <!-- Contenido de la tabla de tareas -->
      <div class="overflow-x-auto">
        <table class="table-auto border-collapse w-full" id="report-table">
          <!-- Encabezados de la tabla -->
          <thead>
            <tr class="bg-gray-200">
              <th class="px-4 py-2">Título</th>
              <th class="px-4 py-2">Estado</th>
              <th class="px-4 py-2">Empleado</th>
              <th class="px-4 py-2">Tiempo de Completado</th>
            </tr>
          </thead>
          <!-- Datos de las tareas -->
          <tbody>
            <tr v-for="task in reportData" :key="task.id">
              <td class="border px-4 py-2">{{ task.title }}</td>
              <td class="border px-4 py-2">{{ task.status }}</td>
              <td class="border px-4 py-2">{{ task.assigned_to }}</td>
              <td class="border px-4 py-2">{{ task.time_completed }}</td>
            </tr>
          </tbody>
        </table>
      </div>
  
      <!-- Botón para descargar el reporte como PDF -->
      <button @click="downloadPDF" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-md">
        Descargar PDF
      </button>
    </div>
  </template>
  
  <script>
  import { useStore } from 'vuex';
  import { ref } from 'vue';
import 'jspdf-autotable';
  
export default {
  setup() {
    const startDate = ref('');
    const endDate = ref('');
    const store = useStore();
  
    const generateReport = async () => {
      await store.dispatch('fetchReportData', { startDate: startDate.value, endDate: endDate.value });
    };
  
    const downloadPDF = async () => {
      await store.dispatch('generatePDF');
    };
  
    return {
      startDate,
      endDate,
      generateReport,
      downloadPDF,
    };
  },
};
  </script>
  
  <style>
  /* Estilos adicionales según sea necesario */
  </style>
  