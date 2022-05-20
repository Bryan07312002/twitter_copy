import { ref, watch } from 'vue'
import { defineStore } from 'pinia'
import router from '../router/index'
import { ApiService } from '../utils/ApiService'
import { getToken, saveToken, destroyToken } from '../utils/TokenUtils'
export const useAuthStore = defineStore('Auth',() => {
// state
  const User = ref({
    name:null,
    email:null
  })
  const token = ref("")
  const isAuthenticated = ref(false)

  if(localStorage.getItem("token")){
    token.value = localStorage.getItem("token")
    isAuthenticated.value = true
  }

  watch(
    token,
    (token) => {
      saveToken(token)
      ApiService.setHeader()
    },
    {deep:true}
  )
//Actions
  const login = async (payload) => {
    new Promise(resolve => {
      ApiService.post("login",payload)
        .then(({ data }) => {
          setAuth(data)
          resolve(data);
        })
        .catch(({ response }) => {
          //tratar erros
        });
    })
  }

  const logout = async () => {
    ApiService.post('logout');
    purgeAuth();
  }

  const setAuth = (data) =>{
    token.value = data.token
    if(data.user){
      User.value.name = data.user.name
      User.value.email = data.user.email
    }
  }

  const purgeAuth = () => {
    isAuthenticated.value = false;
    User.value = {};
    destroyToken();
    router.push('/')
  }

  return {
    User,
    isAuthenticated,
    purgeAuth,
    token,
    login,
    logout,
  }
})
