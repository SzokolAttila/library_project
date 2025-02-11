<template>
    <BaseLayout>
        <h1 class="text-center my-8 text-6xl">
            Publishers
        </h1>
        <PublisherTable/>
    </BaseLayout>
</template>

<script>

import PublisherTable from '@components/layout/PublisherTable.vue';
import BaseLayout from '@layouts/BaseLayout.vue';
export default {
    components: {
        BaseLayout,
        PublisherTable
    }
}

</script>

<route lang="json">
    {
        "name": "publishers"
    }
</route>