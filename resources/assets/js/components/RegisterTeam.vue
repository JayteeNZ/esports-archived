<template>
	<div style="width: 360px">
		<div v-show="!nextStep">
			<div class="header text-center">
				<small>YOU'RE SIGNING UP FOR THE</small>
				<h4 class="mt-1"><a :href="'/tournament/' + this.tournament.id" class="text-dark">{{ tournament.name }}</a></h4>
			</div>
			<hr>
			<div class="team-details">
				<form action="#" method="#">
					<div class="form-group" :class="{ 'has-danger': this.errors }">
						<input type="text" v-model="name" class="form-control" placeholder="What's your team name?">
						<div class="form-control-feedback" v-show="this.errors" v-text="this.errors[0]"></div>
					</div>
					<div class="form-group">
						<button class="btn btn-success btn-sm" @click.prevent="setTeamName()">Next</button>
					</div>
				</form>
			</div>
		</div>
		<div v-show="nextStep">
			<div class="header text-center">
				<small>YOUR TEAM NAME IS</small>
				<h4 class="mt-1 text-dark">{{ this.name }}</h4>
				<small>Next, invite some users. You can invite {{ players }} players</small>
			</div>
			<hr>
			<div class="team-details">
				<div class="users">
					<table class="table">
						<tr>
							<th>You</th>
							<td class="text-right">Leader</td>
						</tr>
						<tr v-for="user in users">
							<th v-text="user"></th>
							<td style="text-align: right">Member</td>
						</tr>
					</table>
				</div>
				<div class="form-group" v-show="!limitReached">
					<input type="text" ref="addPlayer" class="form-control" placeholder="Search by username" v-model="user" @keydown.enter="add">
				</div>
				<div class="form-group">
					<button class="btn btn-primary btn-sm" v-show="!limitReached" @click="add">Send Invitation</button>
					<button class="btn btn-success btn-sm" v-show="limitReached" @click="finish">Finish</button>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: ['tournament'],

		data() {
			return {
				name: '',
				errors: false,
				nextStep: false,
				user: '',
				users: [],
				limitReached: false,
				count: 1,
				team: null
			}
		},

		methods: {
			// Sends a post request to the server to see if team name exists
			// if not it proceeds to the next step and retains team name
			setTeamName() {
				axios.post('/api/teams/validate', { name: this.name, tournament: this.tournament })
					.then(response => { this.nextStep = true; })
					.catch(response => { this.errors = response.response.data.errors; });
			},

			// Responsible for adding a new user to the list ready to send
			add() {
				if (this.limitReached) { return; }
				this.users.push(this.user);
				this.setItems();
			},

			// resets the forms and counts
			setItems() {
				this.count += 1;
				this.user = '';
				this.$refs.addPlayer.focus();
			},

			// redirect after team creation
			finish() {
				return window.location.href = `/tournaments/${this.tournament.id}`;
			}
		},

		watch: {
			count: function () {
				if (this.count == this.tournament.players) {
					this.limitReached = true;
				}
			}
		},

		computed: {
			players() {
				return this.tournament.players - 1;
			}
		}
	}
</script>
