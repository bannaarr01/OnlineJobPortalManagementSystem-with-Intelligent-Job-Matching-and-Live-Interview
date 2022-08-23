<!-- ======= Recent Blog Posts Section ======= -->
<section id="recent-blog-posts" class="recent-blog-posts">
    <div class="container" data-aos="fade-up">
        <div class="section-title aos-init aos-animate">
            <h2>Blog</h2>
            <p>Recent posts from our Blog</p>
        </div>

        <div class="owl-carousel">
            @foreach($posts as $post)
                <div class="col-lg-12">
                    <div class="post-box">
                        <div class="post-img "><img src="{{asset('storage/'.$post->image)}}" width="350" height="250"
                                                    alt=""></div>
                        <span class="post-date">{{$post->created_at->diffForHumans()}}</span>
                        <h3 class="post-title">{{$post->title}}</h3>
                        <h6>{!! html_entity_decode(str_limit($post->content, 30))!!}</h6>
                        <a href="{{route('post.show',[$post->id,$post->slug])}}"
                           class="readmore stretched-link mt-auto"><span>Read More</span><i
                                class="fas fa-angle-double-right"></i></a>
                    </div>
                </div>
            @endforeach

        </div>

    </div>

</section> <!-- End Recent Blog Posts Section -->


<style>
    .recent-blog-posts .owl-nav, .recent-blog-posts .owl-dots {
        margin-top: 5px;
        text-align: center;
    }

    .recent-blog-posts .owl-dot {
        display: inline-block;
        margin: 0 5px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background-color: rgb(169, 169, 169, 0.9) !important;
    }

    .recent-blog-posts .owl-dot.active {
        background-color: #03adfc !important;
        font-family: Arial;
        font-size: 80px;
        font-weight: bold;
    }
    

    button.owl-prev, button.owl-next {
        background-color: #fff;
    }

    button.owl-prev::before {
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        content: "\f0a8";
        color: #03adfc !important;
        font-size: 40px;

    }

    button.owl-next::after {
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        content: "\f0a9";
        color: #03adfc !important;
        font-size: 40px;

    }


</style>



