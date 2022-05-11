@extends('layouts._index')
@section('title','Notice')

@section('content')
<div class="page-header-overlay">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <header class="entry-header">
                    <h1 class="entry-title" style="color: rgb(67, 255, 67)">{{ $notice->heading }}</h1>

                    <div class="entry-meta flex justify-content-center align-items-center">
                        <div class="post-author" style="color: rgb(67, 255, 67)">{{ date('Y-m-d', strtotime($notice->created_at ))}}</div>
                    </div><!-- .entry-meta -->
                </header><!-- .entry-header -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .page-header-overlay -->
</div><!-- .page-header -->

<div class="container">
<div class="row">
    <div class="col-12 col-lg-12">
        <div class="single-post-wrap" style="text-align: justify">
            {!! $notice->body !!}
            <embed src="{{$notice->file}}" width="800px" height="1000px" />
        </div><!-- .single-post-wrap -->

        <div class="post-comments-wrap">
            <div class="post-comments">
                <h3 class="comments-title"><span class="comments-number">02 Comments</span></h3>

                <ol class="comment-list">
                    <li class="comment">
                        <article class="comment-body">
                            <figure class="comment-author-avatar">
                                <img src="/front/images/c-1.png" alt="">
                            </figure><!-- .comment-author-avatar -->

                            <div class="comment-wrap">
                                <div class="comment-author">
                                    <span class="comment-meta d-block">
                                        <a href="#">27 Aug 2018</a>
                                    </span><!-- .comment-meta -->

                                    <span class="fn">
                                        <a href="#">Chris Hadfield</a>
                                    </span><!-- .fn -->
                                </div><!-- .comment-author -->

                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi</p>

                                <div class="reply">
                                    <a href="#">like</a>
                                    <a href="#">reply</a>
                                </div><!-- .reply -->
                            </div><!-- .comment-wrap -->

                            <div class="clearfix"></div>
                        </article><!-- .comment-body -->
                    </li><!-- .comment -->
                </ol><!-- .comment-list -->
            </div><!-- .post-comments -->

            <div class="comments-form">
                <div class="comment-respond">
                    <h3 class="comment-reply-title">Leave a comment</h3>
                    <form class="comment-form">
                        <textarea rows="4" placeholder="Messages"></textarea>
                        <input type="submit" value="submit">
                    </form><!-- .comment-form -->
                </div><!-- .comment-respond -->
            </div><!-- .comments-form -->
        </div><!-- .post-comments-wrap -->
    </div><!-- .col -->
</div><!-- .row -->
</div><!-- .container -->

@endsection
