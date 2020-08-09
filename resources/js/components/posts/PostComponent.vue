<template>
    <div class="card col-sm-12">
        <h5 class="card-header">{{title}}</h5>
        <div class="card-body">
            <p class="card-text">{{body}}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">{{date}}</small>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'title',
        'body',
        'date',
        'id'
    ],
    name: "PostComponent",
}
</script>

<style>
    .card{
        margin-top: 20px;
    }
</style>
