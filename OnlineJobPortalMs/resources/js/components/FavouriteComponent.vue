<template>
    <div>

        <button v-if="show" @click.prevent="unSave()" class="btn btn-dark text-white" style="width: 100%;">UnSave job
        </button>

        <button v-else @click.prevent="save()" class="btn btn-info text-white" style="width: 100%;">Save this job
        </button>


    </div>
</template>

<script>
export default {
    props: ['jobid', 'favorited'],
    data() {
        return {
            'show': true
        }
    },

    mounted() {
        //control show(button Above)
        this.show = this.jobFavorited ? true : false;
    },

    computed: {
        jobFavorited() {
            return this.favorited //d props
        }
    },
    methods: {
        save() {
            axios.post('/save/' + this.jobid).then(response => this.show = true).catch(error => alert('error'))
        },
        unSave() {
            axios.post('/unsave/' + this.jobid).then(response => this.show = false).catch(error => alert('error'))
        }
    }
}
</script>
