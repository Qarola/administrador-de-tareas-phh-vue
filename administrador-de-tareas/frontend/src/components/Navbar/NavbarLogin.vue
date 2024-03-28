<template>
    <nav class="bg-blue-600">
      <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between h-20">
          <!-- Logo -->
          <div class="flex-shrink-0 flex items-center">
            <img class="h-24 w-auto" src="@/assets/img/logo_task-admin.png" alt="Logo">
          </div>
          <!-- Enlaces del navbar -->
          <div class="flex items-center">
            <!-- Enlace Login -->
            <router-link to="/login" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
              <span class="hover:border-b-2 border-transparent transition duration-300">Login</span>
            </router-link>
          </div>
        </div>
      </div>
    </nav>
  </template>
  
  <script>
  export default {
    name: "NavbarLogin",
  };
  </script>
  
  <style>
  /* Añade estilos adicionales según sea necesario */
  </style>
  