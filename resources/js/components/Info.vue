<template>
    <div class=" alert alert-info">
        {{infoText}}
    </div>
</template>

<script>
export default {
    name: "Info",
    props: [
        'infoText'
    ]
}
</script>

<style scoped>

</style>
