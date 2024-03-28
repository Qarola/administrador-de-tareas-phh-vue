<template>
  <div class="container mx-auto">
    <h2 class="text-2xl font-bold mb-4">Detalles de la tarea</h2>
    <div class="bg-white shadow-md p-6 rounded-lg">
      <h3 class="text-lg font-semibold">{{ task.title }}</h3>
      <p class="mt-2 text-gray-700">{{ task.description }}</p>
      <p class="mt-2 text-gray-700">Estado: {{ task.status }}</p>
    </div>
  </div>
</template>

<script>
export default {
  name: "TaskDetail",
  data() {
    return {
      task: {}
    };
  },
  mounted() {
    // Lógica para obtener los detalles de la tarea desde la API
    this.fetchTask();
  },
  methods: {
    fetchTask() {
      // Lógica para obtener los detalles de la tarea desde la API
      // Aquí se debe hacer la llamada HTTP para obtener los detalles de la tarea
      // Ejemplo de llamada con axios:
      // axios.get(`http://localhost:8000/tasks/${this.$route.params.id}`)
      //   .then(response => {
      //     this.task = response.data;
      //   })
      //   .catch(error => {
      //     console.error('Error fetching task details:', error);
      //   });
      
      // Supongamos que los detalles de la tarea son obtenidos correctamente
      this.task = {
        id: 1,
        title: 'Tarea 1',
        description: 'Descripción de la tarea 1',
        status: 'Pendiente'
      };
    }
  }
}
</script>

<style scoped>
.container {
  padding: 20px;
}

.bg-white {
  background-color: #ffffff;
}

.shadow-md {
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

.rounded-lg {
  border-radius: 0.5rem;
}

.text-gray-700 {
  color: #4a5568;
}
</style>
