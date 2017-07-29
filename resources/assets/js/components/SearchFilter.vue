<template>
	<nav class="tabs-underlined centered mb-5">
		<a v-for="filter in filters" href="#" class="tab" :class="{ active: active(filter) }" v-text="filter.name" :data-filter="filter.slug" @click="selectTab(filter)"></a>
	</nav>
</template>

<script>
	import Bus from '../bus.js';
	export default {
		props: {
			data: { required: true},
			defaultText: { default: 'All'}
		},

		data() {
			return {
				filters: [],
				isActive: 'all',
			}
		},

		created() {
			this.filters = this.data;
			this.filters.unshift({
				slug: 'all',
				name: 'All'
			});
		},

		methods: {
			active(filter) {
				return filter.slug == this.isActive;
			},

			selectTab(filter) {
				this.isActive = filter.slug;
				Bus.$emit('filter.selected', filter);
			}
		},
	}
</script>