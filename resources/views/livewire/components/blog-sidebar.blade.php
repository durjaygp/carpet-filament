<div>
    <aside class="tf-section-sidebar wrap-sidebar-mobile">
        <div class="sidebar-item sidebar-categories">
            <div class="sidebar-title">Blog categories</div>
            <div class="sidebar-content">
                <ul>
                    @foreach($categories as $row)
                        <li>
                            <a href="#">{{$row->name}}<span>({{$row->blogs_count}})</span></a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="sidebar-item sidebar-post">
            <div class="sidebar-title">Recent Post</div>
            <div class="sidebar-content">
                <ul>
                    @foreach($latestBlogs as $row)
                        <li>
                            <div class="blog-article-item style-sidebar">
                                <div class="article-thumb">
                                    <a wire:navigate href="/blog/{{$row->slug}}">
                                        <img src="{{asset('storage/'.$row->image)}}" alt="{{$row->name}}">
                                    </a>
                                </div>
                                <div class="article-content">
                                    <div class="article-label">
                                        <a wire:navigate href="/blog/{{$row->slug}}" class="tf-btn btn-sm radius-3 btn-fill animate-hover-btn">
                                            {{$row->category->name}}</a>
                                    </div>
                                    <div class="article-title">
                                        <a wire:navigate href="/blog/{{$row->slug}}" class="" alt="{{$row->name}}">{{$row->name}}</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </aside>
</div>
