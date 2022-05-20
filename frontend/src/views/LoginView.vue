<template>
  <main>
    <title>Login</title>
    <ModalDefault
      :isOpen="true"
      :canClose="false"
    >
      <h1>Entrar no Twitter</h1>
      <ButtonDefault class="btn-white-bg full-width padding-top-bottom">
        <div class="flex-row flex-center">
          <GoogleIcon class="svg-default-size" />
          <p>Entrar com conta do Google</p>
        </div>
      </ButtonDefault>

      <ButtonDefault class="btn-white-bg full-width padding-top-bottom">
        <div class="flex-row flex-center">
          <AppleIcon class="svg-default-size" />
          <p class="bold">Entrar com Apple</p>
        </div>
      </ButtonDefault>

      <div class="full-width flex-center flex-row padding-top-bottom">
        <div class="full-width thin-bar"/>
        ou
        <div class="full-width thin-bar "/>
      </div>
      <form @submit.prevent="login()">
        <InputDefault 
          class="full-width padding-top-bottom"
          placeholder="Email"
          @updateValue="FormLogin.email.value = $event"
        />

        <InputDefault 
          class="full-width padding-top-bottom"
          placeholder="password"
          @updateValue="FormLogin.password.value = $event"
        />

        <ButtonDefault class="btn-black-bg full-width padding-top-bottom bold">
          Avançar
        </ButtonDefault>
      </form>

      <ButtonDefault class="btn-white-bg full-width padding-top-bottom bold">
        Esqueceu a senha?
      </ButtonDefault>

      <p class="padding-top-bottom">Não tem uma conta <router-link to="/register">inscreva-se</router-link></p>
    </ModalDefault>
  </main>
</template>

<script setup>
  import { ref } from '@vue/reactivity';
  import router from '../router'
// components
  import ModalDefault from '../components/ModalDefault.vue';
  import ButtonDefault from '../components/ButtonDefault.vue';
  import GoogleIcon from '../components/icons/GoogleIcon.vue';
  import AppleIcon from '../components/icons/AppleIcon.vue';
  import InputDefault from '../components/InputDefault.vue';
//Store
  import {useAuthStore} from '../stores/AuthStore';

  const AuthStore = useAuthStore();
  const FormLogin = {
    email:ref(''),
    password:ref('')
  }

  function login(){
    const payload = {
      email:FormLogin.email.value,
      password:FormLogin.password.value
    }
    AuthStore.login(payload)
    //router.push({name:'home'})
  }
</script>

<style>
  .padding-top-bottom{
    margin-bottom: 10px;
    margin-top: 10px;
  }
  .svg-default-size{
    padding-right: 10px;
    padding-left: 10px;
  }
</style>