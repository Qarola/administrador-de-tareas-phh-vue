<template>
    <div class="max-w-md mx-auto mt-8 border rounded-lg overflow-hidden shadow-lg">
      <div class="bg-white px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">Crear Nueva Tarea</h3>
      </div>
      <div class="bg-gray-50 px-4 py-5 sm:p-6">
        <form @submit.prevent="createTask" class="space-y-6">
          <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
            <input v-model="title" type="text" id="title" name="title" autocomplete="off" required
              class="mt-1 p-2 block w-full border-gray-300 rounded-md">
          </div>
          <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
            <textarea v-model="description" id="description" name="description" rows="3"
              class="mt-1 p-2 block w-full border-gray-300 rounded-md"></textarea>
          </div>
          <div>
            <label for="assignedTo" class="block text-sm font-medium text-gray-700">Asignado a</label>
            <input v-model="assignedTo" type="text" id="assignedTo" name="assignedTo" autocomplete="off" required
              class="mt-1 p-2 block w-full border-gray-300 rounded-md">
          </div>
          <div>
            <label for="status" class="block text-sm font-medium text-gray-700">Estado</label>
            <select v-model="status" id="status" name="status" autocomplete="off" required
              class="mt-1 p-2 block w-full border-gray-300 rounded-md">
              <option disabled value="">Seleccionar estado</option>
              <option v-for="option in statusOptions" :key="option" :value="option">{{ option }}</option>
            </select>
          </div>
          <div>
            <label for="comment" class="block text-sm font-medium text-gray-700">Comentario</label>
            <textarea v-model="comment" id="comment" name="comment" rows="3"
              class="mt-1 p-2 block w-full border-gray-300 rounded-md"></textarea>
          </div>
          <div>
            <label for="file" class="block text-sm font-medium text-gray-700">Adjuntar Archivo</label>
            <input type="file" id="file" name="file" class="mt-1 p-2 block w-full border-gray-300 rounded-md">
          </div>
          <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Crear Tarea</button>
          </div>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: "TaskCreate",
    data() {
      return {
        title: '',
        description: '',
        assignedTo: '',
        status: '',
        comment: '',
        statusOptions: ['Pendiente', 'En Proceso', 'Bloqueado', 'Completado']
      };
    },
    methods: {
    createTask() {
      const taskData = {
        title: this.title,
        description: this.description,
        assignedTo: this.assignedTo,
        status: this.status,
        comment: this.comment
      };
      
      // Llama a la acción para crear la tarea con los datos recopilados
      this.$store.dispatch('createTask', taskData)
        .then(() => {
          // Si se crea la tarea con éxito, reinicia el formulario
          this.resetForm();
        })
        .catch(error => {
          // Maneja cualquier error que ocurra durante la creación de la tarea
          console.error('Error al crear la tarea:', error);
        });
    },
    resetForm() {
      // Reinicia los campos del formulario después de crear la tarea
      this.title = '';
      this.description = '';
      this.assignedTo = '';
      this.status = '';
      this.comment = '';
      // También puedes hacer otras acciones necesarias, como cerrar el formulario o mostrar un mensaje de éxito
    }
  }
  };
  </script>
  
  <style>
  /* Estilos adicionales según sea necesario */
  </style>
  