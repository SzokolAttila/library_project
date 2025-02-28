<template>
    <BaseLayout>
        <BaseSpinner class="mx-auto mt-10" v-if="loading"></BaseSpinner>
        <div v-else>
            <h1 class="text-center text-6xl my-8">{{ book.author.name }} - {{ book.title }}</h1>
            <FormKit type="form" :actions="false" @submit="sendForm" >
                <FormKit input-class="w-full" type="text" label="Language" name="language" validation="alpha|required|length:4,30" :value="book.language" validation-visibility="live"></FormKit>
                <FormKit input-class="w-full" type="text" label="Title" name="title" validation="required|length:2,80" :value="book.title" validation-visibility="live"></FormKit>
                <FormKit input-class="w-full" type="number" label="Pages" name="pages" validation="number|required|min:1" :value="book.pages" validation-visibility="live"></FormKit>
                <FormKit input-class="w-full" type="date" label="Published date" name="published_date" validation="beforeOrEqualToday|required" :value="book.published_date" validation-visibility="live"></FormKit>
                <FormKit input-class="w-full" type="textarea" label="Description" name="description" validation="length:0,1000" :value="book.description" validation-visibility="live"></FormKit>
                <FormKit input-class="w-full" type="select" label="Genre" name="genre_id" :options="genreOptions" :value="book.genre.id"/>
                <FormKit input-class="w-full" type="select" label="Author" name="author_id" :options="authorOptions" :value="book.author.id"/>
                <FormKit input-class="w-full" type="select" label="Publisher" name="publisher_id" :options="publisherOptions" :value="book.publisher.id"/>
                <FormKit input-class="w-full mx-auto m-2 p-2 rounded text-center bg-yellow-500 font-bold" type="submit">Modify</FormKit>
                <FormKit input-class="w-full mx-auto m-2 p-2 rounded text-center bg-red-500 text-white font-bold" type="button" @click="deleteBtn">Delete</FormKit>
            </FormKit>
        </div>
    </BaseLayout>
</template>

<script>
import {useGenreStore} from '@stores/GenreStore.mjs'
import {useAuthorStore} from '@stores/AuthorStore.mjs'
import {usePublisherStore} from '@stores/PublisherStore.mjs'
import {useBookStore} from '@stores/BookStore.mjs'
import { mapActions, mapState } from 'pinia'
import BaseSpinner from '@components/layout/BaseSpinner.vue'
import BaseLayout from '@layouts/BaseLayout.vue'

export default{
    data(){
        return {
            book: {},
            loading: true
        }
    },
    computed:{
        ...mapState(useGenreStore, ['genreOptions']),
        ...mapState(useAuthorStore, ['authorOptions']),
        ...mapState(usePublisherStore, ['publisherOptions'])
    },
    methods:{
        ...mapActions(useBookStore, ['getBook', 'putBook', 'deleteBook']),
        async sendForm(data){
            await this.putBook(this.$route.params.id, data);
            this.$router.push({name: 'home'});
        },
        async deleteBtn(){
            await this.deleteBook(this.$route.params.id);
            this.$router.push({name: 'home'});
        }
    },
    async mounted(){
        this.book = await this.getBook(this.$route.params.id);
        this.loading = false;
    },
    components:{
        BaseLayout,
        BaseSpinner
    }
}
</script>

<route lang="json">
{
    "name": "book-show"
}
</route>