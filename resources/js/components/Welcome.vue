<template>
                    
    <div class="text-center">
        <ul class="nav navbar-nav">
            <li><a href="#" @click.prevent="logout()">Logout</a></li>
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
        methods: {
            logout() 
            {
                localStorage.clear();
                this.$router.push({name:'login'})   
            }
        }
    }
</script>
