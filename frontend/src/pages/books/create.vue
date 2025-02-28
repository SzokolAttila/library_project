<template>
<BaseLayout>
    <h1 class="text-center my-8 text-6xl">Create a new book</h1>
    <FormKit type="form" :actions="false" @submit="submit">
        <FormKit type="text" label="ISBN" name="isbn" validation="alphanumeric|required|length:13,13" validation-visibility="live"/>
        <FormKit type="text" label="Language" name="language" validation="alpha|required|length:4,30" validation-visibility="live"/>
        <FormKit type="text" label="Title" name="title" validation="string|required|length:2,80" validation-visibility="live"/>
        <FormKit type="number" label="Pages" name="pages" validation="number|required|min:1" validation-visibility="live"/>
        <FormKit type="date" label="Published date" name="published_date" validation="beforeOrEqualToday|required" validation-visibility="live"/>
        <FormKit type="textarea" label="Description" name="description" validation="alphanumeric|length:0,1000" validation-visibility="live"/>
        <FormKit type="select" label="Genre" name="genre_id" :options="genreOptions" />
        <FormKit type="select" label="Author" name="author_id" :options="authorOptions"/>
        <FormKit type="select" label="Publisher" name="publisher_id" :options="publisherOptions"/>
        <FormKit type="submit" id="create-button">Create</FormKit>
    </FormKit>
</BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue';
import { useBookStore } from '@stores/BookStore.mjs';
import { useGenreStore } from '@stores/GenreStore';
import { usePublisherStore } from '@stores/PublisherStore';
import { useAuthorStore } from '@stores/AuthorStore';
import { mapActions, mapState } from 'pinia';
export default {
    components: {
        BaseLayout
    },
    computed: {
        ...mapState(useAuthorStore, ["authorOptions"]),
        ...mapState(usePublisherStore, ["publisherOptions"]),
        ...mapState(useGenreStore, ["genreOptions"]),
    },
    methods: {
        ...mapActions(useBookStore, ["postBook"]),
        async submit(data){
            await this.postBook(data);
            this.$router.push({name: 'home'});
        } 
    }
}
</script>

<route lang="json">
    {
        "name": "create-book"
    }
</route>