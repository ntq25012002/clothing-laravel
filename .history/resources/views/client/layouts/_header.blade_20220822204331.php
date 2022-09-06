<div class="header header-transparent dark-text">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="{{route('home')}}">
                    <img src="{{asset('client/assets/img/logo.png')}}" class="logo" alt="" />
                </a>
                <div class="nav-toggle"></div>
                <div class="mobile_nav">
                    <ul>
                        <li>
                        <a href="#" onclick="openSearch()">
                            <i class="lni lni-search-alt"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#login">
                            <i class="lni lni-user"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="openWishlist()">
                            <i class="lni lni-heart"></i><span class="dn-counter">2</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="openCart()">
                            <i class="lni lni-shopping-basket"></i><span class="dn-counter">0</span>
                        </a>
                    </li>
                    </ul>
                </div>
            </div>
            <div class="nav-menus-wrapper" style="transition-property: none;">
                <ul class="nav-menu">
                    <li>
                        <a href="{{route('home')}}">Trang chủ</a>
                    </li>
                    @foreach ($categories as $item)
                        <li><a href="javascript:void(0);">Shop</a>
                            @if ($item['level'] > 0)
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="javascript:void(0);">Account Dashboard</a>
                                        <ul class="nav-dropdown nav-submenu">
                                            <li><a href="my-orders.html">My Order</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            @endif
                        </li>
                    @endforeach
                    {{-- <li><a href="javascript:void(0);">Sản phẩm</a>
                        <ul class="nav-dropdown nav-submenu">
                            <li><a href="shop-single-v1.html">Product Detail v01</a></li>
                            <li><a href="shop-single-v2.html">Product Detail v02</a></li>
                            <li><a href="shop-single-v3.html">Product Detail v03</a></li>
                            <li><a href="shop-single-v4.html">Product Detail v04</a></li>
                        </ul>
                    </li> --}}

                    {{-- <li><a href="javascript:void(0);">Pages</a>
                        <ul class="nav-dropdown nav-submenu">
                            <li><a href="blog.html">Blog Style</a></li>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="404.html">404 Page</a></li>
                            <li><a href="privacy.html">Privacy Policy</a></li>
                            <li><a href="faq.html">FAQs</a></li>
                        </ul>
                    </li> --}}
                    
                    <li><a href="docs.html">Liên hệ</a></li>
                    
                </ul>
                
                <ul class="nav-menu nav-menu-social align-to-right">
                    <li>
                        <a href="#" onclick="openSearch()">
                            <i class="lni lni-search-alt"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#login">
                            <i class="lni lni-user"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="openWishlist()">
                            <i class="lni lni-heart"></i><span class="dn-counter bg-danger">2</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" id="btn_cart" onclick="openCart()" data-url="{{route('shopping-cart')}}">
                            <i class="lni lni-shopping-basket"></i>
                            <span class="dn-counter bg-success" id="total-item-prd">{{session('totalItemPrd') ?? 0}}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>