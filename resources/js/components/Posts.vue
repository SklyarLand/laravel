<template>
    <!--<div class=" border-bottom">
        <h1>Ваши посты</h1>
    </div>-->
    <div id="posts" class="container">
        <div class=" border-bottom">
            <h1>Ваши посты</h1>
        </div>
        <div class="container-fluid">
            <div v-for="post in posts" class="__post">
                <post v-bind:data-post="post"></post>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Posts',
        props: [
            'userId'
        ],
        data: function() {
            return {
                posts: ['fdfsfds']
            }
        },
        methods: {
            getPost() {
                //console.log(this.userId);
                let result;
                axios.post(`/api/posts/search`, { user: this.userId }).then(response => {
                    this.posts =  response.data;
                    console.log(this.posts)
                });
                return result;
            }
        },
        mounted() {
            this.getPost();
        }
    }
</script>

<style>
    .container-fluid{
        margin-top: 30px;
    }
    .__post{
        margin: 10px;
    }
</style>
