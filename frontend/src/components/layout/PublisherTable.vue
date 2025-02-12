<template>
    <table class="w-[80%] mx-auto">
        <thead>
            <tr>
                <th class="p-2 text-left bg-orange-100">Name</th>
                <th class="p-2 text-left bg-orange-100">Country</th>
                <th class="p-2 text-left bg-orange-100">Founded</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="publisher in publishers" :key="publisher.id" class="odd:bg-orange-400 even:bg-orange-100">
                <td class="p-2" v-if="publisher.website != null">
                    <RouterLink :to="publisher.website">
                        {{ publisher.name }}
                    </RouterLink>
                </td>
                <td class="p-2" v-else>
                    {{ publisher.name }}
                </td>
                <td class="p-2">{{ publisher.country }}</td>
                <td class="p-2">{{ publisher.founded }}</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
import { usePublisherStore } from '@stores/PublisherStore';
import { mapState } from 'pinia';
export default {
    computed: {
        ...mapState(usePublisherStore, ["publishers"])
    }
}
</script>