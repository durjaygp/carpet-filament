<div>
    <!-- page-title -->
    <div class="tf-page-title">
        <div class="container-full">
            <div class="row">
                <div class="col-12">
                    <div class="heading text-center">Blog</div>
                    <ul class="breadcrumbs d-flex align-items-center justify-content-center">
                        <li>
                            <a class="item-link" href="/" wire:navigate>Home</a>
                        </li>
                        <li>
                            <i class="icon-arrow-right"></i>
                        </li>
                        <li>
                           All Blogs
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /page-title -->

    <!-- blog-list -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="blog-list-main">
                    <div class="list-blog">
                        @foreach($blogs as $row)
                            <div class="blog-article-item style-row">
                                <div class="article-thumb">
                                    <a href="/blog/{{$row->slug}}" wire:navigate >
                                        <img class="lazyload" data-src="{{asset('storage/'.$row->image)}}" src="{{asset('storage/'.$row->image)}}" alt="{{$row->name}}">
                                    </a>
                                </div>
                                <div class="article-content">
                                    <div class="article-label">
                                        <a href="#" wire:navigate  class="tf-btn btn-sm radius-3 btn-fill animate-hover-btn">{{$row->category->name}}</a>
                                    </div>
                                    <div class="article-title">
                                        <a href="/blog/{{$row->slug}}" wire:navigate  class="">{{$row->name}}</a>
                                    </div>
                                    <div class="desc">
                                        {{\Illuminate\Support\Str::limit($row->description, 112, '...')}}
                                    </div>
                                    <div class="article-btn">
                                        <a href="/blog/{{$row->slug}}" wire:navigate class="tf-btn btn-line fw-6">Read more<i class="icon icon-arrow1-top-left"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <ul class="wg-pagination">
                            {{$blogs->links('livewire.components.pagination')}}
                        </ul>
                    </div>
                    @livewire('components.blog-sidebar')
                </div>
            </div>
        </div>
    </div>
    <div class="btn-sidebar-mobile">
        <button data-bs-toggle="offcanvas" data-bs-target="#sidebarmobile" aria-controls="offcanvasRight"><i class="icon-open"></i></button>
    </div>
    <!-- /blog-list -->

</div>
