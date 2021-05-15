<template>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                <pagination :url="'/test'"
                            :currentPage="pageData.current_page"
                            :lastPage="pageData.last_page"

                            :textOptions="{
                                text: 'some text 123',
                                position: 'top',
                                'textClass': 'badge badge-primary'
                            }"
                            :ulClass="'pagination-sm'"
                            @pagination-update="paginationUpdate"/>

                <table class="table table-striped table-bordered bootstrap-datatable  dataTable">
                    <thead>
                    <tr>
                        <th>
                            name
                        </th>

                    </tr>
                    </thead>

                    <tbody role="alert" aria-live="polite" aria-relevant="all">

                    <tr v-for="map in pageData.data">

                        <td>
                            {{map.name}}
                        </td>

                    </tr>

                    </tbody>

                </table>

                <pagination :url="'/test'" :ulClass="'pagination-lg'" :currentPage="pageData.current_page" :lastPage="pageData.last_page" @pagination-update="paginationUpdate"/>

            </div>
        </div>
    </div>

</template>

<script>

    import { usePage } from '@inertiajs/inertia-vue3'
    import { computed } from 'vue'
    import pagination from 'tb-vue3-laravel-lnertia-pagination'

    export default {
        components: {
            pagination
        },
        setup() {

            let pageData = computed({
                get: () => usePage().props.value.pageData,
                set: (obj) =>  {
                    usePage().props.value.pageData = obj
                }
            })

            //callback from pagination component
            function paginationUpdate(pagination) {

                pageData.value = pagination.data.pageData
            }
            return { pageData, paginationUpdate }
        }
    }
</script>