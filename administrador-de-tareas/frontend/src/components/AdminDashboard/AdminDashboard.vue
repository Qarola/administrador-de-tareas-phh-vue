<template>
    <div>
      <!-- Segundo navbar -->
      <nav class="bg-blue-600">
        <div class="max-w-7xl mx-auto px-6">
          <div class="flex justify-between h-20">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
              <img class="h-24 w-auto" src="@/assets/img/logo_task-admin.png" alt="Logo">
            </div>
            <!-- Enlaces del navbar -->
            <div class="flex items-center">
              <!-- Enlace Logout -->
              <router-link to="/logout" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                <span class="hover:border-b-2 border-transparent transition duration-300">Logout</span>
              </router-link>
            </div>
          </div>
        </div>
      </nav>
  
      <!-- Contenido del dashboard -->
      <div class="max-w-lg mx-auto mt-8">
        <h2 class="text-2xl font-semibold text-gray-900">Panel de Administración</h2>
  
        <!-- Botones para acciones -->
        <div class="mt-6 space-x-4">
          <!-- Botón para registrar nuevo usuario -->
          <button @click="showForm('register')" class="px-4 py-2 bg-blue-600 text-white rounded-md">Registrar Nuevo Usuario</button>
          
          <!-- Botón para crear tarea -->
          <button @click="showForm('task')" class="px-4 py-2 bg-blue-600 text-white rounded-md">Crear Tarea</button>
          
          <!-- Botón para generar reporte -->
          <button @click="showForm('report')" class="px-4 py-2 bg-blue-600 text-white rounded-md">Generar Reporte</button>
        </div>
  
        <!-- Renderizar el formulario de registro si showUserForm es true -->
        <div v-if="showUserForm" class="mt-8">
          <UserRegister @register="registerUser" />
        </div>
  
        <!-- Renderizar el componente GenerateReport si showReportSection es true -->
      <div v-if="showReportSection" class="mt-8">
        <GenerateReport />
      </div>

        <!-- Integración de TaskCreate -->
        <TaskCreate v-if="showTaskForm" @task-created="handleTaskCreated" />
      </div>
    </div>
  </template>
  
  <script>
  import UserRegister from '@/components/UserRegister/UserRegister.vue'; 
  import TaskCreate from '@/components/TaskCreate/TaskCreate.vue';
  import GenerateReport from '@/components/GenerateReport/GenerateReport.vue';
  
  export default {
    name: "AdminDashboard",
    components: {
      UserRegister,
      TaskCreate,
      GenerateReport
    },
    data() {
      return {
        showUserForm: false,
        showTaskForm: false,
        showReportSection: false,
        email: ''
      };
    },
    methods: {
      showForm(formType) {
        // Reseteamos el estado de los formularios
        this.showUserForm = false;
        this.showTaskForm = false;
        this.showReportSection = false;
        
        // Mostramos el formulario correspondiente según el tipo
        if (formType === 'register') {
          this.showUserForm = true;
        } else if (formType === 'task') {
          this.showTaskForm = true;
        } else if (formType === 'report') {
          this.showReportSection = true;
        }
      },
      registerUser(email) {
        //implementar la lógica para registrar al usuario
        console.log('Registrando usuario con correo electrónico:', email);
        // Opcional: Ocultamos el formulario después de enviar
        this.showUserForm = false;
      },
      handleTaskCreated() {
        // Lógica para manejar la creación exitosa de una tarea
        // Por ejemplo, podrías mostrar un mensaje de éxito o reiniciar el formulario
        console.log('La tarea se ha creado exitosamente');
        // Reiniciamos el formulario después de crear la tarea
        this.resetTaskForm();
      },
      resetTaskForm() {
        // Reinicia los campos del formulario de creación de tarea
        // Por ejemplo, estableciendo valores predeterminados o limpiando los campos
        // Esto es útil para preparar el formulario para la próxima creación de tarea
      }
    }
  };
  </script>
  