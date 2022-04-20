<template>
    <div class="container mx-auto px-4 sm:px-8 py-8 flex justify-around flex-wrap">
        <div class="my-4">
            <h2 class="text-2xl font-normal leading-tight">League Table</h2>
            <league-table :league="league"></league-table>
            <div class="flex justify-between">
                <button @click="playAll()" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Play All
                </button>
                <button @click="playAll()" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Set values
                </button>
                <button @click="playNextWeek()"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Next Week
                </button>
            </div>
        </div>

        <div class="my-4">
            <h2 class="text-2xl font-normal leading-tight">Match Results</h2>
            <div v-for="(match, index) in matches" :key="index">
                <match-results :week-matches="Object.entries(match)[0][1]"
                               :week="Object.keys(match)[0]"></match-results>
            </div>
        </div>

        <div class="my-4">
            <predictions :predictions="predictions" :week="currentWeek.number"></predictions>
            <div class="flex justify-between">
                <button @click="getPredictions()"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Predict
                </button>
                <button @click="refresh()"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Refresh
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import LeagueTable from "../components/LeagueTable";
import MatchResults from "../components/MatchResults";
import Predictions from "../components/Predictions";

export default {
    components: {Predictions, MatchResults, LeagueTable},
    data() {
        return {
            currentWeek: {
                id: null,
                number: 0,
                played: true,
                season: '',
            },
            league: [],
            matches: [],
            predictions: [],
        }
    },
    mounted() {
        this.getCurrentWeek();
        this.getLeague();
        this.getPredictions();
    },
    methods: {
        getCurrentWeek() {
            this.$api.getCurrentWeek().then((res) => {
                if (res.data.week) {
                    this.currentWeek = res.data.week;
                    this.getWeekMatches(this.currentWeek);
                }
            })
        },
        getLeague() {
            this.$api.getLeague().then((res) => {
                this.league = res.data.league;
            })
        },
        getWeekMatches(week) {
            this.$api.getWeekMatches(week.id).then((res) => {
                this.matches.push({[week.number]: res.data.matches});
            })
        },
        getPredictions() {
            this.$api.getPredictions().then((res) => {
                this.predictions = res.data.predictions;
            })
        },
        playNextWeek() {
            this.$api.playNextWeek().then((res) => {
                this.currentWeek = res.data.week;
                this.getLeague();
                this.getWeekMatches(this.currentWeek);
            }).catch((error) => {
                alert(error.response.data.message);
            })
        },
        playAll() {
            this.$api.playAll().then((res) => {
                this.currentWeek = res.data.week;
                this.getLeague();
                let matches = res.data.matches;
                for (const matchesKey in matches) {
                    this.matches.push({[matchesKey]: matches[matchesKey]});
                }
            }).catch((error) => {
                alert(error.response.data.message);
            })
        },
        refresh() {
            this.$api.refresh().then((res) => {
                this.$router.push({
                    path: '/home'
                })
            }).catch((error) => {
                alert(error.response.data.message);
            })
        }
    }
}
</script>
