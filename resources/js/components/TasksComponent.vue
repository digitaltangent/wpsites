// TasksComponent.vue

<template>
    <div>
        <div class="row">
            <div class="col-md-10">
                <h1 class="mx-4 my-4">Tasks</h1>
            </div>
            <div class="col-md-2">
                <router-link :to="{ name: 'createtask' }">
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
            :items="tasks"
            :search="search"
        >

            <template v-slot:item.actions="{ item }">
                <v-icon
                    small
                    class="mr-2"
                    @click="editTask(item.id)"
                >
                    mdi-pencil
                </v-icon>
                <v-icon
                    small
                    @click="deleteTask(item.id)"
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
                tasks: [],
                headers: [
                    { text: 'Task ID', value: 'id' },
                    { text: 'Task', value: 'title' },
                    { text: 'Description', value: 'description' },
                    { text: 'Status', value: 'status' },
                    { text: 'Actions', value: 'actions', sortable: false },
                ],
            }
        },
        created() {
            let uri = 'https://wpsites.test/api/tasks';
            this.axios.get(uri).then(response => {
                this.tasks = response.data.data;
            });
        },
        methods: {
            deleteTask(id)
            {
                let uri = `https://wpsites.test/api/task/deletetask/${id}`;
                this.axios.delete(uri).then(response => {
                    this.tasks.splice(this.tasks.indexOf(id), 1);
                });
            },
            editTask(id)
            {
               this.$router.push({ path: `/edittask/${id}` });

            }

        }
    }
</script>
