import axios from 'axios';
import jsPDF from 'jspdf';
import { createStore } from 'vuex';

export const store = createStore({
  state: {
    isAuthenticated: false,
    user: null,
    error: null,
    reportData: [],
  },
  mutations: {
    SET_AUTHENTICATED(state, isAuthenticated) {
      state.isAuthenticated = isAuthenticated;
    },
    SET_USER(state, user) {
      state.user = user;
    },
    SET_ERROR(state, error) {
      state.error = error;
    },
    SET_REPORT_DATA(state, data) {
      state.reportData = data;
    },
  },
  actions: {
    async login({ commit }, { email, password }) {
      try {
        const response = await axios.post('http://localhost:8000/login', {
          email,
          password
        });

        if (response.status === 200) {
          commit('SET_AUTHENTICATED', true);
          commit('SET_USER', response.data.user); 
        } else {
          throw new Error('Error en la solicitud');
        }
        
      } catch (error) {
        throw new Error(error.response.data.message || 'Error durante el inicio de sesión');
      }
    },
    async logout({ commit }) {
      try {
        await axios.post('http://localhost:8000/logout');
        commit('SET_AUTHENTICATED', false);
        commit('SET_USER', null);
      } catch (error) {
        throw new Error(`Error durante el cierre de sesión: ${error}`);
      }
    },
    async registerUser({ commit }, userData) {
      try {
        const response = await axios.post('http://localhost:8000/register', userData);

        if (response.status === 201) {
          commit('SET_AUTHENTICATED', true);
          console.log('Usuario registrado exitosamente.');
        } else {
          throw new Error('Hubo un error al registrar al usuario.');
        }

      } catch (error) {
        throw new Error(`Error al registrar al usuario: ${error.message}`);
      }
    },
    async createTask(context, taskData) {
      try {
        await axios.post('http://localhost:8000/tasks', taskData);
      } catch (error) {
        throw new Error(`Error al crear la tarea: ${error}`);
      }
    },
    async fetchReportData({ commit }, { startDate, endDate }) {
      try {
        const response = await axios.get('http://localhost:8000/report', {
          params: {
            startDate,
            endDate,
          },
        });
        commit('SET_REPORT_DATA', response.data.tasks);
      } catch (error) {
        console.error('Error fetching report data:', error);
        throw error; // Lanza el error nuevamente para que pueda ser manejado en el componente
      }
    },
    
    
    async downloadPDF() {
      try {
        const response = await axios.get('http://localhost:8000/generate-pdf');
        const pdfData = response.data;

        // Lógica para descargar el PDF
        const doc = new jsPDF();
        doc.autoTable({ html: pdfData });
        doc.save('reporte_tareas.pdf');
      } catch (error) {
        throw new Error(`Error downloading PDF: ${error}`);
      }
    },
  },
});
