<template>
    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
        <div class="inline-block shadow rounded-lg">
            <h5 class="text-center my-2">{{ week }}<sub>{{ ordinal(week) }}</sub> Week Match Result</h5>
            <table class="leading-normal overflow-hidden">
                <thead>
                <tr>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Home
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Res.
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Res.
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Away
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="match in weekMatches">
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm w-2/5">
                        <div class="flex items-center">
                            <div class="ml-3">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ match.first_team.name }}
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap text-center">
                            {{ match.first_team_goals }}
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap text-center">
                            {{ match.second_team_goals }}
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm w-2/5">
                        <div class="flex items-center float-right">
                            <div class="mr-3">
                                <p class="text-gray-900 whitespace-no-wrap text-right">
                                    {{ match.second_team.name }}
                                </p>
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: "MatchResults",
    props: ['weekMatches', 'week'],
}
</script>

<style scoped>

</style>
