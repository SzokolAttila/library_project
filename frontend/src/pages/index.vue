<template>
  <BaseLayout>
    <h1 class="my-8 text-center text-6xl">
      Books
    </h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
      <BookCard v-for="book in books" :key="book.isbn" :book />
    </div>
  </BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue'
import BookCard from '@components/BookCard.vue';
import { mapState } from 'pinia';
import { useBookStore} from '@stores/BookStore';

export default {
  computed: {
    ...mapState(useBookStore, ["books"])
  },
  components: {
    BaseLayout,
    BookCard
  },
}
</script>

<route lang="json">
  {
    "name": "home"
  }
</route>
