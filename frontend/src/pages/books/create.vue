<template>
<BaseLayout>
    <h1 class="text-center my-8 text-6xl">Create a new book</h1>
    <FormKit type="form" :actions="false" @submit="submit" :classes="{
      form: 'w-[80%] mx-auto',
    }">
        <FormKit type="text" label="ISBN" name="isbn" validation="alphanumeric|required|length:13,13" :classes="{
            wrapper: 'block mx-auto'
        }"/>
        <FormKit type="text" label="Language" name="language" validation="alpha|required|length:4,30" :classes="{
            wrapper: 'block mx-auto'
        }"/>
        <FormKit type="text" label="Title" name="title" validation="string|required|length:2,80" :classes="{
            wrapper: 'block mx-auto'
        }"/>
        <FormKit type="number" label="Pages" name="pages" validation="number|required|min:1" :classes="{
            wrapper: 'block mx-auto'
        }"/>
        <FormKit type="date" label="Published date" name="published_date" validation="date_before_or_equal|required" :classes="{
            wrapper: 'block mx-auto'
        }"/>
        <FormKit type="textarea" label="Description" name="description" validation="alphanumeric|length:0,1000" :classes="{
            wrapper: 'block mx-auto'
        }"/>
        <FormKit type="select" label="Genre" name="genre_id" :options="genreOptions" :classes="{
            wrapper: 'block mx-auto'
        }"/>
        <FormKit type="select" label="Author" name="author_id" :options="authorOptions" :classes="{
            wrapper: 'block mx-auto'
        }"/>
        <FormKit type="select" label="Publisher" name="publisher_id" :options="publisherOptions" :classes="{
            wrapper: 'block mx-auto'
        }"/>
        <FormKit type="submit" :classes="{
            wrapper: 'w-fit block mx-auto',
            input: 'bg-orange-400'
        }">Create</FormKit>
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