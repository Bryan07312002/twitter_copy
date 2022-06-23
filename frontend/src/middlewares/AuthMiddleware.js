import { useAuthStore } from "../stores/AuthStore"

const AuthMiddleware = async (to, from, next) => {
  const AuthStore = useAuthStore()
  if(await AuthStore.is_auth()){
    console.log('next')
    next()
  }
  else{
    console.log('hello auth middlerae')

    next('login')
  }
}

function test(){
  return false
}

export default AuthMiddleware