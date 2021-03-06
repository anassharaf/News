
@include('EndUser.Assets.navbar')
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">

              <ul class="business_catgnav">
                  <li>
                      @foreach($categoryArticles as $article)
                      <div class="row">
                          <div class="col-md-4 mb-4">
                              <div class="bg-image hover-overlay shadow-1-strong rounded ripple" data-mdb-ripple-color="light">
                                  <img src="{{asset($article->image)}}" width="200px" height="150px" class="img-fluid" />
                                  <a href="#">
                                      <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                  </a>
                              </div>
                          </div>

                          <div class="col-md-8 mb-4">
                              <h5>{{$article->title}}</h5>
                              <p>
                                  {{substr($article->body,0,150)}}...
                              </p>

                              <a href="{{route('article.show',[$article->categories(),$article->id])}}" type="button" class="btn btn-primary">Read</a>
                          </div>
                      </div>
                      <hr>
                      @endforeach
                  </li>

              </ul>
              <div class="text-center" >{{$categoryArticles->links()}}</div>
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
                <div class="media wow fadeInDown"> <a href="{{route('article.show',[$popArt->categories(),$popArt->id])}}" class="media-left"> <img alt="" src="{{asset($popArt->image)}}"> </a>
                  <div class="media-body"> <a href="{{route('article.show',[$popArt->categories(),$popArt->id])}}" class="catg_title">{{$popArt->title}}</a> </div>
                </div>
              </li>
                @endforeach
            </ul>
          </div>
          <div class="single_sidebar">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Category</a></li>
              <li role="presentation"><a href="#video" aria-controls="profile" role="tab" data-toggle="tab">Video</a></li>
              <li role="presentation"><a href="#comments" aria-controls="messages" role="tab" data-toggle="tab">Comments</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="category">
                <ul>
                  <li class="cat-item"><a href="#">Sports</a></li>
                  <li class="cat-item"><a href="#">Fashion</a></li>
                  <li class="cat-item"><a href="#">Business</a></li>
                  <li class="cat-item"><a href="#">Technology</a></li>
                  <li class="cat-item"><a href="#">Games</a></li>
                  <li class="cat-item"><a href="#">Life &amp; Style</a></li>
                  <li class="cat-item"><a href="#">Photography</a></li>
                </ul>
              </div>
              <div role="tabpanel" class="tab-pane" id="video">
                <div class="vide_area">
                  <iframe width="100%" height="250" src="http://www.youtube.com/embed/h5QWbURNEpA?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="comments">
                <ul class="spost_nav">
                  <li>
                    <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="../images/post_img1.jpg"> </a>
                      <div class="media-body"> <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="../images/post_img2.jpg"> </a>
                      <div class="media-body"> <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="../images/post_img1.jpg"> </a>
                      <div class="media-body"> <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="../images/post_img2.jpg"> </a>
                      <div class="media-body"> <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
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
