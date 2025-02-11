<script>
import {useGenreStore} from '@stores/GenreStore.mjs'
import {useAuthorStore} from '@stores/AuthorStore.mjs'
import {usePublisherStore} from '@stores/PublisherStore.mjs'

export default{
  async mounted(){
    await useGenreStore().getGenres();
    await useAuthorStore().getAuthors();
    await usePublisherStore().getPublishers();
  }
}
</script>

<template>
  <RouterView />
</template>
