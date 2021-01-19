<template>
    <div class="inner">
        <h3 class="text-white-50">nev-electric.ru</h3>
        <nav class="nav nav-masthead justify-content-center flex-nowrap" v-if="false">
            <router-link class="nav-link text-white"  v-for="link in links" :to="link.href">{{ link.title }}</router-link>
        </nav>
    </div>
</template>

<script>
export default {
    data(){
        return{
            links:[
                {
                    title: 'Главная',
                    href: '/'
                },
                {
                    title: 'О нас',
                    href: '/contact'
                }
            ]
        }
    }
}
</script>

<style scoped>
    h3{
        margin-bottom: 10px;
    }
</style>


