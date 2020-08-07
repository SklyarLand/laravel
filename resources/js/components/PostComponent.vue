<template>
    <div class="col-md-4">
        <div class="card mb-4 box-shadow">
            <h5 class="card-header">{{title}}</h5>
            <div class="card-body">
                <p class="card-text">{{body.slice(0,100)+'...'}}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">{{ date }}</small>
                </div>
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
        mounted() {
            console.log(this)
        }
    }
</script>
