// IndexComponent.vue

<template>
    <div>
        <div class="row">
            <div class="col-md-10">
                <h1 class="mx-4 my-4">Clients</h1>
            </div>
            <div class="col-md-2">
                <router-link :to="{ name: 'create' }">
                    <v-btn class="mx-2" fab dark color="secondary">
                        <v-icon dark>mdi-plus</v-icon>
                    </v-btn>
                </router-link>
            </div>
        </div><br />
        <v-card-title>

            <v-spacer></v-spacer>
            <v-text-field
                v-model="search"
                append-icon="mdi-magnify"
                label="Search"
                single-line
                hide-details
            ></v-text-field>
        </v-card-title>
        <v-data-table
            :headers="headers"
            :items="clients"
            :search="search"
        >

            <template v-slot:item.actions="{ item }">
                <v-icon
                    small
                    class="mr-2"
                    @click="editClient(item.id)"
                >
                    mdi-pencil
                </v-icon>
                <v-icon
                    small
                    @click="deleteClient(item.id)"
                >
                    mdi-delete
                </v-icon>
            </template>
        </v-data-table>

    </div>

</template>

<script>
    export default {
        data() {
            return {
                search: '',
                clients: [],
                headers: [
                    { text: 'Client ID', value: 'id' },
                    { text: 'Company', value: 'company' },
                    { text: 'First Name', value: 'firstname' },
                    { text: 'Last Name', value: 'lastname' },
                    { text: 'Actions', value: 'actions', sortable: false },
                ],
            }
        },
        created() {
            let uri = 'https://wpsites.test/api/clients';
            this.axios.get(uri).then(response => {
                this.clients = response.data.data;
            });
        },
        methods: {
            deleteClient(id)
            {
                let uri = `https://wpsites.test/api/client/delete/${id}`;
                this.axios.delete(uri).then(response => {
                    this.clients.splice(this.clients.indexOf(id), 1);
                });
            },
            editClient(id)
            {
               this.$router.push({ path: `/edit/${id}` });

            }

        }
    }
</script>
