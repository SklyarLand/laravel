<template>
    <div id="tasks" class="container">
        <div class="border-bottom">
            <h1>Ваши задачи</h1>
        </div>
        <div class="container-fluid border-bottom">
            <div v-if="tasks">
                <div v-if="task" v-for="task in tasks" class="__post">
                    <task v-bind:data="task"></task>
                </div>
            </div>
            <div v-else>
                <info info-text="Вы не создали ни одной задачи!"></info>
            </div>
        </div>
        <div class="container-fluid">
            <a href="/tasks">
                <button type="button" class="btn btn-dark">Показать все задачи</button>
            </a>
        </div>
    </div>
</template>

<script>
export default {
    name: "Tasks",
    props: [
        'userId'
    ],
    data: function() {
        return {
            tasks: []
        }
    },
    methods: {
        getTasks() {
            axios.post(`/api/tasks/search`, { user: this.userId }).then(response => {
                console.log(response.data)
                this.tasks =  response.data;
            });
        }
    },
    mounted() {
        this.getTasks();
    }
}
</script>

<style scoped>
    .container-fluid{
        margin-top: 30px;
    }
    .__post{
        margin: 10px;
    }
</style>
