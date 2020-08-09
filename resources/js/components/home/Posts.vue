<template>
    <div id="posts" class="container">
        <div class="border-bottom">
            <h1>Ваши посты</h1>
        </div>
        <div class="container-fluid border-bottom">
            <div v-if="posts" v-for="post in posts" class="__post">
                <post v-bind:data="post"></post>
            </div>
            <div v-else>
                <info info-text="Вы не создали ни одного поста!"></info>
            </div>
        </div>
        <div class="container-fluid">
            <a href="/posts">
                <button type="button" class="btn btn-dark">Показать все посты</button>
            </a>
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
                posts: []
            }
        },
        methods: {
            getPost() {
                axios.post(`/api/posts/search`, { user: this.userId }).then(response => {
                    this.posts =  response.data;
                });
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
