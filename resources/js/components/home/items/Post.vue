<template>
    <div class="card col-sm-12">
        <h5 class="card-header">{{dataPost['title']}}</h5>
        <div class="card-body">
            <p class="card-text">{{dataPost['body']}}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">{{dataPost['created_at']}}</small>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'dataPost'
    ],
    name: "Post"
}
</script>

<style>
</style>
