<template>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Nationality</th>
                <th>Birth Date</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="author of authors" class="odd:bg-orange-400 even:bg-orange-100">
                <td>{{ author.name }}</td>
                <td>{{ author.nationality }}</td>
                <td>{{ author.birth_date }}</td>
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