<template>
                    
    <div class="text-center">
        <ul class="nav navbar-nav">
            
            <template v-if="token">
                <li><button class="btn btn-outline-danger" @click.prevent="logout()">Logout</button></li>
            </template>
            <template v-else>
                <router-link to="/login">Login</router-link>
            </template>
        </ul>
    </div>
    
    <div class="container mt-5">
        <div class="col-12 text-center">
            <h1>Phonebook </h1>
        </div>
    </div>
            
            
</template>

<script>
    export default {
        name: "Logout",
        data(){
            return {
                token:null
            }
        },
        methods: {
            checkIfTokenIsNotEmpty() {
                this.token= !!localStorage.getItem('token');
            },
            logout() 
            {
                localStorage.clear();
                this.$router.push({name:'login'})             
            },
            
        },
        mounted(){
            this.checkIfTokenIsNotEmpty() //can be added anywhere when needed to check localStorage's Availablity
        }
    }
</script>
