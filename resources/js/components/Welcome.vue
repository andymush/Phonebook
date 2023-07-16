<template>
    <div class="container mt-5">
        <div class="col-12 text-center">
            <h1>Mario Phonebook </h1>
        </div>
    </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card mb-3">                    
                    <button class="btn btn-success">Add Contact</button>
                </div>
            </div>
        </div>
            
</template>

<script>
import App from '../layouts/App.vue';

    export default {
        components: {
            App,
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
