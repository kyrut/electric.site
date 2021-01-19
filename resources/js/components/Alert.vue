<template>
    <div>
        <div class="alert alert-success m-auto alert-dismissible fade show" role="alert" style="max-width: 500px">
            {{ messages }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</template>

<script>
export default {
    props:["messages"],
    mounted() {
        this.messages
    }
}
</script>

<style scoped>

</style>
