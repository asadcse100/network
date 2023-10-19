<section id="news">
    <div class="content bg-black bg-parallax block-news-1 padding-top-140 padding-bot-200">
        <div class="container">
            <div class="header text-center scroll-animated-from-bottom">
                <h1>Latest News & Blogs</h1>
            </div>
            <div class="slider-container scroll-animated-from-bottom">
                <div class="news-slider cbp cbp-slider-edge pagination-top pagination-custom-1">
                    @foreach(App\Models\Blog::where('status', 1)->orderBy('popularity', 'desc')->take(10)->get() as $blog)
                    <div class="cbp-item">
                        <a href="{{route('blog.show', $blog->id)}}" class="cbp-singlePage cbp-caption">
                            <div class="container-news"> <img class="img-responsive" src="{{asset('uploads/' . $blog->image)}}" alt="news">
                                <div class="container-article-info">
                                    <div class="container-title">
                                        <p>{{$blog->created_at->format('d.m.Y')}}</p>
                                        <h4>{{$blog->title}}</h4>
                                    </div>
                                    <div class="container-button"> <span class="ti-layers"></span>
                                        <p>Read Article</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach                   
                </div>
            </div>

            <div class="text-center">
                <a type="button" href="{{Route('blogs')}}" class="btn btn-warning" target="_blank">More News & Blog</a>
            </div>
        </div>

    </div>
</section>