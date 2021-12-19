@extends('frontend.master')
@section('content')
<body>
    <!-- Page Preloder -->
    <div id="preloder">
     <div class="loader"></div>
 </div>
 <!-- Humberger Begin -->
 <div class="humberger__menu__overlay"></div>
 <div class="humberger__menu__wrapper">
     <div class="humberger__menu__logo">
         <a href="#"><img src="{{asset('frontend/img/logo.png')}}" alt=""></a>
     </div>
     <div class="humberger__menu__cart">
         <ul>
             <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
             <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
         </ul>
         <div class="header__cart__price">item: <span>$150.00</span></div>
     </div>
     <div class="humberger__menu__widget">
         <div class="header__top__right__language">
             <img src="{{asset('frontend/img/language.png')}}" alt="">
             <div>English</div>
             <span class="arrow_carrot-down"></span>
             <ul>
                 <li><a href="#">Spanis</a></li>
                 <li><a href="#">English</a></li>
             </ul>
         </div>
         <div class="header__top__right__auth">
             <a href="#"><i class="fa fa-user"></i> Login</a>
         </div>
     </div>
     <nav class="humberger__menu__nav mobile-menu">
         <ul>
             <li class="active"><a href="./index.html">Home</a></li>
             <li><a href="./shop-grid.html">Shop</a></li>
             <li><a href="#">Pages</a>
                 <ul class="header__menu__dropdown">
                     <li><a href="./shop-details.html">Shop Details</a></li>
                     <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                     <li><a href="./checkout.html">Check Out</a></li>
                     <li><a href="./blog-details.html">Blog Details</a></li>
                 </ul>
             </li>
             <li><a href="./blog.html">Blog</a></li>
             <li><a href="./contact.html">Contact</a></li>
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
             <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
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
                             <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                             <li>Free Shipping for all Order of $99</li>
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
                             @auth
                             <a href="{{route('home')}}"><i class="fa fa-user"></i>My Account</a>
                                 @else
                             <a href="{{route('login')}}"><i class="fa fa-user"></i> Login</a>
                             <a href="{{route('register')}}"><i class="fa fa-user"></i> Register</a>
                             @endauth
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <div class="container">

         @if (Session('cart'))
         <div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>{{Session('cart')}}</strong>
         <button type="button" class="close" data-dismiss = "alert" area-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
         </div>

         @endif
         <div class="row">
             <div class="col-lg-3">
                 <div class="header__logo">
                     <a href="./index.html"><img src="{{asset('frontend/img/logo.png')}}" alt=""></a>
                 </div>
             </div>
             <div class="col-lg-6">
                 <nav class="header__menu">
                     <ul>
                         <li class="active"><a href="./index.html">Home</a></li>
                         <li><a href="./shop-grid.html">Shop</a></li>
                         <li><a href="#">Pages</a>
                             <ul class="header__menu__dropdown">
                                 <li><a href="./shop-details.html">Shop Details</a></li>
                                 <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                 <li><a href="./checkout.html">Check Out</a></li>
                                 <li><a href="./blog-details.html">Blog Details</a></li>
                             </ul>
                         </li>
                         <li><a href="./blog.html">Blog</a></li>
                         <li><a href="./contact.html">Contact</a></li>
                     </ul>
                 </nav>
             </div>
             <div class="col-lg-3">
                 <div class="header__cart">
                     @php
                         $total = App\Models\Cart::all()->where('user_ip',request()->ip())->sum(function($totall){
                             return $totall->price * $totall->qty;

                         });
                         $quantity = App\Models\Cart::where('user_ip',request()->ip())->sum('qty');

                     @endphp
                     <ul>
                         <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                         <li><a href="{{url('cart')}}"><i class="fa fa-shopping-bag"></i> <span> {{$quantity}}</span></a></li>
                     </ul>
                     <div class="header__cart__price">Total: <span> &#2547; {{ $total }}</span>

                     </div>
                 </div>
             </div>
         </div>
         <div class="humberger__open">
             <i class="fa fa-bars"></i>
         </div>
     </div>
 </header>

 <section class="hero">
     <div class="container">
         <div class="row">
             <div class="col-lg-3">
                 <div class="hero__categories">
                     <div class="hero__categories__all">
                         <i class="fa fa-bars"></i>
                         <span>All Category</span>
                     </div>
                     @foreach ($categories as $category)
                     <ul>
                         <li><a href="#">{{$category->category_name}}</a></li>

                     </ul>
                     @endforeach
                 </div>
             </div>
             <div class="col-lg-9">
                 <div class="hero__search">
                     <div class="hero__search__form">
                         <form action="#">
                             <div class="hero__search__categories">
                                 All Categories
                                 <span class="arrow_carrot-down"></span>
                             </div>
                             <input type="text" placeholder="What do yo u need?">
                             <button type="submit" class="site-btn">SEARCH</button>
                         </form>
                     </div>
                     <div class="hero__search__phone">
                         <div class="hero__search__phone__icon">
                             <i class="fa fa-phone"></i>
                         </div>
                         <div class="hero__search__phone__text">
                             <h5>+65 11.188.888</h5>
                             <span>support 24/7 time</span>
                         </div>
                     </div>
                 </div>

