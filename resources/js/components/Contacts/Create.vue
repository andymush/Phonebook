<template>
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Add Contact</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="create">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" v-model="contact.name" class="form-control" >
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="number" v-model="contact.phone" class="form-control" >
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                            
                        </div>                        
                    </form>
                </div>
                <div class="card-footer">
                    <button class="back-button btn btn-info" @click="goBack">Back</button>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
.back-button {
  position: absolute;
  bottom: 10px;
  right: 10px;
}
</style>
<script>
export default {
    name: 'Create',
    data(){
        return {
            contact:{
                userid:"",
                name:"",
                phone:""
            }
        }
    },
    methods:{
        create(){
            const token = localStorage.getItem("token");
            axios.post('/api/Contacts',this.contact,{
                headers: {
                    "Content-Type": "application/json",
                    Authorization: "Bearer " + token
                }
            })
                .then((response) =>{
                this.$router.push({name:"Index"})
            }).catch(error=>{
                console.log(error)
            })
        },
        goBack() {
            this.$router.go(-1);
        }
    }
}
</script>