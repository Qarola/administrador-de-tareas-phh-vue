<template>
  <div class="flex justify-center items-center h-screen">
    <div class="max-w-3xl w-full p-8 bg-white rounded-lg shadow-md">
      <h2 class="text-2xl font-bold mb-4">Lista de Tareas</h2>
      <div v-if="tasks.length > 0">
        <ul>
          <li v-for="task in tasks" :key="task.id" class="border rounded-md p-4 mb-4 shadow-md">
            <h3 class="font-semibold text-lg">{{ task.title }}</h3>
            <p class="text-gray-600">{{ task.description }}</p>
            <div class="flex justify-between mt-2">
              <p class="text-gray-500">Estado: {{ task.status }}</p>
              <p class="text-gray-500">Asignado a: {{ task.assigned_to }}</p>
            </div>
            <button @click="deleteTask(task.id)" class="mt-2 bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-md shadow-sm transition-colors duration-300">
              Eliminar Tarea
            </button>
          </li>
        </ul>
      </div>
      <div v-else class="text-gray-500 italic">No hay tareas disponibles.</div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: "TaskList",
  data() {
    return {
      tasks: []
    };
  },
  mounted() {
    // Lógica para obtener la lista de tareas utilizando la API
    axios.get('http://locahost:8000/tasks')
      .then(response => {
        this.tasks = response.data;
      })
      .catch(error => {
        console.error('Error fetching tasks:', error);
      });
  },
  methods: {
    deleteTask(taskId) {
      // Lógica para eliminar una tarea utilizando la API
      axios.delete(`/api/tasks/${taskId}`)
        .then(() => {
          console.log('Task deleted successfully');
          // Actualiza la lista de tareas después de eliminar
          this.tasks = this.tasks.filter(task => task.id !== taskId);
        })
        .catch(error => {
          console.error('Error deleting task:', error);
        });
    }
  }
};
</script>