<div class="hero__item set-bg" data-setbg="{{asset('frontend/img/hero/banner.jpg')}}">
    <div class="hero__text">
        <span>FRUIT FRESH</span>
        <h2>Vegetable <br />100% Organic</h2>
        <p>Free Pickup and Delivery Available</p>
        <a href="#" class="primary-btn">SHOP NOW</a>
  </div>
    </div>
      </div>
    </div>
</div>
</section>


    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">

                    @foreach ($products as $product)
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{asset($product->image_one)}}">
                            <h5><a href="#">{{$product->product_name}}</a></h5>
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
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">

                        <ul>
                            <li class="active" data-filter="*">All</li>
                            @foreach ($categories as $category)
                            <li data-filter=".filter{{$category->id}}">{{$category->category_name}}</li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
            <div class="row featured__filter">

                 @foreach ($categories as $category)
                @php
                    $products = App\Models\Product::where('category_id',$category->id)->latest()->get();
                @endphp

                @foreach ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mix filter{{$category->id}}">

                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{asset($product->image_one)}}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li>
                                    <form action="{{url('add/to-cart/'.$product->id)}}" method="POST">
                                     @csrf
                                     <input type="hidden" name="price" value="{{$product->price}}">
                                    <button href="{{url('add/to-cart')}}"><i class="fa fa-shopping-cart"></i></button>
                                </form>
                                </li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">{{$product->product_name}}</a></h6>
                            <h5>{{$product->price}} &#2547;</h5>
                        </div>
                    </div>
                </div>
                @endforeach
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
                        <img src="{{asset('frontend')}}/img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{asset('frontend')}}/img/banner/banner-2.jpg" alt="">
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

                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">

                            <div class="latest-prdouct__slider__item">
                              @foreach ($latest_products as $l_product)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset($l_product->image_one)}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$l_product->product_name}}</h6>
                                        <span>{{$l_product->price}} &#2547;</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @foreach ($latest_products as $l_product)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset($l_product->image_one)}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$l_product->product_name}}</h6>
                                        <span>{{$l_product->price}} &#2547;</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach ($latest_products as $l_product)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset($l_product->image_one)}}" alt="">
                                    </div>
                                    <h6>{{$l_product->product_name}}</h6>
                                    <span>{{$l_product->price}} &#2547;</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @foreach ($latest_products as $l_product)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset($l_product->image_one)}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$l_product->product_name}}</h6>
                                        <span>{{$l_product->price}} &#2547;</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">

                                @foreach ($latest_products as $l_product)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset($l_product->image_one)}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$l_product->product_name}}</h6>
                                        <span>{{$l_product->price}} &#2547;</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>

                            <div class="latest-prdouct__slider__item">
                                @foreach ($latest_products as $l_product)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset($l_product->image_one)}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$l_product->product_name}}</h6>
                                        <span>{{$l_product->price}} &#2547;</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div> --}}
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
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-1.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-2.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-3.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
