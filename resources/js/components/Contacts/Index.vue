<template>      
        <div class="col-md-12">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card mb-3">
                        <router-link to="/create" class="btn btn-success">Add Contact</router-link>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Contacts</div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="contact in all_contacts">
                            <td>{{ contact.name }}</td>
                            <td>{{ contact.phone }}</td>
                            <td>                                
                                <button class="btn btn-outline-success" @click="editContact(contact.id,contact.name)">View</button>
                                &nbsp;
                                <button class="btn btn-danger" @click="deleteContact(contact.id)">Delete</button>
                            </td>
                        </tr>                        
                    </tbody>
                    </table>
            </div>
        </div>
</template>
<script>
    const token = localStorage.getItem("token");

    export default {
    data() {
        return {
            all_contacts: []
        };
    },
    methods: {
        getContacts() {
            axios.get("http://127.0.0.1:8000/api/Contacts", {
                headers: {
                    "Content-Type": "application/json",
                    Authorization: "Bearer " + token
                }
            })
                .then((response) => {
                this.all_contacts = response.data.all_contacts;
                
            })
                .catch((error) => {
                console.log(error);
            });
        },
        deleteContact(contactId) {
            if (confirm('Delete Contact?')) {
                console.log(contactId);
                const url = `http://127.0.0.1:8000/api/Contacts/${contactId}`;
                axios
                .delete(url, {
                    headers: {
                    "Content-Type": "application/json",
                    Authorization: "Bearer " + token
                    }
                })
                .then((response) => {
                    console.log(response.data);
                    this.getContacts();
                });
            }
        },
        editContact(contactId, contactName){
            //this.$router.push('/edit/' + contactId)
            this.$router.push({
                name:'edit',
                params: {
                    id:contactId,
                    name: contactName
                },
                props:{
                    id:contactId,
                    name:contactName
                }
            })
            
        },

    },
    mounted() {
        this.getContacts();
    }
}
</script>