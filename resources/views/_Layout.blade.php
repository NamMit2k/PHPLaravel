<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop DongHe sport</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{URL::to('public/frontend/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::to('public/frontend/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::to('public/frontend/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::to('public/frontend/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::to('public/frontend/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::to('public/frontend/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::to('public/frontend/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::to('public/frontend/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css"> <!--linh dẫn đến fontawesome để lấy đường dẫn các icon-->

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="{{route('giohang.view')}}"><i class="fa fa-shopping-bag"></i> <span>{{$cart->total_quantity}}</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="{{URL::to('/admin')}}"><i class="fa fa-user"></i> Đăng Nhập</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{URL::to('/')}}">Trang Chủ</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="{{route('giohang.view')}}">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="http://localhost:8080/Shopbangiay/blogs">Tin tức</a></li>
                <li><a href="./contact.html">Liên hệ</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i>nganguyen05062000@gmail.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> nganguyen05062000@gmail.com</li>
                                <li>Miễn Phí Ship cho Đơn Từ 199K</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="{{URL::to('/admin')}}"><i class="fa fa-user"></i> Đăng Nhập</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{URL::to('/')}}">DONG HE SPORT</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{URL::to('/')}}">Trang Chủ</a></li>
                            <li><a href="#">Giới Thiệu</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="{{route('giohang.view')}}">Giỏ hàng</a></li>
                                    <li><a href="./checkout.html">Thanh toán</a></li>
                                </ul>
                            </li>
                            <li><a href="{{url('/blogs')}}">Tin tức</a></li>
                            <li><a href="{{URL::to('/lien-he')}}">Liên Hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="{{route('giohang.view')}}"><i class="fa fa-shopping-bag"></i> <span>{{$cart->total_quantity}}</span></a></li>
                        </ul>
                        <div class="header__cart__price">Tổng Tiền: <span>{{number_format($cart->total_price)}} vnđ</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Danh mục sản phẩm</span>
                        </div>
                       <ul >
                            @foreach($loaisanpham as $key =>$dlieu)
                            <li><a href="{{route('Home.filter',[$dlieu->id])}}">{{$dlieu->tenloai}}</a></li>
                             @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form  action="{{route('Home.search')}}" method="get" class="search-form-cat">
                                <div class="hero__search__categories">
                                    Tất Cả Sản Phẩm
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" class="form-control search-form" name="tukhoa" placeholder="Nhập khóa tìm kiếm của bạn ..."/>
                                <button class="search-button" name="s" type="submit">
                                        <i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>0968361891</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="{{URL::to('public/frontend/image/bannerGiay.jpg')}}">
                        <div class="hero__text">
                            <span>Dong He</span>
                            <h2>Đảm bảo <br />100% Chất lượng</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    @yield('content')

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Địa Chỉ:Yên Mỹ-Hưng Yên</li>
                            <li>Số Điện Thoại: 0968361891</li>
                            <li>Email: hello@colorlib.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Danh Mục</h6>
                        <ul>
                            <li><a href="{{url('http://localhost:8080/Project4/blogs')}}">Tin tức</a></li>
                            <li><a href="#">Giày Utraboot</a></li>
                            <li><a href="#">Giày vans trắng</a></li>
                            <li><a href="#">Yeezy 350</a></li>
                            <li><a href="#">Yeezy 700</a></li>
                            <li><a href="#">Eqt xanh</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Eqt trắng</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Vans xanh</a></li>
                            <li><a href="#">Utraboot hồng</a></li>
                            <li><a href="#">balensiaga vàng</a></li>
                            <li><a href="#">balensiaga</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Đăng Kí ngay</h6>
                        <p>Đăng kí ngay để trải nghiệm mua hàng tốt nhát</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Đăng Kí</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fab fa-facebook-square"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter-square"></i></a>
                            <a href="#"><i class="fab fa-pinterest-square"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> Uy tín | Đảm Bảo Chất Lượng <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">DongHe</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{URL::to('public/frontend/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{URL::to('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::to('public/frontend/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{URL::to('public/frontend/js/jquery-ui.min.js')}}"></script>
    <script src="{{URL::to('public/frontend/js/jquery.slicknav.js')}}"></script>
    <script src="{{URL::to('public/frontend/js/mixitup.min.js')}}"></script>
    <script src="{{URL::to('public/frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{URL::to('public/frontend/js/main.js')}}"></script>

    <script type="text/javascript">

        $('.btnclick').click(function(ev){
        ev.preventDefault();//không cho load lại trang
        var href=$(this).attr('href');

        $('form#formclick').attr('action',href);
        if(confirm("bạn có muốn thêm sản phẩm vào giỏ hàng ?")){
            $('form#formclick').submit();

        }
    })


</script>


</body>

</html>
