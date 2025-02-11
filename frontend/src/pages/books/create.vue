<template>
<BaseLayout>
    <h1 class="text-center my-8 text-6xl">Create a new book</h1>
    <FormKit type="form" :actions="false" @submit="submit">
        <FormKit type="text" label="Language" name="language" validation="alpha|required|length:4,30"/>
        <FormKit type="text" label="Title" name="title" validation="alphanumeric|required|length:2,80"/>
        <FormKit type="number" label="Pages" name="pages" validation="number|required|min:1"/>
        <FormKit type="date" label="Published date" name="published_date" validation="date_before_or_equal|required"/>
        <FormKit type="text" label="Description" name="description" validation="alphanumeric|length:0,1000"/>
        <FormKit type="select" label="Genre" name="genre_id" :options="genreOptions"/>
        <FormKit type="select" label="Author" name="author_id" :options="authorOptions"/>
        <FormKit type="select" label="Publisher" name="publisher_id" :options="publisherOptions"/>
        <FormKit type="submit">Create</FormKit>
    </FormKit>
</BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue';
import { useBookStore } from '@stores/BookStore.mjs';
import { mapActions } from 'pinia';
export default {
    components: {
        BaseLayout
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