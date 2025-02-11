<script>
import {useGenreStore} from '@stores/GenreStore.mjs'
import {useAuthorStore} from '@stores/AuthorStore.mjs'

export default{
  async mounted(){
    await useGenreStore().getGenres();
    await useAuthorStore().getAuthors();
  }
}
</script>

<template>
  <RouterView />
</template>
