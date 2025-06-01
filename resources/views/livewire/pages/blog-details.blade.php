<div>
    <!-- blog-detail -->
    <div class="blog-detail">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog-detail-main">
                        <div class="blog-detail-main-heading">
                            <ul class="tags-lists justify-content-center">
                                <li>
                                    <a href="#" class="tags-item">{{$blog->category->name}}</a>
                                </li>
                            </ul>
                            <div class="title">{{$blog->name}}</div>
                            <div class="meta">by <span>admin</span> on <span>{{$blog->created_at->format('d M Y')}}</span></div>
                            <div class="image">
                                <img class="lazyload" data-src="{{asset('storage/'.$blog->image)}}" src="{{asset('storage/'.$blog->image)}}" alt="{{$blog->name}}">
                            </div>
                        </div>
                        <p>
                            {!! $blog->description !!}
                            {!! $blog->main_content !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Related Articles -->
    <section class="mb_30">
        <div class="container">
            <div class="flat-title">
                <h5 class="">Related Articles</h5>
            </div>
            <div class="hover-sw-nav view-default hover-sw-5">
                <div dir="ltr" class="swiper tf-sw-recent" data-preview="3" data-tablet="2" data-mobile="1" data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-md="1" data-pagination-lg="1">
                    <div class="swiper-wrapper">
                        @foreach($relatedBlogs as $row)
                            <div class="swiper-slide" lazy="true">
                                <div class="blog-article-item">
                                    <div class="article-thumb radius-10">
                                        <a href="/blog/{{$row->slug}}" wire:navigate >
                                            <img class="lazyload" data-src="{{asset('storage/'.$row->image)}}" src="{{asset('storage/'.$row->image)}}" alt="{{$row->name}}">
                                        </a>
                                        <div class="article-label">
                                            <a href="shop-collection-list.html" class="tf-btn style-2 btn-fill radius-3 animate-hover-btn">{{$row->category->name}}</a>
                                        </div>
                                    </div>
                                    <div class="article-content">
                                        <div class="article-title">
                                            <a href="/blog/{{$row->slug}}" wire:navigate  class="">{{$row->name}}</a>
                                        </div>
                                        <div class="article-btn">
                                            <a href="/blog/{{$row->slug}}" wire:navigate  class="tf-btn btn-line fw-6">Read more<i class="icon icon-arrow1-top-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="nav-sw nav-next-slider nav-next-recent box-icon w_46 round"><span class="icon icon-arrow-left"></span></div>
                <div class="nav-sw nav-prev-slider nav-prev-recent box-icon w_46 round"><span class="icon icon-arrow-right"></span></div>
                <div class="sw-dots d-flex style-2 sw-pagination-recent justify-content-center"></div>
            </div>
        </div>
    </section>
    <!-- /Related Articles -->
</div>
