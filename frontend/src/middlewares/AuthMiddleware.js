import { useAuthStore } from "../stores/AuthStore"

const AuthMiddleware = (to, from, next) => {
  const AuthStore = useAuthStore()
  if(AuthStore.getToken()){
    next()
  }
  else{
    next('login')
  }
}

export default AuthMiddleware