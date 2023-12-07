<template>
	<input
		class="search"
		type="text"
		placeholder="Search:"
		v-model="searchInput"
		@input="filterSearch()"
	/>
</template>

<script>
import { watch, ref } from 'vue';
export default {
	name: "SearchComponent",
	data() {
		return {
			results: [],
		};
	},
	props: {
		selection: Array,
	},

  mounted() {
    this.results = this.selection
    watch(
      () => this.selection,
      (newValue) => {
        this.results = newValue;
        this.searchInput = "";
        this.filteredData = [];
        this.$emit('returnedSearch', []);
      }
    );
  },

    methods: {
        filterSearch() {
            let filteredData = [];
            if (this.searchInput.length >= 2) {
                filteredData = this.selection.filter((unit) => {
                return unit.Name.toLowerCase().includes(this.searchInput.toLowerCase());
                });
            } else {
                filteredData = this.selection;
            }
            this.$emit('returnedSearch', filteredData); 
            },
        },
    };
</script>

<style lang="scss" scoped>
@import "resources/sass/_colors.scss";
.search {
	border-radius: 12px;
	outline: none;
	border: none;
	width: 50%;
	justify-self: end;
	padding: 4px 8px;
	margin: 10px 10px 0 0;
	box-shadow: 0px 1px 3px 1px rgba(0, 0, 0, 0.15),
		0px 1px 2px 0px rgba(0, 0, 0, 0.3);
	grid-column: 3/4;
	font-family: "Roboto";
	font-weight: 300;
}
</style>