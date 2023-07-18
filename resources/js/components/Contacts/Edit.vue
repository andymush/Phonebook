<template>
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Contact: &nbsp;<b>{{this.$route.params.name}}</b></h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" v-model="contact.name" placeholder="" class="form-control" >
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="number" v-model="contact.phone" class="form-control" >
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'Edit',
    data(){
        return {
            contact:{
                name:"",
                phone:""
            }      
                  
        }
        
    },
    methods:{
        update(){   
console.log(this.$route.params.name)

            const contactId = this.$route.params.id;
            console.log(contactId);
            const token = localStorage.getItem("token");
            const url = `http://127.0.0.1:8000/api/Contacts/${contactId}`;
            axios.put(url, this.contact,{
                headers: {
                "Content-Type": "application/json",
                Authorization: "Bearer " + token
                }
            })
            .then((response) => {
                console.log(response.data);
                this.$router.push({name:"Index"})
            })
                .catch((error) => {
                console.log(error);
            });
            
            
        }
    }
}
</script>