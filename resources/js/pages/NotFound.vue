<template>
    <div class="container-md py-5 mb-5">
        <div class="row  py-5">
            <div class="col text-center py-5 mb-5">

                <h1 class="text-uppercase pb-5">This Page is not available, back to Home</h1>
                <router-link   data-dismiss="modal" class="btn btn-primary " :to="{name: 'home'}">Back to the home</router-link>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name:'NotFound',

}
</script>

<style lang="scss" scoped>

</style>