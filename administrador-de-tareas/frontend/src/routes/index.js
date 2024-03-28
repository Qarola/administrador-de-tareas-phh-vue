import { createRouter, createWebHistory } from 'vue-router';
import NavbarLogin from '@/components/Navbar/NavbarLogin.vue';
import LoginForm from '@/components/Users/LoginForm.vue';
import ForgotPassword from '@/components/Users/ForgotPassword.vue';
import TaskList from '@/components/Tasks/TaskList.vue';
import TaskDetail from '@/components/Tasks/TaskDetail.vue';
import AdminDashboard from '@/components/AdminDashboard/AdminDashboard.vue'; 

const routes = [
  // Ruta para el login con el navbar
  { path: '/', components: { default: LoginForm, navbar: NavbarLogin } },
  { path: '/forgot-password', component: ForgotPassword },
  { path: '/tasks', component: TaskList },
  { path: '/tasks/:id', component: TaskDetail },
  { path: '/admin/dashboard', component: AdminDashboard },

];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
