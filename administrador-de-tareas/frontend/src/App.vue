<template>
  <div id="app">
    <router-view></router-view> <!-- Esto debería renderizar el componente LoginForm -->
  </div>
</template>

<script>
import { createRouter, createWebHistory } from 'vue-router';
import LoginForm from './components/Users/LoginForm.vue';
import TaskList from './components/Tasks/TaskList.vue';
import TaskDetail from './components/Tasks/TaskDetail.vue';

const routes = [
  {
    path: '/login',
    name: 'Login',
    component: LoginForm
  },
  {
    path: '/tasks',
    name: 'TaskList',
    component: TaskList
  },
  {
    path: '/task/:id',
    name: 'TaskDetail',
    component: TaskDetail,
    props: true
  }
];

export default createRouter({
  history: createWebHistory(),
  routes
});
</script>

<style>
/* Añade estilos adicionales según sea necesario */
</style>
