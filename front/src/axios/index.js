//arquivo de configuração do axios
import axios from "axios";
import Swal from "sweetalert2";

const env = import.meta.env;

const baseURL = (env.VITE_API_PREFIX + env.VITE_API_BASE_URL + ':' + env.VITE_API_PORT + '/' + env.VITE_API_SUFFIX).toString();

axios.defaults.baseURL = baseURL;
axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
axios.interceptors.request.use((config) => {
  // console.log(config);
  return config;
});
axios.interceptors.response.use(function (response) {
  return response;
},function (error) {
  console.log(error);
  if(error.response.status) {
    if(error.response.status === 429) {
      Swal.fire({
        title: 'Error',
        text: 'Você foi proibido temporariamente de realizar algumas ações no site, por motivos de segurança'
      });
    }
  }
  return Promise.reject(error);
});
