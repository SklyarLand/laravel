<template>
    <div class="col-md-4">
        <div class="card mb-4 box-shadow">
            <h5 class="card-header">{{postTitle}}</h5>
            <div class="card-body">
                <p class="card-text">{{postBody.slice(0,100)+'...'}}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">{{ postDate }}</small>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'postTitle',
            'postBody',
            'postDate',
            'postId'
        ],
        mounted() {
            console.log(this)
        }
    }
</script>
