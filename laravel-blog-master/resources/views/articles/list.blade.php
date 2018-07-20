@extends('layouts.app')

@section('title', '全部文章')

<style>
    .z-article-horizontal {
        margin-bottom: 10px;
    }
    .z-box-shadow {
        border-radius: 4px;
        -webkit-box-shadow: 0 1px 5px #dcdcdc;
        -moz-box-shadow: 0 1px 5px #dcdcdc;
        box-shadow: 0 1px 5px #dcdcdc;
    }

    .z-article-horizontal .z-title {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space:nowrap;
        margin-top: 5px;
        margin-left: 10px;
        padding-bottom: 5px;
        font-size: 25px;
    }
    .z-article-horizontal .z-info {
        margin-top: 20px;
        font-size: 13px;
        color: #999;
        text-align: center;
    }

    .z-article-horizontal .z-intro {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space:nowrap;
        font-size: 15px;
        padding:5px 10px;
        margin-top: 5px;
    }

    .z-article-horizontal .z-cover {
        width: 100%;

        height: 152px;
        border-radius: 4px;
        border: 1px solid #f0f0f0;
    }
    .z-label-box {
        margin-left: 10px;
        font-size:11px;
        padding:1px 5px;
    }
    #z-tags-content {
        display: inline-block;
        margin-top: 10px;
    }
    .z-article-tags {
        max-width: 260px;
    }
    @media screen and  (max-width: 1000px){
        .z-article-tags {
            display: none;
        }
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
        <div class="col-md-7 col-md-offset-1">
          {{--<div class="">--}}
            {{--<span>热门关键词：</span>--}}
            {{--@foreach($tags as $tag)--}}
                  {{--<a href="{{ route('tags.show', $tag->id) }}"><span class="label label-info z-label-box">{{ $tag->name }}</span></a>--}}
            {{--@endforeach--}}
          {{--</div>--}}
          @if(count($articles))
            @foreach ( $articles as $article)
              <div class="z-article-horizontal z-box-shadow" style="background: white">
                <div class="row">
                    <div class="col-xs-8">
                      <a href="{{ route('articles.show', $article->id) }}"><p class="z-title" style="line-height: 25px;margin-top: 15px">{{ $article->title }}</p></a>
                      <div id="z-article-tags">
                          @if(count($article->tags))
                              @foreach($article->tags as $tag)
                                  <span class="label label-info z-label-box">{{ $tag->name }}</span>
                              @endforeach
                          @endif
                      </div>

                      <p class="z-intro">{{ $article->content }}</p>
                      <p class="z-info">发表于 {{ $article->created_at_date }} · 最后访问 {{ $article->updated_at_diff }}</p>
                  </div>
                    <div class="col-xs-4  z-hiden" id="z-article-img-content">
{{--                        <a href="{{ route('articles.show', $article->id) }}"><div class="z-article-img"></div></a>--}}
                        <a href="{{ route('articles.show', $article->id) }}"><img src="{{ $article->cover == '' ? '/default.jpg' : $article->cover }}" class="img-responsive z-cover" alt="img"></a>
                    </div>
                </div>
              </div>
            @endforeach
            {{ $articles->links() }}
          @else
            <div class="alert alert-warning" role="alert" style="margin-top:20px">sorry, no articles!</div>
          @endif
        </div>

        @if(count($tags))
        <div class="col-md-3 z-article-tags">
            <div class="row">
                <div class="z-box-shadow" style="background: white;padding: 5px 15px;">
                    <p style="font-size: 20px">热门关键词</p>
                    <div style="width: 100%;height: 1px;background: #f6f6f6;"></div>

                    <div style="display: inline-flex;margin-bottom: 10px;">
                        <div class="row">
                            @foreach($tags as $tag)
                                <div id="z-tags-content">
                                    <a href="{{ route('tags.show', $tag->id) }}"><div class="label label-info z-label-box" >{{ $tag->name }}</div></a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>
@endsection

@section('scripts')

        <script type="text/javascript">
            var colors = ['#578fff', '#8c9ffd', '#ff7ea2', '#ffbf43', '#74dde3', 'red'];
            $("#z-tags-content > a > .label-info").each(function (index) {
                    this.style.background=colors[index%6];
            });
            $("#z-article-tags > .label-info").each(function (index) {
                this.style.background=colors[index%6];
            });


        </script>

@endsection
