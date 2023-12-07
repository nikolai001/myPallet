<template>
    <div class="dashboard">
        <searchComponent :selection = filteredUnits @returnedSearch="searchData" />
        <div class="dashboard__tab">
            <button class="tab__button" :class="{ 'tab__button--active': currentSelection === 'All' }" @click="changeView('All')"><i class="material-symbols-outlined">communities</i>All</button>
            <button class="tab__button" :class="{ 'tab__button--active': currentSelection === 'Trucks' }" @click="changeView('Trucks')"><i class="material-symbols-outlined">local_shipping</i>Trucks</button>
            <button class="tab__button" :class="{ 'tab__button--active': currentSelection === 'Trailers' }" @click="changeView('Trailers')"><i class="material-symbols-outlined">rv_hookup</i>Trailers</button>
            <button class="tab__addUnit material-symbols-outlined" type="button">add</button>
        </div>
        <li class="dashboard__item" v-for="unit in searchResults.length > 0 ? searchResults : filteredUnits" :key="unit.id">
            <p>{{ unit.Name }}</p>
            <p style="display:flex;">{{ unit.Type }}</p>
        </li>
    </div>
</template>

<script>
import searchComponent from './SearchComponent.vue'
    export default {

        data () {
            return {
                currentSelection : 'All',
                unitSelection: [],
                searchResults: []
            }
        },

        methods : {
            changeView(value) {
                this.currentSelection = value
            },
            searchData(data) {
                this.searchResults = data
            }
        },

        props : {
            units: Array
        },

        components : {
            searchComponent
        },

        computed: {
            filteredUnits () {
                if (this.currentSelection == 'Trucks') {
                return this.units.filter(unit => unit.Type === "Truck");
            }
            else if (this.currentSelection == 'Trailers') {
                return this.units.filter(unit => unit.Type === "Trailer");
            }else {
                return this.units
            }
            }
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
        grid-template-rows: 35px auto;
        width: 90%;
        background: $white;
        box-sizing: content-box;
        box-shadow: 0px 1px 3px 1px rgba(0, 0, 0, 0.15), 0px 1px 2px 0px rgba(0, 0, 0, 0.30); 
        height:50vh;
        border-radius: 16px;
        overflow-x: hidden;
        overflow-y: scroll;
        max-width: 900px;
        li:first-of-type {
            margin-top: 10px;
        }
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
           padding: 0 10px;
           display: grid;
           grid-template-columns: 1fr 1fr;
           align-content: center;
           &:hover {
            background-color: rgba($blue,0.3);
            border-radius: 5px;
           }
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
            .tab__addUnit {
                border-radius: 99em;
                width: 50%;
                max-width: 35px;
                aspect-ratio: 1/1;
                border: none;
                background-color: $green;
                color: $white;
                position: relative;
                top: 60%;
                margin: 0 0 0 10px;
                box-shadow: 0px 1px 3px 1px rgba(0, 0, 0, 0.15), 0px 1px 2px 0px rgba(0, 0, 0, 0.30); 
            }
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
