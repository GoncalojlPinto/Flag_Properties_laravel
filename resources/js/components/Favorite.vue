<template>
    <span>
        <a href="#" class="btn btn-warning" v-if="isFavorited" @click.prevent="unFavorite(post)">
            <i class="fas fa-heart-broken"></i>
        </a>

        <a href="#" class="btn btn-warning" v-else @click.prevent="favorite(post)">
            <i class="fas fa-heart"></i>
        </a>
    </span>
</template>

<script>
    export default {
        props: ['post', 'favorited'],

        data: function() {
            return {
                isFavorited: '',
            }
        },

        mounted() {
            this.isFavorited = this.isFavorite ? true : false;
        },

        computed: {
            isFavorite() {
                return this.favorited;
            },
        },

        methods: {
            favorite(post) {
                console.log(post)
                axios.post('/favorite/'+post)
                    .then(response => this.isFavorited = true)
                    .catch(response => console.log(response.data));
            },

            unFavorite(post) {
                console.log(post)
                axios.post('/unfavorite/'+post)

                    .then(response => this.isFavorited = false)
                    .catch(response => console.log(response.data));
            }
        }
    }
</script>
