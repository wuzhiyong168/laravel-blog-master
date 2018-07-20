@extends('layouts.app')

<style>
    .z-article-vertical {
        margin-bottom: 20px;
        border-radius: 2px;
        /*-webkit-box-shadow: 0 1px 5px #dcdcdc;*/
        /*-moz-box-shadow: 0 1px 5px #dcdcdc;*/
        /*box-shadow: 0 1px 5px #dcdcdc;*/
        transition: all 0.3s;
    }
    .z-article-vertical:hover {
        -webkit-transform: translateY(5px);
        -moz-transform: translateY(5px);
        -ms-transform: translateY(5px);
        -o-transform: translateY(5px);
        transform: translateY(5px);
    }
    .z-article-vertical .z-cover {
        width: 100%;
    }

    .z-article-vertical .z-content {
        padding: 15px;
    }

    .z-article-vertical .z-title {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space:nowrap;
        font-size: 30px;
    }
    .z-article-vertical .z-info {
        text-align: center;
        font-size: 13px;
        color: #999;
    }

    .z-center-horizontal {
        width: 100%;
        text-align: center;
    }
    .z-article-vertical .z-button {
        padding: 5px 20px;
        color: gray;
        border: 1px solid #c2c2c2;
        border-radius: 15px;
    }
    .z-article-vertical .z-button:hover {
        background: #5bc0de;
        color: white;
    }

    #z-article-img-content {
        overflow: hidden;
    }
    #z-article-img-content img {
        cursor: pointer;
        transition:all 0.3s;
    }
    #z-article-img-content img:hover {
        -webkit-transform: scale(1.3,1.3);
        -moz-transform: scale(1.3,1.3);
        -ms-transform: scale(1.3,1.3);
        -o-transform: scale(1.3,1.3);
        transform: scale(1.3,1.3);
    }
</style>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
          <!-- 轮播 -->
          <!-- <div id="carousel-example-generic" class="carousel slide z-slide" data-ride="carousel" style="margin-bottom: 20px;">
              <div class="carousel-inner z-inner" role="listbox">
                  <div class="item active">
                      <a href="#"><img src="default.jpg" class="img-responsive" alt="imax1"></a>
                      <div class="z-content">
                          <p class="z-title">Measure Anything in Laravel with StatsD</p>
                          <p class="z-intro">I want to show you some tools and techniques you can use to measure anything and everything that you want in your Laravel applications with StatsD. These ideas are simple and not new; yet, I believe that the simplicity and power are what makes StatsD great.</p>
                          <div class="z-center-horizontal">
                              <a href="" class="z-button">read more..</a>
                          </div>
                      </div>
                  </div>
                  <div class="item">
                      <a href="#"><img src="/img/default2.png" class="img-responsive" alt="imax2"></a>
                      <div class="z-content">
                          <p class="z-title">Measure Anything in Laravel with StatsD</p>
                          <p class="z-intro">I want to show you some tools and techniques you can use to measure anything and everything that you want in your Laravel applications with StatsD. These ideas are simple and not new; yet, I believe that the simplicity and power are what makes StatsD great.</p>
                          <div class="z-center-horizontal">
                              <a href="" class="z-button">read more..</a>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="z-slide-button">
                  <a class="z-location-left" href="#carousel-example-generic" data-slide="prev">
                      <span class="z-button glyphicon glyphicon-chevron-left"></span>
                  </a>
                  <a class="z-location-right" href="#carousel-example-generic" data-slide="next">
                      <span class="z-button glyphicon glyphicon-chevron-right"></span>
                  </a>
              </div>
          </div> -->

          <!-- 最新文章 -->
          @foreach($articles as $article)
          <div class="z-article-vertical col-sm-4">
              <div id="z-article-img-content">
                  <a href="{{ route('articles.show', $article->id) }}"> <img src="{{ $article->cover == '' ? 'default.jpg' : $article->cover }}" class="img-responsive z-cover" alt="imax1"></a>
              </div>
              <div class="z-content" style="background: white;">
                  @if(count($article->tags))
                    @foreach($article->tags as $tag)
                      <span class="label label-info" style="line-height: 30px;;font-size:11px;padding:1px 5px">{{ $tag->name }}</span>
                    @endforeach
                  @endif
                  <p class="z-title">{{ $article->title }}</p>
                  <p class="z-info">- 发表于 {{ $article->created_at_date }} · 最后访问 {{ $article->updated_at_diff }} -</p>
                  {{--<p class="z-intro">{{ $article->content }}</p>--}}

                  <div class="z-center-horizontal">
                      <a href="{{ route('articles.show', $article->id) }}" class="z-button" style="text-align: center;width: 70px;font-size: 13px">  更多  </a>
                  </div>
              </div>
          </div>
          @endforeach

        </div>

        <!-- <div class="col-md-4">

        </div> -->
    </div>

    <div style="width: 100%;height: 40px;text-align: center;">
        <div class="pull-right" style="width: 100%;">
            {{$articles->render()}}
        </div>
    </div>

</div>
@endsection
