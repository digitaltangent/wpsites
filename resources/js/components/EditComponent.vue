// EditComponent.vue

<template>
    <div>
        <h1>Edit Client</h1>
        <form @submit.prevent="updateClient">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Client Company:</label>
                        <input type="text" class="form-control" v-model="client.company">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Client First Name:</label>
                        <input type="text" class="form-control" v-model="client.firstname">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Client Last Name:</label>
                        <input type="text" class="form-control" v-model="client.lastname">
                    </div>
                </div>
            </div><br />
            <div class="form-group">
                <button class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                client: {}
            }
        },
        created() {
            let uri = `https://wpsites.test/api/client/edit/${this.$route.params.id}`;
            this.axios.get(uri).then((response) => {
                this.client = response.data;
            });
        },
        methods: {
            updateClient() {
                let uri = `https://wpsites.test/api/client/update/${this.$route.params.id}`;
                this.axios.post(uri, this.client).then((response) => {
                    this.$router.push({name: 'clients'});
                });
            }
        }
    }
</script>
