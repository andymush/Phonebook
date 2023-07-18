<template>
    
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="card shadow sm">
                    <div class="card-body">
                        <h1 class="text-center">Login</h1>
                        <hr/>
                        <form @submit.prevent="Login" class="row" method="post">                            
                            <div class="form-group col-12">
                                <label for="email" class="font-weight-bold">Email</label>
                                <input type="text"  name="email" id="email" v-model="user.email" class="form-control">
                            </div>
                            <div class="form-group col-12 my-2">
                                <label for="password" class="font-weight-bold">Password</label>
                                <input type="password"  name="password" id="password" v-model="user.password" class="form-control">
                            </div>
                            <div class="col-12 mb-2">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Login
                                </button>
                            </div>
                            <div class="col-12 text-center">
                                <label>
                                    <a href="/register">Don't have an account? Register Now!</a>
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { routerKey } from 'vue-router';


     export default {
       name: 'Login',
       data () {
         return {
           result: {},
           user:{
                email: '',
                password: ''
           }
         }
       },
       created() { 
       },
       mounted() {
             console.log("mounted() called.......");
         },
       methods: {
              Login(){
               axios.post("http://127.0.0.1:8000/api/login", this.user)
                .then((response) => {         
                    console.log('successful login')
                    localStorage.setItem('token', response.data.token);    
                    window.dispatchEvent(new CustomEvent('token-changed', {
                    detail: {
                        storage: localStorage.getItem('token')
                    }
                    }));
                    this.$router.push({name:'Index'})
                    
                    
                })
                .catch((error) => {
                    console.log(error)
                });               
              }
         }
     }
</script>