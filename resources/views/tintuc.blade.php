  @extends('_layout')
@section('content')
  <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Categories</h4>
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
                                        <span> {{$item->create_at=date("d-m-Y")}}</span>
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
                <div class="col-lg-8 col-md-7">
                    <div class="row">
                        @foreach($tintucs as $item)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic" >
                                    <a href="{{route('home.single-blog',$item->id)}}"><img src="{{URL::to('/public/frontend/anhtintuc/'.$item->hinhanh)}}" alt="" style="width: 250px;height: 230px"></a>
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> {{$item->create_at=date("d-m-Y")}}</li>
                                        <li><i class="fa fa-comment-o"></i> 5</li>
                                    </ul>
                                    <h5 style="height: 60px"><a href="#">{{$item->tieude}}</a></h5>
                                    <p style="height: 60px">{{$item->trichdan}}</p>
                                    <a href="{{route('home.single-blog',$item->id)}}" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                      @endforeach
                       <div class="col-md-12">
                           <!--  {{$tintucs->links()}} -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        @endsection