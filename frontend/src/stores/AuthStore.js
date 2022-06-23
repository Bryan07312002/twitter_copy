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
      ApiService.post("auth/login",payload)
        .then(({ data }) => {
          console.log(data)
          setAuth(data.authorisation.token)
          resolve(data);
        })
        .catch(({ response }) => {
          //tratar erros
        });
    })
  }

  const setAuth = (new_token) => {
    token.value = new_token
  }

  const logout = async () => {
    ApiService.post('logout');
    purgeAuth();
  }

  async function is_auth(){
    try{
      await ApiService.get('auth/me') 
    }catch(error){
      return false
    }
    
    return true
  }

  const purgeAuth = () => {
    isAuthenticated.value = false;
    User.value = {};
    destroyToken();
    router.push('/')
  }

  return {
    User,
    is_auth,
    purgeAuth,
    token,
    login,
    logout,
  }
})
