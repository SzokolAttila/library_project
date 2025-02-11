<script>
import {useGenreStore} from '@stores/GenreStore.mjs'

export default{
  async mounted(){
    await useGenreStore().getGenres();
  }
}
</script>

<template>
  <RouterView />
</template>
