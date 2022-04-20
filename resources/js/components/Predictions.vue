<template>
    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
        <div class="inline-block shadow rounded-lg">
            <h5 class="text-center my-2 mx-6">{{ week }}<sub>{{ ordinal(week) }}</sub> Week Predictions</h5>
            <table class="leading-normal overflow-hidden w-full">
                <tbody>
                <tr v-for="(prediction, index) in predictions" :key="index">
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-left">
                        {{ index }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-right">
                        {{ formatNumber(prediction) }}%
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: "Predictions",
    props: ['predictions', 'week'],
}
</script>

<style scoped>

</style>
