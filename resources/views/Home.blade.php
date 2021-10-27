 @extends('_layout')
@section('content')
    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach($product as $key =>$data)
                     <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{URL::to('/public/frontend/image/'.$data->image)}}">
                            <h5><a href="{{URL::to('chi-tiet/'.$data->id)}}">{{$data->tensp}}</a></h5>
                        </div>
                    </div>
                    @endforeach
               
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Giày Sneakers</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                             @foreach($loaisanpham as $key =>$dlieu)
                             <li data-filter="{{route('Home',[$dlieu->id])}}">{{$dlieu->tenloai}}</li>                            
                             @endforeach
                            <!-- <li data-filter=".oranges">Nike</li>
                            <li data-filter=".fresh-meat">Adidas</li>
                            <li data-filter=".vegetables">Vans</li>
                            <li data-filter=".fastfood">Yeezy</li> -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach($product as $key =>$data)
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{URL::to('/public/frontend/image/'.$data->image)}}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a class="btnclick" href="{{route('giohang.add',['id'=>$data->id])}}"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="{{URL::to('chi-tiet/'.$data->id)}}">{{$data->tensp}}</a></h6>
                            <h5>{{number_format($data->giaban).'vnd'}}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
                               
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản phẩm mới</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach($sanphammoi as $key =>$spmoi)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic"style="width: 110px;height: 110px">
                                        <img src="{{URL::to('/public/frontend/image/'.$spmoi->image)}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$spmoi->tensp}}</h6>
                                        <span>{{number_format($spmoi->giaban).'vnd'}}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @foreach($sanphammoi1 as $key =>$spmoi)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic"style="width: 110px;height: 110px">
                                        <img src="{{URL::to('/public/frontend/image/'.$spmoi->image)}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$spmoi->tensp}}</h6>
                                        <span>{{number_format($spmoi->giaban).'vnd'}}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Thịnh Hành</h4>
                        <div class="latest-product__slider owl-carousel">
                              <div class="latest-prdouct__slider__item">
                                @foreach($sanphammoi1 as $key =>$spmoi)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic"style="width: 110px;height: 110px">
                                        <img src="{{URL::to('/public/frontend/image/'.$spmoi->image)}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$spmoi->tensp}}</h6>
                                        <span>{{number_format($spmoi->giaban).'vnd'}}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @foreach($sanphammoi as $key =>$spmoi)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic"style="width: 110px;height: 110px">
                                        <img src="{{URL::to('/public/frontend/image/'.$spmoi->image)}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$spmoi->tensp}}</h6>
                                        <span>{{number_format($spmoi->giaban).'vnd'}}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                          
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản phẩm </h4>
                       <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach($sanphammoi as $key =>$spmoi)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic"style="width: 110px;height: 110px">
                                        <img src="{{URL::to('/public/frontend/image/'.$spmoi->image)}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$spmoi->tensp}}</h6>
                                        <span>{{number_format($spmoi->giaban).'vnd'}}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @foreach($sanphammoi1 as $key =>$spmoi)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic"style="width: 110px;height: 110px">
                                        <img src="{{URL::to('/public/frontend/image/'.$spmoi->image)}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$spmoi->tensp}}</h6>
                                        <span>{{number_format($spmoi->giaban).'vnd'}}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>Tin tức mới</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($tintucm as $item)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <a href="{{route('home.single-blog',$item->id)}}"><img src="{{URL::to('/public/frontend/anhtintuc/'.$item->hinhanh)}}" alt="" style="width: 250px;height: 230px"></a>
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> {{$item->create_at=date("d-m-Y")}}</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="{{route('home.single-blog',$item->id)}}">{{$item->tieude}}</a></h5>
                            <p>{{$item->trichdan}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
               
            </div>
        </div>
    </section>
<form action="" method="POST" id="formclick">
        @csrf @method('GET')
    </form>
    <!-- Blog Section End -->
@endsection
