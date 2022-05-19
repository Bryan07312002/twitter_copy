import { ref, watch } from 'vue'
import { Request } from '../utils/request'
import { defineStore } from 'pinia'

export const useAuthStore = defineStore('Auth',() => {
// state
  const User = ref({
    name:null,
    email:undefined,
    token:null,
  })

  if(localStorage.getItem("User")){
    User.value = JSON.parse(localStorage.getItem("User"))
  }

  watch(
    User,
    (userVal) => {
      localStorage.setItem("User", JSON.stringify(userVal))
    },
    {deep:true}
  )
//Actions
  const login = async (payload) => {
    const response = await Request('login','post',payload);

    if(response.data.success == false) return
    User.value.token = response.data.token
    User.value.name = response.data.name
    User.value.email = response.data.email
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
    if(User.value.token) return User.value.token
    return undefined
  }

  return {
    User,
    isLoggedIn,
    login,
    logout,
    getToken,
  }
})
