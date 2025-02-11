<template>
    <FormKit type="form" :actions="false" @submit="sendForm">
        <FormKit type="text" label="Language" name="language" validation="alpha|required|length:4,30">{{book.language}}</FormKit>
        <FormKit type="text" label="Title" name="title" validation="alphanumeric|required|length:4,80">{{book.title}}</FormKit>
        <FormKit type="number" label="Pages" name="pages" validation="number|required|min:1">{{book.pages}}</FormKit>
        <FormKit type="date" label="Published date" name="published_date" validation="date_before_or_equal|required">{{book.published_date}}</FormKit>
        <FormKit type="text" label="Description" name="description" validation="alphanumeric|length:0,1000">{{book.description}}</FormKit>
        <FormKit type="select" label="Genre" name="genre_id" :options="genreOptions" :selected="book.genre.id"/>
        <FormKit type="select" label="Author" name="author_id" :options="authorOptions" :selected="book.author.id"/>
        <FormKit type="select" label="Publisher" name="publisher_id" :options="publisherOptions" :selected="book.publisher.id"/>
        <FormKit type="submit">Modify</FormKit>
        <FormKit type="button" @click="deleteBtn">Delete</FormKit>
    </FormKit>
</template>

<script>
import {useGenreStore} from '@stores/GenreStore.mjs'
import {useAuthorStore} from '@stores/AuthorStore.mjs'
import {usePublisherStore} from '@stores/PublisherStore.mjs'
import {useBookStore} from '@stores/BookStore.mjs'
import { mapActions, mapState } from 'pinia'

export default{
    data(){
        return {
            book: {}
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
    }
}
</script>

<route lang="json">
{
    "name": "book-show"
}
</route>