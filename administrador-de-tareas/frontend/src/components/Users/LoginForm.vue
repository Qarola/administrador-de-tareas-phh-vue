<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
      <div>
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Iniciar sesión</h2>
      </div>
      <form class="mt-8 space-y-6" @submit.prevent="onSubmit">
        <div class="rounded-md shadow-sm -space-y-px">
          <div>
            <label for="email-address" class="sr-only">Correo electrónico</label>
            <input v-model="email" id="email-address" name="email" type="email" autocomplete="email" required
              class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
              placeholder="Correo electrónico">
          </div>
          <div>
            <label for="password" class="sr-only">Contraseña</label>
            <input v-model="password" id="password" name="password" type="password" autocomplete="current-password"
              required
              class="mt-4 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
              placeholder="Contraseña">
          </div>
        </div>

        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <input id="remember-me" name="remember-me" type="checkbox"
              class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
            <label for="remember-me" class="ml-2 block text-sm text-gray-900">
              Recordarme
            </label>
          </div>

          <div class="text-sm">
            <router-link to="/forgot-password" class="font-medium text-indigo-600 hover:text-indigo-500">
              ¿Olvidaste tu contraseña?
            </router-link>
          </div>
        </div>

        <div>
          <button type="submit"
            class="mt-6 group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <!-- Heroicon name: solid/lock-closed -->
              <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                  d="M10 12a2 2 0 100-4 2 2 0 000 4zM4 8a4 4 0 118 0 4 4 0 01-8 0zm16 2a2 2 0 01-2 2h-4v2a2 2 0 11-4 0v-2H2a2 2 0 01-2-2V6a2 2 0 012 2h16a2 2 0 012 2v4z"
                  clip-rule="evenodd" />
              </svg>
            </span>
            Iniciar sesión
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { mapActions } from 'vuex';

export default {
  name: "LoginForm",
  data() {
    return {
      email: '',
      password: '',
      error: null
    };
  },
  methods: {
    ...mapActions(['login', 'logout']),
    async onSubmit() {
      try {
        await this.login({ email: this.email, password: this.password });
        // Lógica para redirigir al usuario después del inicio de sesión
        this.$router.push('/admin/dashboard');
      } catch (error) {
        // Imprimir el error en la consola para fines de depuración
        console.error('Error durante el inicio de sesión:', error);

        // Lógica para mostrar un mensaje de error al usuario
        this.errorMessage = 'Hubo un error durante el inicio de sesión. Por favor, inténtalo de nuevo más tarde.';

        // Limpiar los campos del formulario si es necesario
        this.email = '';
        this.password = '';
      }
    }
  }
};
</script>
