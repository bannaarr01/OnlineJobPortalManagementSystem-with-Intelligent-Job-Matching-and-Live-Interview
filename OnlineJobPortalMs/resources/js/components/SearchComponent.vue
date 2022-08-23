<template>
    <div class="form-group ml-2">
        <h5 style="color: #010483; font-weight: 700;">Search for a Company</h5>
        <div>
            <div class="form-group has-search">
                <span class="fa fa-search form-control-feedback"></span>
                <input type="text" v-model="keyword" class="form-control border-secondary"
                       placeholder="Search companies" v-on:keyup="searchcompanies()">
            </div>
        </div>

        <!--Show only if there is result-->
        <div class="card-footer foot" v-if="results.length">
            <ul class="list-group">
                <li class="list-group-item" v-for="result in results" v-bind:key="result">
                    <a id="searchcomp" :href=" '/company/'+result.id+'/'+result.slug+'/' ">{{ result.cname }}</a>

                </li>
            </ul>
        </div>

    </div>
</template>

<script>
export default {
    data() {
        return {
            keyword: '',
            results: [],
        }
    },
    methods: {
        searchcompanies() {
            this.results = [];
            if (this.keyword.length > 0) {
                axios.get('/companies/search', {params: {keyword: this.keyword}}).then(response => {
                    this.results = response.data
                });
            }
        }
    }
}
</script>

<style>
.has-search .form-control {
    padding-left: 2.375rem;
}

.has-search .form-control-feedback {
    position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 2.375rem;
    text-align: center;
    pointer-events: none;
    color: #aaa;
}

.foot {
    background-color: #fff;
}

#searchcomp {
    color: #007bff;
}

#searchcomp:hover {
    color: #03adfc;
}
</style>
