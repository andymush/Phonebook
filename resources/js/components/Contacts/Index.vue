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
                                <button class="btn btn-success">Update</button>
                                &nbsp;
                                <button class="btn btn-danger">Update</button>
                            </td>
                        </tr>                        
                    </tbody>
                    </table>
            </div>
        </div>
</template>
<script>

    export default {
    data() {
        return {
            all_contacts: []
        };
    },
    methods: {
        getContacts() {
            const token = localStorage.getItem("token");
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
        }
    },
    mounted() {
        this.getContacts();
    }
}
</script>