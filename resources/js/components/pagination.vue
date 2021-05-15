<template>
    <div>
        <p v-if="textOptions && textOptions.position.toLowerCase() ==='top'" :class="labelCss ? labelCss : ''">
            <span :class="textOptions.textClass">{{ textOptions.text }}</span>
        </p>

        <nav>

            <ul class="pagination" :class="ulClass ? ulClass : ''">

                <li class="page-item" v-if="currentPage" :class="currentPage === 1 ? 'disabled' : ''">
                    <a class="page-link"  @click="getPaginationData(url, currentPage-1)">Previous</a>
                </li>

                <li v-for="page in lastPage" class="page-item" :class="page ===currentPage ? paginationActiveClass : ''">
                    <a class="page-link" @click="getPaginationData(url, page)">{{ page }}</a>
                </li>

                <li class="page-item" v-if="currentPage" :class="lastPage === currentPage ? 'disabled' : ''">
                    <a class="page-link" @click="getPaginationData(url, currentPage+1)">Next</a>
                </li>

            </ul>
        </nav>

        <p v-if="textOptions && textOptions.position.toLowerCase() !=='top'" :class="labelCss ? labelCss : ''">
            <span :class="textOptions.textClass">{{ textOptions.text }}</span>
        </p>
    </div>
</template>

<script>
    import axios from 'axios';

    export default  {
        name: 'pagination',
        props: {
            url: String,
            labelCss: String,
            ulClass: String,
            textOptions: Object,
            lastPage: Number,
            currentPage: Number,
            paginationActiveClass: {
                type: String,
                default: 'active'
            }
        },
        setup(props, ctx) {

            const emitPagination = function(data) {

                ctx.emit('pagination-update',data);
            }

            function getPaginationData(link, page) {
                axios.post(props.url, {
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    page: page
                })
                    .then(function (response) {
                        emitPagination(response)
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
            }
            return { getPaginationData, emitPagination }
        }
    }
</script>