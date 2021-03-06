
@include('EndUser.Assets.navbar')
<section id="sliderSection">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="slick_slider">
                @foreach($articles as $article)
                    <div class="single_iteam"><a href="{{route('article.show',[$article->categories(),$article->id])}}"> <img
                                src="{{asset($article->image)}}" alt=""></a>
                        <div class="slider_article">
                            <h2><a class="slider_tittle"
                                   href="{{route('article.show',[$article->categories(),$article->id])}}">{{$article->title}}</a></h2>
                            <p>{{substr($article->body, 0, 100)}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4"  >
            <div class="latest_post" >
                <h2><span>Latest post</span></h2>
                <div class="latest_post_container">
                    <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
                    <ul class="latest_postnav" >
                        @foreach($articles as $article)
                            <li>
                                <div class="media"><a href="{{route('article.show',[$article->categories(),$article->id])}}" class="media-left"> <img alt=""
                                                                                                             src="{{asset($article->image)}}">
                                    </a>
                                    <div class="media-body"><a href="{{route('article.show',[$article->categories(),$article->id])}}"
                                                               class="catg_title">{{$article->title}}</a></div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="contentSection">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="left_content">

                <div class="single_post_content">
                    <h2><span>{{$cat1[0]->categories()}}</span></h2>
                    <div class="single_post_content_left">
                        <ul class="business_catgnav  wow fadeInDown">
                            <li>
                                <figure class="bsbig_fig"><a href="{{route('article.show',[$cat1[0]->categories(),$cat1[0]->id])}}"
                                                             class="featured_img"> <img
                                            alt="" src="{{asset($cat1[0]->image)}}"> <span
                                            class="overlay"></span> </a>
                                    <figcaption><a href="{{route('article.show',[$cat1[0]->categories(),$cat1[0]->id])}}">{{$cat1[0]->title}}</a>
                                    </figcaption>
                                    <p>{{substr($cat1[0]->body,0,70)}}</p>
                                </figure>
                            </li>
                        </ul>
                    </div>
                    <div class="single_post_content_right">
                        <ul class="spost_nav">
                            @foreach($cat1->slice(0, 5) as $art)
                                @if($loop->first)
                                    @continue
                                @endif
                                <li>
                                    <div class="media wow fadeInDown"><a href="{{route('article.show',[$art->categories(),$art->id])}}"
                                                                         class="media-left">
                                            <img alt="" src="{{asset($art->image)}}"> </a>
                                        <div class="media-body"><a href="{{route('article.show',[$art->categories(),$art->id])}}"
                                                                   class="catg_title">{{$art->title}}</a></div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="fashion_technology_area">
                    <div class="fashion">
                        <div class="single_post_content">
                            <h2><span>{{$cat2[0]->categories()}}</span></h2>
                            <ul class="business_catgnav wow fadeInDown">
                                <li>
                                    <figure class="bsbig_fig"><a href="{{route('article.show',[$cat2[0]->categories(),$cat2[0]->id])}}"
                                                                 class="featured_img">
                                            <img alt="" src="{{asset($cat2[0]->image)}}"> <span
                                                class="overlay"></span> </a>
                                        <figcaption><a
                                                href="{{route('article.show',[$cat2[0]->categories(),$cat2[0]->id])}}">{{$cat2[0]->title}}</a>
                                        </figcaption>
                                        <p>{{substr($cat2[0]->body,0,70)}}...</p>
                                    </figure>
                                </li>
                            </ul>
                            <ul class="spost_nav">
                                @foreach($cat2->slice(0, 5) as $art)
                                    @if($loop->first)
                                        @continue
                                    @endif
                                    <li>
                                        <div class="media wow fadeInDown"><a href="{{route('article.show',[$art->categories(),$art->id])}}" class="media-left"> <img alt="" src="{{asset($art->image)}}"></a>
                                            <div class="media-body"><a href="{{route('article.show',[$art->categories(),$art->id])}}" class="catg_title">{{$art->title}}</a></div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="technology">
                        <div class="single_post_content">
                            <h2><span>{{$cat3[0]->categories()}}</span></h2>
                            <ul class="business_catgnav">
                                <li>
                                    <figure class="bsbig_fig wow fadeInDown"><a href="{{route('article.show',[$cat3[0]->categories(),$cat3[0]->id])}}"
                                                                                class="featured_img"> <img alt="" src="{{asset($cat3[0]->image)}}">
                                            <span class="overlay"></span> </a>
                                        <figcaption><a href="{{route('article.show',[$cat3[0]->categories(),$cat3[0]->id])}}">{{$cat3[0]->title}}</a></figcaption>
                                        <p>{{substr($cat3[0]->body,0,70)}}...</p>
                                    </figure>
                                </li>
                            </ul>
                            <ul class="spost_nav">
                                @foreach($cat3->slice(0, 5) as $art)
                                    @if($loop->first)
                                        @continue
                                    @endif
                                <li>
                                    <div class="media wow fadeInDown"><a href="{{route('article.show',[$art->categories(),$art->id])}}"
                                                                         class="media-left"> <img alt=""
                                                                                                  src="{{asset($art->image)}}">
                                        </a>
                                        <div class="media-body"><a href="{{route('article.show',[$art->categories(),$art->id])}}" class="catg_title">
                                                {{$art->title}}</a></div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="single_post_content">
                    <h2><span>Photography</span></h2>
                    <ul class="photograph_nav  wow fadeInDown">
                        @foreach($articles as $article)
                        <li>
                            <div class="photo_grid">
                                <figure class="effect-layla"><a class="fancybox-buttons" data-fancybox-group="button"
                                                                href="{{route('article.show',[$article->categories(),$article->id])}}"
                                                                title="{{$article->title}}"> <img
                                            src="{{asset($article->image)}}" alt=""/></a></figure>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <aside class="right_content">
                <div class="single_sidebar">
                    <h2><span>Popular Post</span></h2>
                    <ul class="spost_nav">
                        @foreach($popular as $popArt)
                        <li>
                            <div class="media wow fadeInDown"><a href="{{route('article.show',[$popArt->categories(),$popArt->id])}}" class="media-left"> <img
                                        alt="" src="{{asset($popArt->image)}}"> </a>
                                <div class="media-body"><a href="{{route('article.show',[$popArt->categories(),$popArt->id])}}" class="catg_title">{{$popArt->title}}</a></div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="single_sidebar">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab"
                                                                  data-toggle="tab">Category</a></li>
                        <li role="presentation"><a href="#video" aria-controls="profile" role="tab" data-toggle="tab">Video</a>
                        </li>
                        <li role="presentation"><a href="#comments" aria-controls="messages" role="tab"
                                                   data-toggle="tab">Comments</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="category">
                            <ul>
                                @foreach($categories as $categ)
                                <li class="cat-item"><a href="#">{{$categ->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="video">
                            <div class="vide_area">
                                <iframe width="100%" height="250"
                                        src="http://www.youtube.com/embed/h5QWbURNEpA?feature=player_detailpage"
                                        frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="comments">
                            <ul class="spost_nav">
                                <li>
                                    <div class="media wow fadeInDown"><a href="pages/single_page.html"
                                                                         class="media-left"> <img alt=""
                                                                                                  src="{{asset('EndUserAssets/images/post_img1.jpg')}}">
                                        </a>
                                        <div class="media-body"><a href="pages/single_page.html" class="catg_title">
                                                Aliquam malesuada diam eget turpis varius 1</a></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media wow fadeInDown"><a href="pages/single_page.html"
                                                                         class="media-left"> <img alt=""
                                                                                                  src="{{asset('EndUserAssets/images/post_img2.jpg')}}">
                                        </a>
                                        <div class="media-body"><a href="pages/single_page.html" class="catg_title">
                                                Aliquam malesuada diam eget turpis varius 2</a></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media wow fadeInDown"><a href="pages/single_page.html"
                                                                         class="media-left"> <img alt=""
                                                                                                  src="{{asset('EndUserAssets/images/post_img1.jpg')}}">
                                        </a>
                                        <div class="media-body"><a href="pages/single_page.html" class="catg_title">
                                                Aliquam malesuada diam eget turpis varius 3</a></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media wow fadeInDown"><a href="pages/single_page.html"
                                                                         class="media-left"> <img alt=""
                                                                                                  src="{{asset('EndUserAssets/images/post_img2.jpg')}}">
                                        </a>
                                        <div class="media-body"><a href="pages/single_page.html" class="catg_title">
                                                Aliquam malesuada diam eget turpis varius 4</a></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="single_sidebar wow fadeInDown">
                    @if(count($sideBanners)-1 >= 0)
                    <h2><span>Sponsor</span></h2>
                    <a class="sideAdd" href="#"><img src="{{asset($sideBanners[rand(0,count($sideBanners)-1)]->image)}}" alt=""></a>
                    @endif
                </div>
                <div class="single_sidebar wow fadeInDown">
                    <h2><span>Category Archive</span></h2>
                    <select class="catgArchive">
                        <option>Select Category</option>
                        <option>Life styles</option>
                        <option>Sports</option>
                        <option>Technology</option>
                        <option>Treads</option>
                    </select>
                </div>
                <div class="single_sidebar wow fadeInDown">
                    <h2><span>Links</span></h2>
                    <ul>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Rss Feed</a></li>
                        <li><a href="#">Login</a></li>
                        <li><a href="#">Life &amp; Style</a></li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>
@include('EndUser.Assets.footer')
