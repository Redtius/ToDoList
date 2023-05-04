import axios from "axios";
import store from "./store/store.js";

function setAxiosDefaults() {
  axios.defaults.baseURL='http://localhost:8000/api/';
  axios.defaults.headers.common['Authorization'] = `Bearer ${store.state.user.token}`;
}

export default setAxiosDefaults;
