import { ref, watch } from 'vue'
import { Request } from '../utils/request'
import { defineStore } from 'pinia'
import { ApiService } from '../utils/ApiService'
import { getToken, saveToken, destroyToken } from '../utils/TokenUtils'
export const useAuthStore = defineStore('Auth',() => {
// state
  const User = ref({
    name:''
    email:''
  })
  const token = ref("hello")

  if(localStorage.getItem("token")){
    token.value = localStorage.getItem("token")
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

  const isLoggedIn = () => {
    if(User.value == 'undefined') return true
    return true
  }

  const logout = async () => {
    const response = await Request.post('logout');
  }
//getters
  const getToken = () => {
    if(User.value) return User.value
    return undefined
  }

  const setAuth = (data) =>{
    token.value = data.token
    if(data.user){
      console.log(data.user)
      User.name = data.user.name
      User.email = data.user.email
    }
  }

  return {
    User,
    token,
    isLoggedIn,
    login,
    logout,
    getToken,
  }
})
