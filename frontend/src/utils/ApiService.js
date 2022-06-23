import axios from "axios";
import JwtService from "./TokenUtils";
import { API_URL } from "./Config";

export const ApiService = {
  //resource = endpoint
  // params = payload
  init() {
    axios.defaults.baseURL = API_URL;
  },

  setHeader() {
    axios.defaults.headers.common["Authorization"] = `Bearer ${JwtService.getToken()}`;
  },

  query(resource, params) {
    return axios.get(resource, params).catch(error => {
    });
  },

  async get(resource, slug = "") {
    try {
      return await axios.get(`${resource}/${slug}`);
    } catch (error) {
      throw new Error(`ApiService ${error}`);
    }
  },

  post(resource, params) {
    return axios.post(`${resource}`, params).catch(error => {
      throw new Error(`ApiService ${error}`);
    });
  },

  update(resource, slug, params) {
    return axios.put(`${resource}/${slug}`, params);
  },

  put(resource, params) {
    return axios.put(`${resource}`, params);
  },

  delete(resource) {
    return axios.delete(resource).catch(error => {
      throw new Error(`ApiService ${error}`);
    });
  }
};