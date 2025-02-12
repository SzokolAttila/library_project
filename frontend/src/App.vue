<script>
import {useGenreStore} from '@stores/GenreStore.mjs'
import {useAuthorStore} from '@stores/AuthorStore.mjs'
import {usePublisherStore} from '@stores/PublisherStore.mjs'
import {useBookStore} from '@stores/BookStore.mjs'

export default{
  async mounted(){
    await useGenreStore().getGenres();
    await useAuthorStore().getAuthors();
    await usePublisherStore().getPublishers();
    await useBookStore().getBooks();
  },
  watch: {
    async $route(){
      await useGenreStore().getGenres();
      await useAuthorStore().getAuthors();
      await usePublisherStore().getPublishers();
      await useBookStore().getBooks();
    }
  }
}
</script>

<template>
  <RouterView />
</template>
