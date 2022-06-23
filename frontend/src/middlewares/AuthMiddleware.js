import { useAuthStore } from "../stores/AuthStore"

const AuthMiddleware = async (to, from, next) => {
  const AuthStore = useAuthStore()
  if(await AuthStore.is_auth()){
    next()
  }
  else{
    next('login')
  }
}

function test(){
  return false
}

export default AuthMiddleware