  @extends('_layout')
  @section('content')
  <!-- Blog Details Section Begin -->
  <section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5 order-md-1 order-2">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__search">
                        <form action="#">
                            <input type="text" placeholder="Search...">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Loại tin</h4>
                        <ul>                      
                            <li><a href="#">All</a></li>
                            <li><a href="#">Beauty (20)</a></li>
                            <li><a href="#">Food (5)</a></li>
                            <li><a href="#">Life Style (9)</a></li>
                            <li><a href="#">Travel (10)</a></li>
                        </ul>
                    </div>
                       <div class="blog__sidebar__item">
                            <h4>Tin tức mới</h4>
                            <div class="blog__sidebar__recent">
                                @foreach($tintucm as $item)
                                <a href="{{route('home.single-blog',$item->id)}}" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic" style="width: 100px;height: 100px">
                                        <img src="{{URL::to('/public/frontend/anhtintuc/'.$item->hinhanh)}}" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>{{$item->tieude}}</h6>
                                        <span>{{$item->created_at=date("H:i:s")}} pm</span>
                                        <span>{{$item->create_at=date("d-m-Y")}}</span>
                                    </div>
                                </a>
                               @endforeach
                            </div>
                        </div>
                    <div class="blog__sidebar__item">
                        <h4>Search By</h4>
                        <div class="blog__sidebar__item__tags">
                            <a href="#">Apple</a>
                            <a href="#">Beauty</a>
                            <a href="#">Vegetables</a>
                            <a href="#">Fruit</a>
                            <a href="#">Healthy Food</a>
                            <a href="#">Lifestyle</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7 order-md-1 order-1">
                <div class="blog__details__text">
                    @foreach($single as $key => $item)
                    <p>{{$item->created_at}}</p>
                    <h3>
                        {{$item->tieude}}
                    </h3>  
                    <img src="{{URL::to('/public/frontend/anhtintuc/'.$item->hinhanh)}}" alt="" />
                    <p>{!!$item->noidung!!}</p>
                    @endforeach                        
                </div>
                <div class="blog__details__content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="blog__details__author">
                                <div class="blog__details__author__pic">
                                    <img src="{{URL::to('public/frontend/img/blog/details/details-author.jpg')}}" alt="">
                                </div>
                                <div class="blog__details__author__text">
                                    <h6>Michael Scofield</h6>
                                    <span>Admin</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="blog__details__widget">
                                <ul>
                                    <li><span>Categories:</span> Food</li>
                                    <li><span>Tags:</span> All, Trending, Cooking, Healthy Food, Life Style</li>
                                </ul>
                                <div class="blog__details__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-envelope"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Section End -->

<!-- Related Blog Section Begin -->
<section class="related-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related-blog-title">
                    <h2>Tin tức liên quan</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($tintucm as $item)
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    
                    <div class="blog__item__pic " >
                        <img src="{{URL::to('/public/frontend/anhtintuc/'.$item->hinhanh)}}" alt="" style="width: 350px;height: 250px">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i>{{$item->created_at=date("d-m-Y")}}</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">{{$item->tieude}}</a></h5>
                        <p>{{$item->trichdan}} </p>
                    </div>
                    <a href="{{route('home.single-blog',$item->id)}}" class="blog__btn">Đọc thêm<span class="arrow_right"></span></a>
                                   
                </div>
            </div>
              @endforeach
            </div>
        </div>
    </section>
    <!-- Related Blog Section End -->

    @endsection