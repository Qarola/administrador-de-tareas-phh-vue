<template>
    <div class="container mx-auto">
      <h2 class="text-2xl font-bold mb-4">Adjuntar Archivo</h2>
      <form @submit.prevent="uploadAttachment" class="space-y-4">
        <div>
          <label for="file" class="block font-semibold">Archivo</label>
          <input type="file" id="file" @change="handleFileChange" class="w-full border rounded-md px-4 py-2">
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md">Adjuntar Archivo</button>
      </form>
      <div v-if="attachment">
        <p class="mt-4">Archivo adjuntado: {{ attachment.name }}</p>
        <button @click="deleteAttachment" class="mt-2 bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-md">Eliminar Archivo</button>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: "TaskAttachment",
    data() {
      return {
        attachment: null,
        file: null
      };
    },
    methods: {
      handleFileChange(event) {
        this.file = event.target.files[0];
      },
      uploadAttachment() {
        // Lógica para subir un archivo adjunto utilizando la API
        // Aquí se hace la llamada HTTP para subir el archivo adjunto
        // Ejemplo de llamada con axios:
        // const formData = new FormData();
        // formData.append('file', this.file);
        // axios.post(`http.//localhost:8000/api/tasks/${taskId}/attachments`, formData)
        //   .then(response => {
        //     console.log('Attachment uploaded successfully:', response.data);
        //     // Lógica adicional si es necesaria
        //   })
        //   .catch(error => {
        //     console.error('Error uploading attachment:', error);
        //   });
  
        // Supongamos que el archivo adjunto se sube correctamente
        this.attachment = this.file;
        console.log('Attachment uploaded successfully');
        // Lógica adicional si es necesaria
      },
      deleteAttachment() {
        // Lógica para eliminar el archivo adjunto utilizando la API
        // Aquí se debe hacer la llamada HTTP para eliminar el archivo adjunto
        // Ejemplo de llamada con axios:
        // axios.delete(`/api/tasks/${taskId}/attachments/${attachmentId}`)
        //   .then(response => {
        //     console.log('Attachment deleted successfully');
        //     this.attachment = null;
        //     // Lógica adicional si es necesaria
        //   })
        //   .catch(error => {
        //     console.error('Error deleting attachment:', error);
        //   });
  
        // Supongamos que el archivo adjunto se elimina correctamente
        this.attachment = null;
        console.log('Attachment deleted successfully');
        // Lógica adicional si es necesaria
      }
    }
  }
  </script>
  