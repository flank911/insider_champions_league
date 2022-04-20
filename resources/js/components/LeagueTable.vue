<template>
    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
        <div class="inline-block shadow rounded-lg overflow-hidden">
            <table class="leading-normal">
                <thead>
                <tr>
                    <th
                        class="px-4 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">

                    </th>
                    <th
                        class="px-4 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Teams
                    </th>
                    <th
                        class="px-4 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Str
                    </th>
                    <th
                        class="px-4 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        PTS
                    </th>
                    <th
                        class="px-4 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        P
                    </th>
                    <th
                        class="px-4 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        W
                    </th>
                    <th
                        class="px-4 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        D
                    </th>
                    <th
                        class="px-4 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        L
                    </th>
                    <th
                        class="px-4 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        GD
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="row in league" :key="row.id">
                    <td class="px-4 py-3 border-b border-gray-200 bg-white text-sm w-2/5">
                        <img :src=row.team.img />
                    </td>
                    <td class="px-4 py-3 border-b border-gray-200 bg-white text-sm w-2/5">
                        {{ row.team.name }}
                    </td>
                    <td class="px-4 py-3 border-b border-gray-200 bg-white text-sm">
                        {{ row.team.strength }}
                    </td>
                    <td class="px-4 py-3 border-b border-gray-200 bg-white text-sm">
                        {{ row.points }}
                    </td>
                    <td class="px-4 py-3 border-b border-gray-200 bg-white text-sm">
                        {{ row.played }}
                    </td>
                    <td class="px-4 py-3 border-b border-gray-200 bg-white text-sm">
                        {{ row.won }}
                    </td>
                    <td class="px-4 py-3 border-b border-gray-200 bg-white text-sm">
                        {{ row.draw }}
                    </td>
                    <td class="px-4 py-3 border-b border-gray-200 bg-white text-sm">
                        {{ row.lost }}
                    </td>
                    <td class="px-4 py-3 border-b border-gray-200 bg-white text-sm">
                        {{ row.goal_difference }}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: "LeagueTable",
    props: ['league'],
}
</script>

<style scoped>

</style>
