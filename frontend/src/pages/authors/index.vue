<template>
    <BaseLayout>
        <h1 class="text-6xl text-center my-8">All Authors</h1>
        <AuthorTable class="w-[80%] mx-auto"></AuthorTable>
    </BaseLayout>
</template>

<script>
import AuthorTable from '@components/layout/AuthorTable.vue';
import BaseLayout from '@layouts/BaseLayout.vue'

export default{
    components:{
        AuthorTable,
        BaseLayout
    }
}
</script>

<route lang="json">
{
    "name": "authors" 
}
</route>