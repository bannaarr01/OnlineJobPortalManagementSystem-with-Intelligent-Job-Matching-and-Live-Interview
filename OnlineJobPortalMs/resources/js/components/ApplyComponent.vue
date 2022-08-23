<template>
    <div>
        <form @submit="formSubmit">
            <button v-if="show" type="submit" class="btn btn-primary mb-2" style="width: 100%;"><span><i
                class="fas fa-check"></i></span> Apply Now
            </button>
            <div v-else class="alert alert-primary">
                Application sent successfully
            </div>


        </form>

    </div>
</template>

<script>
export default {
    props: ['jobid'],
    mounted() {
        console.log('Component mounted.')
    },
    data() {
        return {
            'show': true
        }
    },
    methods: {
        formSubmit(e) {
            e.preventDefault();
            axios.post('/applications/' + this.jobid, {}).then((response) => {
                this.show = false

            }).catch((error) => {
                alert('error')
            });
        }
    }
}
</script>
