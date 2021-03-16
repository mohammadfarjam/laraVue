<template>
    <div>
        <Layout />
        <h1>Home page</h1>

        {{userData.name}}
    </div>
</template>

<script>
import Layout from "./Layout";

export default {
    name:'home',
    components: {Layout},
    props: {
        userData : Object,
    },

}
</script>
