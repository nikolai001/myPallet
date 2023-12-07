<template>

<main class="container">
    <DashboardComponent :units = units />
</main>

</template>

<script>
import DashboardComponent from './DashboardComponent.vue'

export default {
  name: 'App',
  components : {
    DashboardComponent
  },
  data () {
    return {
        units : [

        ]
    }
  },

    async mounted () {
        await fetch('http://localhost:8000/api/units')
        .then(response => response.json())
        .then(data => this.units = data)
    }

}
</script>

<style lang="scss">

    body {
        margin: 0;
    }

    .container {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

</style>