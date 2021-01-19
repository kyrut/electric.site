<template>
    <div class="my-spinner">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</template>

<script>
export default {
name: "Spinner"
}
</script>

<style scoped>
    .my-spinner{
        position: relative;
        z-index: 10;
    }
</style>
