<template>
  <div id="app">
    <Head></Head>
    <Content></Content>
    <Footer></Footer>
  </div>
</template>

<script>
import Head from './vue/head.vue'
import Content from './vue/content.vue'
import Footer from './vue/footer.vue'

export default{
    name: "app",
    components: {Head, Content,Footer}
}
</script>


<style>

</style>