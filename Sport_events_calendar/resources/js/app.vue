<template>
    <div id="app">
        <anyChild></anyChild>
        <h1>Hello World</h1>
    </div>
</template>

<script>

import anyChild from './vue/addTableForm.vue'
export default{
    name: "app",
    components: {anyChild}
}
</script>