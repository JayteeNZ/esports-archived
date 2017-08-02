<template>
	<div>
		<input type="text" class="form-control" v-model="search" @keyup="fuzzy" ref="searcher" :name="this.name" autocomplete="off"
			:class="{ 'no-border': this.results }">
		<div style="display: flex; flex-direction: column" class="search-dropdown">
			<li v-for="result in filteredResults" v-text="result.username" @click="add(result.username)"></li>
		</div>
	</div>
</template>

<script>
	import Fuse from 'fuse.js';
	export default {
		props: [
			'data',
			'name'
		],
		data() {
			return {
				search: '',
				results: [],
				selected: [],
				options: {
					shouldSort: true,
					threshold: 0.6,
					location: 0,
					distance: 100,
					maxPatternLength: 32,
					minMatchCharLength: 1,
					keys: [
						'username'
					]
				}
			}
		},

		methods: {
			fuzzy() {
				var fuse = new Fuse(this.data, this.options);
				this.results = fuse.search(this.search);
			},

			add(result) {
				this.selected.push(result);
				this.$refs.searcher.focus();
				this.results = '';
				this.search = result;
			}
		},

		computed: {
			filteredResults() {
				return this.results.slice(0, 10);
			}
		}
	}
</script>

<style lang="scss">
	.search-dropdown { background: #fff; box-shadow: 1px 1px 4px rgba(0, 0, 0, .1)}
	.search-dropdown li {
		list-style: none;
		padding: .5rem 1rem;
		color: #444;
		&:hover {
			background: #2575dc;
			color: #fff;
		}
	}

	.no-border {
		border-bottom-left-radius: 0;
		border-bottom-right-radius: 0;
	}
</style>