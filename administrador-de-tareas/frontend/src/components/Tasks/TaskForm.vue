<template>
    <div class="container mx-auto">
      <h2 class="text-2xl font-bold mb-4">Crear Tarea</h2>
      <form @submit.prevent="createTask" class="space-y-4">
        <div>
          <label for="title" class="block font-semibold">Título</label>
          <input v-model="title" type="text" id="title" class="w-full border rounded-md px-4 py-2">
        </div>
        <div>
          <label for="description" class="block font-semibold">Descripción</label>
          <textarea v-model="description" id="description" class="w-full border rounded-md px-4 py-2"></textarea>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md">Crear Tarea</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    name: "TaskForm",
    data() {
      return {
        title: '',
        description: ''
      };
    },
    methods: {
      createTask() {
        // Lógica para crear una tarea utilizando la API
        // Aquí se debe hacer la llamada HTTP para crear la tarea
        // Ejemplo de llamada con axios:
        // axios.post('http://localhost:8000/tasks', { title: this.title, description: this.description })
        //   .then(response => {
        //     console.log('Task created successfully:', response.data);
        //     // Lógica adicional si es necesaria
        //   })
        //   .catch(error => {
        //     console.error('Error creating task:', error);
        //   });
  
        // Supongamos que la tarea se crea correctamente
        console.log('Task created successfully');
        // Lógica adicional si es necesaria
      }
    }
  }
  </script>
  