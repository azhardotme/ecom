@extends('frontend.master')
@section('content')
<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="img/logo.png" alt=""></a>
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
            <img src="img/language.png" alt="">
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
                             <a href="#"><i class="fa fa-user"></i> Login</a>
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
                     <a href="{{url('/')}}"><img src="{{asset('frontend/img/logo.png')}}" alt=""></a>
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
<!-- Header Section End -->

<!-- Hero Section Begin -->
<section class="hero hero-normal">
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


                        @endforeach
                        </ul>
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
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('frontend')}}/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>My Wishlist</h2>
                    <div class="breadcrumb__option">
                        <a href="{{url('/')}}">Home</a>
                        <span>My Wishlist</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">

                    @if (Session('cart_remove'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{Session('cart_remove')}}</strong>
                    <button type="button" class="close" data-dismiss = "alert" area-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    @endif


                    @if (Session('cart_update'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{Session('cart_update')}}</strong>
                    <button type="button" class="close" data-dismiss = "alert" area-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    @endif


                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Cart</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wishlists as $wishlist)
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="{{asset($wishlist->product->image_one)}}" alt="" height="70px" width="80">
                                    <h5>{{$wishlist->product->product_name}}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    {{$wishlist->product->price}} &#2547;
                                </td>
                                <td class="shoping__cart__price">
                                    <form action="{{url('add/to-cart/'.$wishlist->product_id)}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="price" value="{{$wishlist->product->price}}">
                                   <button  class="btn btn-danger">Add to Cart</button>
                                </form>
                                </td>

                                <td class="shoping__cart__item__close">
                                        <a href="{{url('wishlist/destroy/'.$wishlist->id)}}">
                                            <span class="icon_close"></span>
                                        </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{url('/')}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>

                    {{-- <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Upadate Cart</a> --}}
                </div>
            </div>
            {{-- <div class="col-lg-6">

                @if(Session::has('coupon'))
                @else
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="{{url('apply/coupon')}}" method="POST">
                            @csrf
                            <input type="text" name="coupon_name" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
                @endif
            </div> --}}

            {{-- <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        @if(Session::has('coupon'))
                        <li>Subtotal <span>{{$subtotal}} &#2547;</span></li>
                        <li>Discount <span>{{session()->get('coupon')['coupon_discount' ]}}%
                          ( {{ $discount = $subtotal * session()->get('coupon')['coupon_discount'] / 100}} &#2547; )

                        </span></li>
                          <li>Total <span>{{$subtotal - $discount }} &#2547;</span></li>
                            @else
                            <li>Total <span>{{ $subtotal }} &#2547;</span></li>
                            @endif
                    </ul>
                    <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div> --}}

        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
@endsection
