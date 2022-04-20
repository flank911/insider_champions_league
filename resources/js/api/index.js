import axios from "axios"

export default {
    getCurrentWeek: () => {
        return axios.get('weeks/current');
    },
    getLeague: () => {
        return axios.get('league');
    },
    getWeekMatches: (weekId) => {
        return axios.get(`matches/${weekId}`);
    },
    getPredictions: () => {
        return axios.get('predictions');
    },
    playNextWeek: () => {
        return axios.post('matches');
    },
    playAll: () => {
        return axios.post('matches/playAll');
    },
    refresh: () => {
        return axios.get('refresh');
    },
    setValues: () => {
        return axios.post('refresh');
    }
}
