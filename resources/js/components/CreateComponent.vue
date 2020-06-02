// CreateClientComponent.vue

<!--<template>
    <div>
        <h1>Add A Client</h1>
        <form @submit.prevent="addClient">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group" >
                        <label>* Company:</label>
                        <input  type="text" class="form-control" v-model="client.company"/>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>First Name:</label>
                        <input type="text" class="form-control" v-model="client.firstname" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Last Name:</label>
                        <input type="text" class="form-control" v-model="client.lastname" >
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button><v-btn class="ma-2"  color="secondary">
                    <v-icon left>mdi-content-save-outline</v-icon> Save
                </v-btn></button>
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
        methods: {

            addClient() {
                let uri = 'https://wpsites.test/api/client/create';
                this.axios.post(uri, this.client).then((response) => {
                    this.$router.push({name: 'clients'});
                });
            }
        }
    }


</script>
-->
<template>
    <container class="mt-5">
        <h1 class="my-5">Add a Client</h1>
        <form class="needs-validation" novalidate @submit="checkForm">
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationCustom03">Company</label>
                    <input v-model="client.company" type="text"  class="form-control" id="validationCustom03" placeholder="Company Name" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationCustom01">First name</label>
                    <input v-model="client.firstname" type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Last name</label>
                    <input v-model="client.lastname" type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <button type="submit"><v-btn class="ma-2"  color="secondary">
                <v-icon left>mdi-content-save-outline</v-icon> Save
            </v-btn></button>
        </form>
    </container>
</template>

<script>

    export default {
        data() {
            return {
                client: {}
            }
        },
        name: "InputsPage",
        methods: {
            checkForm(event) {
                event.preventDefault();
                event.target.classList.add('was-validated');
                this.addClient();
            },
            addClient() {
                let uri = 'https://wpsites.test/api/client/create';
                this.axios.post(uri, this.client).then((response) => {
                    this.$router.push({name: 'clients'});
                });
            }
        }
    }
</script>
