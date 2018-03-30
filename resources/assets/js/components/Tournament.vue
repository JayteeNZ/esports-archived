<template>
	<div class="tournament">
	    <div class="tournament-image" :style="background">
	        <div class="overlay-dark-soft"></div>
	        <div class="tags">
	            <span class="badge badge-purple">{{ data.platform.display_name }}</span>
	            <span class="badge badge-purple">{{ data.game.display_name }}</span>
	        </div>
	    </div>
	    <div class="information">
	        <h3 class="tournament-name text-dark"><a :href="url">{{ data.name }}</a></h3>
	        <div class="text-light-muted font-sm letter-spacing text-uppercase">
	            <span class="font-xs">{{ formattedDate }} NZT</span>
	        </div>
	    </div>
	</div>
</template>

<script>
	let moment = require('moment');
	export default {
		props: ['tournament'],
		data() {
			return {
				data: [],
				backgroundImage: 'https://psmedia.playstation.com/is/image/psmedia/call-of-duty-ghosts-listing-thumb-01-ps4-eu-03nov14?$Icon$'
			}
		},

		created() {
			this.data = this.tournament;
		},

		computed: {
			players() {
				return this.data.players + 'v' + this.data.players;
			},

			background() {
				return {
					'background-image': `url(${this.backgroundImage})`,
				};
			},

			url() {
				return '/tournaments/' + this.data.id;
			},

			formattedDate() {
				return moment(this.data.starts_at).format('Mo MMM - h:mm A');
			}
		},
	}
</script>