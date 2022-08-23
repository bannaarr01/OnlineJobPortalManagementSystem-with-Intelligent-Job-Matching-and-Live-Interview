<template>
    <div class="form-group ml-2">
        <h5 style="color: #010483; font-weight: 700;">Search for a User</h5>
        <div>
            <div class="form-group has-search">
                <span class="fa fa-search form-control-feedback"></span>
                <input type="text" v-model="keyword" class="form-control border-secondary" placeholder="Search users"
                       v-on:keyup="searchusers()">
            </div>

        </div>

        <!--Show only if there is result-->
        <div class="card-footer foot" v-if="results.length">
            <ul class="list-group">
                <li class="list-group-item" v-for="result in results" v-bind:key="result">
                    <a id="searchuser" :href=" '/user/'+result.id+'/' ">{{ result.email }}</a>

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
        searchusers() {
            this.results = [];
            if (this.keyword.length > 0) {
                axios.get('/users/search', {params: {keyword: this.keyword}}).then(response => {
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

#searchuser {
    color: #007bff;
}

#searchuser:hover {
    color: #03adfc;
}

.admin {
    background-color: #011069;
}

.list-group, .list-group-item {
    background-color: #011069;

}

.list-group-item:hover {
    background-color: grey;

}

.list-group, .list-group-item, a {
    color: #fff;
}

.list-group, .list-group-item, a:hover {
    color: #ffff;
}

.admin-img {
    background-color: darkgrey;
}

.adminimg, .tabhead, .blog-head {
    background-color: #011069;
}

.blog-border {
    border: 1px solid #011069 !important;
}

.btn-admin {
    background-color: #011069;
}

.btn-admin:hover {
    background-color: #1e34ba;
}
</style>


