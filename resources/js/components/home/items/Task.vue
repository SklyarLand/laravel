<template>
    <div class="card col-sm-12">
        <h5 class="card-header"> Создано: {{ date | formatDate}}</h5>
        <div class="card-body">
            <p class="card-text">{{data['body']}}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a v-bind:href=href>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Перейти</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'data'
    ],
    name: "Task",
    data: function() {
        return {
            href: 'tasks/'+this.data['id'],
            date: new Date(this.data['created_at'])
        }
    },
    filters: {
        formatDate: d => [
            [
                `0${d.getDate()}`.slice(-2),
                `0${d.getMonth() + 1}`.slice(-2),
                d.getFullYear(),
            ].join('.'),
            [
                `0${d.getHours()}`.slice(-2),
                `0${d.getMinutes()}`.slice(-2),
            ].join(':'),
        ].join(' '),
    }
}
</script>

<style scoped>

</style>
