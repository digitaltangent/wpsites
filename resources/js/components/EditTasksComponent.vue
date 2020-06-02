// EditTasksComponent.vue

<template>
    <div>
        <h1>Edit Task</h1>
        <form @submit.prevent="updateTask">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Task:</label>
                        <input type="text" class="form-control" v-model="task.title">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Task Description:</label>
                        <input type="text" class="form-control" v-model="task.description">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Task Status:</label>
                        <input type="text" class="form-control" v-model="task.status">
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
                task: {}
            }
        },
        created() {
            let uri = `https://wpsites.test/api/task/edittask/${this.$route.params.id}`;
            this.axios.get(uri).then((response) => {
                this.task = response.data;
            });
        },
        methods: {
            updateTask() {
                let uri = `https://wpsites.test/api/task/updatetask/${this.$route.params.id}`;
                this.axios.post(uri, this.task).then((response) => {
                    this.$router.push({name: 'tasks'});
                });
            }
        }
    }
</script>
