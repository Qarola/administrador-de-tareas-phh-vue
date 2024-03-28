<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
      <div>
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Recuperar Contraseña</h2>
      </div>
      <form class="mt-8 space-y-6" @submit.prevent="resetPassword">
        <div class="rounded-md shadow-sm -space-y-px">
          <div>
            <label for="email-address" class="sr-only">Correo Electrónico</label>
            <input v-model="email" id="email-address" name="email" type="email" autocomplete="email" required
              class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
              placeholder="Correo Electrónico">
          </div>
        </div>

        <div>
          <button type="submit"
            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <!-- Heroicon name: solid/lock-closed -->
              <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                  d="M10 12a2 2 0 100-4 2 2 0 000 4zM4 8a4 4 0 118 0 4 4 0 01-8 0zm16 2a2 2 0 01-2 2h-4v2a2 2 0 11-4 0v-2H2a2 2 0 01-2-2V6a2 2 0 012-2h16a2 2 0 012 2v4z"
                  clip-rule="evenodd" />
              </svg>
            </span>
            Enviar Correo de Recuperación
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'ForgotPassword',
  data() {
    return {
      email: '', // Variable para almacenar el correo electrónico
    };
  },
  methods: {
    // Método para enviar la solicitud de restablecimiento de contraseña
    resetPassword() {
      // Datos que se enviarán al backend
      const requestData = {
        email: this.email,
      };

      // Hace la solicitud POST al backend
      axios.post('http://localhost:8000/forgot-password', requestData)
        .then(response => {
          // Maneja la respuesta del backend si es necesario
          console.log('Respuesta del servidor:', response.data);
        })
        .catch(error => {
          // Maneja cualquier error que ocurra durante la solicitud
          console.error('Error al enviar la solicitud:', error);
        });
    },
  },
};
</script>
