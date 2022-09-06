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
                
                    <li><a href="{{route('home')}}">Trang chủ</a>
                        
                    </li>
                    
                    <li><a href="javascript:void(0);">Shop</a>
                        <ul class="nav-dropdown nav-submenu">
                            <li><a href="javascript:void(0);">Account Dashboard</a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="my-orders.html">My Order</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="profile-info.html">Profile Info</a></li>
                                    <li><a href="addresses.html">Addresses</a></li>
                                    <li><a href="payment-methode.html">Payment Methode</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0);">Support</a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="shoping-cart.html">Shopping Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="complete-order.html">Order Complete</a></li>
                                </ul>
                            </li>
                            <li><a href="shop-style-1.html">Shop Style 01</a></li>
                            <li><a href="shop-style-2.html">Shop Style 02</a></li>
                            <li><a href="shop-style-3.html">Shop Style 03</a></li>
                            <li><a href="shop-style-4.html">Shop Style 04</a></li>
                            <li><a href="shop-style-5.html">Shop Style 05</a></li>
                            <li><a href="shop-list-view.html">Shop List Style</a></li>
                        </ul>
                    </li>
                    
                    <li><a href="javascript:void(0);">Sản phẩm</a>
                        <ul class="nav-dropdown nav-submenu">
                            <li><a href="shop-single-v1.html">Product Detail v01</a></li>
                            <li><a href="shop-single-v2.html">Product Detail v02</a></li>
                            <li><a href="shop-single-v3.html">Product Detail v03</a></li>
                            <li><a href="shop-single-v4.html">Product Detail v04</a></li>
                        </ul>
                    </li>
                    
                    <li><a href="javascript:void(0);">Pages</a>
                        <ul class="nav-dropdown nav-submenu">
                            <li><a href="blog.html">Blog Style</a></li>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="404.html">404 Page</a></li>
                            <li><a href="privacy.html">Privacy Policy</a></li>
                            <li><a href="faq.html">FAQs</a></li>
                        </ul>
                    </li>
                    
                    <li><a href="docs.html">Docs</a></li>
                    
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
                        <a href="#" onclick="openCart()">
                            <i class="lni lni-shopping-basket"></i>
                            
                            <span class="dn-counter bg-success" id="total-item-prd">{{session('totalItemPrd')}}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>