<template>
    <table>
        <thead>
            <tr class="bg-orange-100">
                <th class="p-2 text-left">Name</th>
                <th class="p-2 text-left">Nationality</th>
                <th class="p-2 text-left">Birth Date</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="author of authors" class="odd:bg-orange-400 even:bg-orange-100">
                <td class="p-2">{{ author.name }}</td>
                <td class="p-2">{{ author.nationality }}</td>
                <td class="p-2">{{ author.birth_date }}</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
import {mapActions, mapState} from 'pinia'
import {useAuthorStore} from '@stores/AuthorStore.mjs'

export default{
    computed:{
        ...mapState(useAuthorStore, ['authors'])
    },
    methods:{
        ...mapActions(useAuthorStore, ['getAuthors'])
    },
    async mounted(){
        await this.getAuthors();
    }
}
</script>