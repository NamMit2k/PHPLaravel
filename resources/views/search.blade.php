@extends('_layout')
@section('content')
<!-- Breadcrumb Section Begin -->
  <!--   <section class="breadcrumb-section set-bg" data-setbg="{{URL::to('public/frontend/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>DONG HE Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">                   
                        <div class="sidebar__item">
                            <h4>Danh mục sản phẩm</h4>
                            <ul>
                            @foreach($loaisanpham as $key =>$dlieu)
                            <li><a href="{{route('Home.filter',[$dlieu->id])}}">{{$dlieu->tenloai}}</a></li>
                             @endforeach
                            </ul>
                        </div>

                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Sản phẩm mới</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                        @foreach($sanphammoi as $key =>$spmoi)
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic" style="width: 110px;height: 110px">
                                                <img src="{{URL::to('/public/frontend/image/'.$spmoi->image)}}"alt="">
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
                                            <div class="latest-product__item__pic" style="width: 110px;height: 110px">
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
                <div class="col-lg-9 col-md-7">
                   
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>16</span> Products found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($sanphams as $pro)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{URL::to('/public/frontend/image/'.$pro->image)}}" style="height: 250px">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a class="btnclick" href="{{route('giohang.add',['id'=>$pro->id])}}"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="{{URL::to('chi-tiet/'.$pro->id)}}">{{$pro->tensp}}</a></h6>
                                    <h5>{{number_format($pro->giaban).'vnd'}}</h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                      
                    </div>
                    <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <form action="" method="POST" id="formdelete">
    @csrf @method('GET')
</form>

<form action="" method="POST" id="formclick">
        @csrf @method('GET')
    </form>
    </section>
    <!-- Product Section End -->
    @endsection