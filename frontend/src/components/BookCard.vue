<template>
    <div class="border border-orange-400 rounded-md flex flex-col flex-nowrap justify-between">
        <h5 class="text-center bg-orange-400 rounded-t-md p-2 text-xl">
            {{ book.title }}
        </h5>
        <p class="text-center py-3">
            {{ book.author.name }} - {{ book.genre.name }} ({{ book.published_date }})
        </p>
        <div >
            <RouterLink class="bg-orange-400 p-2 text-center underline block mx-auto" :to="{name: 'book-show', params: {id: book.isbn}}">
                View details
            </RouterLink>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        book: Object
    }
}
</script>