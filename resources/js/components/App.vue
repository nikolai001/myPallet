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
            {'id':5,'Name':'Unit 1','Type':'Trailer'},
            {'id':6,'Name':'Unit 2','Type':'Truck'},
            {'id':7,'Name':'Unit 3','Type':'Truck'},
            {'id':8,'Name':'Unit 4','Type':'Truck'},
            {'id':9,'Name':'Unit 5','Type':'Truck'},
            {'id':10,'Name':'Unit 6','Type':'Truck'},
            {'id':11,'Name':'Mathæo','Type':'Truck'}
        ]
    }
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