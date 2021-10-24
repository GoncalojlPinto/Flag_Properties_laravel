export default {
    props: ['property', 'favorited'],

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
        favorite(property) {
            axios.property('/favorite/'+property)
                .then(response => this.isFavorited = true)
                .catch(response => console.log(response.data));
        },

        unFavorite(property) {
            axios.property('/unfavorite/'+property)
                .then(response => this.isFavorited = false)
                .catch(response => console.log(response.data));
        }
    }
}
