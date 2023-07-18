<template>
    
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="card shadow sm">
                    <div class="card-body">
                        <h1 class="text-center">Register</h1>
                        <hr/>
                        <form @submit.prevent="register" class="row" >  
                            <div class="form-group col-12">
                                <label for="name" class="font-weight-bold">Name</label>
                                <input type="text"  name="name" id="name" v-model="user.name" class="form-control">
                            </div>                          
                            <div class="form-group col-12">
                                <label for="email" class="font-weight-bold">Email</label>
                                <input type="text"  name="email" id="email" v-model="user.email" class="form-control">
                            </div>
                            <div class="form-group col-12 my-2">
                                <label for="password" class="font-weight-bold">Password</label>
                                <input type="password"  name="password" id="password" v-model="user.password" class="form-control">
                            </div>
                            <div class="form-group col-12 my-2">
                                <label for="password" class="font-weight-bold">Confirm Password</label>
                                <input type="password"  name="password_confirmation" id="password_confirmation" v-model="user.password_confirmation" class="form-control">
                            </div>
                            <div class="col-12 mb-2">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Register
                                </button>
                            </div>
                            <div class="col-12 text-center">
                                <label>
                                    <a href="/login">Already have an account? Login </a>
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

     export default {
       name: 'Register',
       data () {
         return {
           result: {},
           user:{
                name: '',
                email: '',
                password: '',
                password_confirmation: ''
           }
         }
       },
       methods: {
              register(){
               axios.post("http://127.0.0.1:8000/api/register", this.user)
                .then((response) => {         
                    console.log('successful registration')
                    localStorage.setItem('token', response.data.token);    
                    this.$router.push({name:'Index'})
                })
                .catch((error) => {
                    console.log(error)
                });               
              }
        }
     }
</script>