<template>
    <div class="dashboard">
        <div class="dashboard__tab">
            <button class="tab__button" :class="{ 'tab__button--active': currentSelection === 'All' }" @click="changeView('All')"><i class="material-symbols-outlined">communities</i>All</button>
            <button class="tab__button" :class="{ 'tab__button--active': currentSelection === 'Trucks' }" @click="changeView('Trucks')"><i class="material-symbols-outlined">local_shipping</i>Trucks</button>
            <button class="tab__button" :class="{ 'tab__button--active': currentSelection === 'Trailers' }" @click="changeView('Trailers')"><i class="material-symbols-outlined">rv_hookup</i>Trailers</button>
        </div>
        <li class="dashboard__item" v-for="unit in unitSelection" :key="unit.id">{{unit.Name}}</li>
    </div>
</template>

<script>
    export default {

        data () {
            return {
                currentSelection : 'All',
                unitSelection: []
            }
        },

        methods : {
            changeView(value) {
                this.currentSelection = value
                this.filterUnit(value)
            },
            filterUnit (value) {
                if (value == 'Trucks') {
                    this.unitSelection = this.units.filter(unit => unit.Type === "Truck");
                }
                else if (value == 'Trailers') {
                    this.unitSelection = this.units.filter(unit => unit.Type === "Trailer");
                }else {
                    this.unitSelection = this.units
                }
            },
        },

        props : {
            units: Array
        },

        mounted () {
            this.unitSelection = this.units
        }
    }
</script>

<style lang="scss" scoped>
    @import 'resources/sass/_colors.scss'; 
    .dashboard {
        font-family: 'Roboto';
        font-weight: 300;
        margin-top: 25px;
        display: grid;
        grid-template-columns: .25fr 1fr 1fr;
        width: 90%;
        background: $white;
        box-sizing: content-box;
        box-shadow: 0px 1px 3px 1px rgba(0, 0, 0, 0.15), 0px 1px 2px 0px rgba(0, 0, 0, 0.30); 
        height:50vh;
        border-radius: 16px;
        overflow-x: hidden;
        overflow-y: scroll;
        max-width: 900px;
        &__item {
           text-decoration: none;
           list-style: none; 
           display: block;
           width: 90%;
           grid-column: 2/-1;
           margin: 0 auto;
           height: 35px;
           display: flex;
           align-items: center;
        }
        &__tab {
            grid-column: 1/2;
            grid-row:1 / 100;
            display: flex;
            flex-direction: column;
            width: 100%;
            border-right: 2px solid rgba($white--darker,.25);
            padding-right: 5px;
            box-sizing: border-box;
            .tab__button {
                width: 100%;
                height: 35px;
                padding: 0;
                border: none;
                margin: 0 auto;
                background-color: $white;
                justify-self: center;
                color: $white--dark;
                display: flex;
                align-items: center;
                justify-content: space-evenly;
                font-family: 'Roboto';
                font-weight: 500;
                &--active {
                    background-color: rgba($color: $green, $alpha: .3);
                    border-right: $green solid 5px;
                    box-sizing: content-box;
                    color: $green;
                    font-style: italic;
                }
            }
        }
    }
</style>
