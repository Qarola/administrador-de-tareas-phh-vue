<template>
  <div class="max-w-md mx-auto mt-8">
    <h2 class="text-2xl font-semibold text-gray-900">Registrar Usuario</h2>
    <form @submit.prevent="registerUser" class="mt-4 space-y-6">
      <div>
        <label for="name" class="sr-only">Nombre</label>
        <input v-model="name" type="text" id="name" name="name" required
          class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
          placeholder="Nombre del usuario">
      </div>
      <div>
        <label for="email" class="sr-only">Correo electrónico</label>
        <input v-model="email" type="email" id="email" name="email" autocomplete="email" required
          class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
          placeholder="Correo electrónico">
      </div>
      <div>
        <label for="password" class="sr-only">Contraseña</label>
        <input v-model="password" type="password" id="password" name="password" autocomplete="new-password" required
          class="mt-4 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
          placeholder="Contraseña">
      </div>
      <div>
        <label for="password_confirmation" class="sr-only">Confirmar Contraseña</label>
        <input v-model="password_confirmation" type="password" id="password_confirmation" name="password_confirmation" autocomplete="new-password" required
          class="mt-4 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
          placeholder="Confirmar Contraseña">
      </div>

      <div>
        <label for="role" class="block text-sm font-medium text-gray-700">Rol</label>
        <div class="relative mt-1">
          <select v-model="role" id="role" name="role" autocomplete="off" required
            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <option disabled value="">Seleccionar rol</option>
            <option value="admin">Administrador</option>
            <option value="employee">Empleado</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <!-- Icono de flecha hacia abajo -->
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd"
                d="M10 12a1 1 0 00.707-.293l3-3a1 1 0 00-1.414-1.414L10 9.586 7.707 7.293a1 1 0 00-1.414 1.414l3 3A1 1 0 0010 12z"
                clip-rule="evenodd" />
            </svg>
          </div>
        </div>
      </div>
      <div>
        <button type="submit"
          class="mt-6 group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd"
                d="M10 12a2 2 0 100-4 2 2 0 000 4zM4 8a4 4 0 118 0 4 4 0 01-8 0zm16 2a2 2 0 01-2 2h-4v2a2 2 0 11-4 0v-2H2a2 2 0 01-2-2V6a2 2 0 012-2h16a2 2 0 012 2v4z"
                clip-rule="evenodd" />
            </svg>
          </span>
          Registrarse
        </button>
      </div>
    </form>
  </div>
</template>

<script>
import { mapActions } from 'vuex';

export default {
  name: "UserRegister",
  data() {
    return {
      name: '',
      email: '',
      password: '',
      password_confirmation: '',
      is_admin: '',
      password_configured: false
    };
  },
  methods: {
    ...mapActions(['registerUser']),
    async onSubmit() {
      // Crea un objeto con los datos del usuario a registrar
      const userData = {
        name: this.name,
        email: this.email,
        password: this.password,
        role: this.role
      };

      // Llama a la acción registerUser y pasa los datos del usuario como argumento
      await this.registerUser(userData);
    }
  }
};
</script>

<style>
/* Añade estilos adicionales según sea necesario */
</style>