<template>
    <div class="col-lg-5 p-4 mb-8 bg-white">
        <h3 class="heading">Overall rating of your experience here</h3>
        <div class="star-rating">

            <form v-on:submit.prevent>
                <div class="row">
                    <star-rating v-model="rating" :increment="0.5" text-class="custom-text"></star-rating>
                    <button v-if="!rated" @click.prevent="setRating()" class="btn btn-primary btn-sm ml-3"
                            style="border-style: inset;">Rate
                    </button>
                </div>
            </form>


        </div>
        <hr>
        <div class="review-rating mt-n3">

            <div class="right-review">
                <div class="row-bar">
                    <div class="left-bar">5</div>
                    <div class="right-bar">
                        <div class="bar-container">
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                     aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-bar">
                    <div class="left-bar">4</div>
                    <div class="right-bar">
                        <div class="bar-container">
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 75%"
                                     aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-bar">
                    <div class="left-bar">3</div>
                    <div class="right-bar">
                        <div class="bar-container">
                            <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                     aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-bar">
                    <div class="left-bar">2</div>
                    <div class="right-bar">
                        <div class="bar-container">
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 25%"
                                     aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-bar">
                    <div class="left-bar">1</div>
                    <div class="right-bar">
                        <div class="bar-container">
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 5%"
                                     aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
    </div>
</template>

<style>
.design {
    color: #444444;

}

.design:hover {
    border: 3px solid rgb(255, 0, 100, 0.3);
    border-top: 0px;
}

.design:before {
    content: "";
    border-top: 1px solid rgb(3, 173, 252, 0.9);
}

#cont {
    margin-top: -50px;
}


.custom-text {
    border-style: groove;
    font-size: 20px;
    padding: 5px;
    width: 45px;
}

.review-rating .fawe {
    font-size: 10px;
}

.star-rating .fawe {
    font-size: 25px;
    color: grey;
}

.left-bar {
    float: left;
    width: 5%;
    margin-top: 10px;
}

.right-bar {
    margin-top: 10px;
    float: left;
    width: 95%;
}

.row-bar:after {
    content: "";
    display: table;
    clear: both;
}

.review-rating:after {
    content: "";
    display: table;
    clear: both;
}

.left-review {
    float: left;
    width: 30%;
    margin-top: 10px;
    text-align: center;
}

.right-review {
    float: left;
    width: 70%;
    margin-top: 10px;
}

.review-title {
    font-size: 56pt;
}

.review-star {
    margin: 0 0 10px 0;
}

.review-people .fawe {
    font-size: 11pt;
}

.bar-container {
    width: 100%;
    background-color: #f1f1f1;
    text-align: center;
    color: white;
}

.progress {
    height: 18px;
}


.star-rating {
    text-align: center;
}

.star-rating .fa:hover {
    color: orange;
}

.heading {
    font-size: 20px;
    color: #999;
    border-bottom: 2px solid #eee;
}

@media (max-width: 400px) {
    .left-bar, .right-bar, .left-review, .right-review {
        width: 100%;
    }
}
</style>


<script>
export default {
    props: ['companyid', 'rated'],
    data() {
        return {
            rating,
            totaluser: 0,
            totalrate: 0
        }

    },


    mounted() {
        //control show(button Above)
        this.show = this.companyRated ? true : false;
    },

    computed: {
        companyRated() {
            return this.rated //d props
        }
    },
    created() {
        this.getRating();
    },
    methods: {
        setRating() {
            axios.post('/ratings/' + this.companyid, {
                rating: this.rating
            }).then((response) => {
                console.log(response.data)
                window.location.reload(true)
            }).catch((error) => {
                console.log(error)
            })
        }

    },

}


</script>
