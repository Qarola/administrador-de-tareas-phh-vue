<template>
    <div class="container mx-auto">
      <h2 class="text-2xl font-bold mb-4">Comentarios</h2>
      <form @submit.prevent="addComment" class="space-y-4">
        <div>
          <label for="comment" class="block font-semibold">Comentario</label>
          <textarea v-model="comment" id="comment" class="w-full border rounded-md px-4 py-2"></textarea>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md">Agregar Comentario</button>
      </form>
      <div class="mt-4">
        <ul>
          <li v-for="comment in comments" :key="comment.id" class="border rounded-md px-4 py-2">
            {{ comment.text }}
          </li>
        </ul>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: "TaskComment",
    data() {
      return {
        comment: '',
        comments: []
      };
    },
    methods: {
      addComment() {
        // Lógica para agregar un comentario utilizando la API
        // Aquí se debe hacer la llamada HTTP para agregar el comentario
        // Ejemplo de llamada con axios:
        // axios.post(`http://localhost:8000/tasks/${taskId}/comments`, { text: this.comment })
        //   .then(response => {
        //     console.log('Comment added successfully:', response.data);
        //     // Lógica adicional si es necesaria
        //   })
        //   .catch(error => {
        //     console.error('Error adding comment:', error);
        //   });
  
        // Supongamos que el comentario se agrega correctamente
        const newComment = { id: this.comments.length + 1, text: this.comment };
        this.comments.push(newComment);
        this.comment = ''; // Limpiar el campo de comentario
        console.log('Comment added successfully');
        // Lógica adicional si es necesaria
      }
    }
  }
  </script>
  