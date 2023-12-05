<template>
    <div class="dashboard">
        <div class="dashboard__tab">
            <button class="tab__button" :class="'tab__button--active'"><i class="material-symbols-outlined">communities</i>All</button>
            <button class="tab__button"><i class="material-symbols-outlined">local_shipping</i>Trucks</button>
            <button class="tab__button"><i class="material-symbols-outlined">rv_hookup</i>Trailers</button>
        </div>
        <li class="dashboard__item" v-for="unit in units" :key="unit.id">{{unit.Name}}</li>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log(123)
        },
        props : {
            units: []
        }
    }
</script>

<style lang="scss" scoped>
    @import 'resources/sass/_colors.scss'; 
    .dashboard {
        margin-top: 25px;
        display: grid;
        grid-template-columns: .25fr 1fr 1fr;
        grid-template-rows: 30px auto;
        width: 90%;
        background: $white;
        box-sizing: content-box;
        box-shadow: 0px 1px 3px 1px rgba(0, 0, 0, 0.15), 0px 1px 2px 0px rgba(0, 0, 0, 0.30); 
        height:50vh;
        border-radius: 16px;
        overflow-x: hidden;
        overflow-y: scroll;
        &__item {
           text-decoration: none;
           list-style: none; 
        }
        &__tab {
            grid-column: 1/2;
            grid-row:1 / span all;
            display: flex;
            flex-direction: column;
            width: 100%;
            border-right: 2px solid rgba($white--darker,.25);
            padding-right: 5px;
            box-sizing: border-box;
            .tab__button {
                width: 100%;
                aspect-ratio: 3/1;
                padding: 0;
                border: none;
                margin: 0 auto;
                background-color: $white;
                justify-self: center;
                color: $white--dark;
                display: flex;
                align-items: center;
                justify-content: space-evenly;
                &--active {
                    background-color: rgba($color: $green, $alpha: .3);
                    border-right: $green solid 5px;
                    box-sizing: content-box;
                    color: $green;
                }
            }
        }
    }
</style>
