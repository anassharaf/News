<!DOCTYPE html>
<html>
<head>
    <title>NewsFeed</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('EndUserAssets/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('EndUserAssets/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('EndUserAssets/assets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('EndUserAssets/assets/css/font.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('EndUserAssets/assets/css/li-scroller.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('EndUserAssets/assets/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('EndUserAssets/assets/css/jquery.fancybox.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('EndUserAssets/assets/css/theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('EndUserAssets/assets/css/style.css')}}">
<!--[if lt IE 9]>
<script src="{{asset('EndUserAssets/assets/js/html5shiv.min.js')}}"></script>
<script src="{{asset('EndUserAssets/assets/js/respond.min.js')}}"></script>
<![endif]-->

</head>
<body>
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
    <header id="header">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="header_top">
                    <div class="header_top_left">
                        <ul class="top_nav">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="{{route('contactPage')}}">Contact</a></li>
                        </ul>
                    </div>
                    <div class="header_top_right">
                        <p>{{date_format(now(),'D d F Y h:i a')}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="header_bottom">
                    <div class="logo_area"><a href="index.html" class="logo"><img src="{{asset('EndUserAssets/images/logo.jpg')}}" alt=""></a></div>
                    @if(count($headerBanners)-1 >= 0)
                    <div class="add_banner"><a href="#"><img src="{{asset($headerBanners[rand(0,count($headerBanners)-1)]->image)}}" alt=""></a></div>
                    @endif
                </div>
            </div>
        </div>
    </header>
    <section id="navArea">
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav main_nav">
                    <li class="active"><a href="{{route('home')}}"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
                    @foreach($categories as $category)
                        <li><a href="#">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </nav>
    </section>
    <section id="newsSection">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="latest_newsarea"> <span>Latest News</span>
                    <ul id="ticker01" class="news_sticker">
                        @foreach($articles as $article)
                            <li><a href="{{route('article.show',[$article->categories(),$article->id])}}"><img src="{{asset($article->image)}}" alt="">{{$article->title}}</a></li>
                        @endforeach

                    </ul>
                    <div class="social_area">
                        <ul class="social_nav">
                            @foreach($social as $item)
                            <li ><a style="background-image:url({{asset($item->icon)}});" href="https://{{$item->link}}" title="{{$item->social_network}}" ></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
