<template>
    <div class="card col-sm-12">
        <h5 class="card-header">{{data['title']}}</h5>
        <div class="card-body">
            <p class="card-text">{{data['body']}}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">{{date | formatDate}}</small>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'data'
    ],
    name: "Post",
    data : function() {
        return {
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

<style>
</style>
