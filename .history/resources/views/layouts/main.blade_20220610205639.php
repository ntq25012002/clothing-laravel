<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel App</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./font/fontawesome-free-5.15.4-web/css/all.min.css">
   <link rel="stylesheet" href="../css/base.css">
   <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <div class="app">
        @include("./_header")

        <!-- Wapper -->
        <div class="wapper">

            <div class="slider">
                <div class="slider-items">
                    <div class="item active">
                        <img src="./images/banner1.jpg">
                        <div class="banner-content">
                            <h3 class="banner-title">Woman Fashion</h3>
                            <a href="./list-product.html" class="btn btn--primary banner-content-link">SHOP NOW</a>
                        </div>
                    </div>
                    <div class="item">
                        <img src="./images/banner2.jpg" style="width:100%">
                        <div class="banner-content">
                            <p class="">50% off in all products</p>
                            <h3 class="banner-title">Man Fashion</h3>
                            <a href="./list-product.html" class="btn btn--primary banner-content-link">SHOP NOW</a>
                        </div>
                    </div>
                    <div class="item">
                        <img src="./images/banner3.jpg" style="width:100%">
                        <div class="banner-content">
                            <p class="">Taking your Viewing Experience to Next Level</p>
                            <h3 class="banner-title">Summer Sale</h3>
                            <a href="./list-product.html" class="btn btn--primary banner-content-link">SHOP NOW</a>
                        </div>
                    </div>
                </div>

                    
                <a class="prev" >&#10094;</a>
                <a class="next" >&#10095;</a>

            </div>

            <div class="main-content mt_108">
                <div class="section grid__row grid">
                    <div class="single__banner">
                        <img src="./images/shop_banner_img1.jpg" alt="">
                        <div class="single__banner-info">
                            <h5 class="single__banner-title-1">Super Sale</h5>
                            <h3 class="single__banner-title">New Collection</h3>
                            <a href="./list-product.html" class="btn--size-s btn btn--primary single__banner-link">Shop Now</a>
                        </div>
                    </div>
                    <div class="single__banner">
                        <img src="./images/shop_banner_img2.jpg" alt="">
                        <div class="single__banner-info">
                            <h5 class="single__banner-title ">New Season</h5>
                            <h3 class="single__banner-title-1 pb_20">Sale 40% Off</h3>
                            <a href="./list-product.html" class="btn--size-s btn btn--primary single__banner-link">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="grid__full-with">
                    <div class="container grid grid__row ">
                        <h3 class="heading grid__full-with text-center mt_108 pb_20">
                           New Products
                        </h3>
                        <div class="grid grid__row list-product list-product-new">
                            <div class="product">
                                <span class="product-flash-new">New</span>
                                <div class="product-image">
                                    <img src="./images/product_img1.jpg" alt="">
                                </div>
                                <div class="product-info">
                                     <h4 class="product-title pb_20"><a href="./product-detail.html"> Blue Dress For Woman</a></h4>
                                    <span class="product-price">$45.00</span>
                                    <span class="product-price-old"><del>$55.55</del></span>
                                </div>
                            </div>
                           
                        </div>

                    </div>
                    <div class="tranding mt_108 bg-light-blue grid__full-with ">
                        <div class="tranding-container grid__row grid">
                            <div class="tranding_img">
                                <img src="./images/tranding_img.png" alt="">
                            </div>
                            <div class="tranding_title">
                                <p>New season trends!</p>
                                <h2>Best Summer Collection</h2>
                                <h5>Sale Get up to 50% Off</h5>
                                <a href="" class="btn btn--primary">SHOP NOW</a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="container grid grid__row ">
                        <h3 class="heading grid__full-with text-center mt_108 pb_20">
                            Trending Products
                        </h3>
                        <div class="grid grid__row list-product list-product-trending">
                            <div class="product">
                                <span class="product-flash-hot">hot</span>
                                <div class="product-image">
                                    <img src="./images/product_img1.jpg" alt="">
                                </div>
                                <div class="product-info">
                                    <h4 class="product-title pb_20"><a href="./product-detail.html"> Blue Dress For Woman</a></h4>
                                    <span class="product-price">$45.00</span>
                                    <span class="product-price-old"><del>$55.55</del></span>
                                </div>
                            </div>
                            <div class="product">
                                <span class="product-flash-sale">sale</span>
                                <div class="product-image">
                                    <img src="./images/product_img1.jpg" alt="">
                                </div>
                                <div class="product-info">
                                    <h4 class="product-title pb_20"><a href="./product-detail.html"> Blue Dress For Woman</a></h4>
                                    <span class="product-price">$45.00</span>
                                    <span class="product-price-old"><del>$55.55</del></span>
                                </div>
                            </div>
                            <div class="product">
                                <div class="product-image">
                                    <img src="./images/product_img1.jpg" alt="">
                                </div>
                                <div class="product-info">
                                    <h4 class="product-title pb_20"><a href="./product-detail.html"> Blue Dress For Woman</a></h4>
                                    <span class="product-price">$45.00</span>
                                    <span class="product-price-old"><del>$55.55</del></span>
                                </div>
                            </div>
                            <div class="product">
                                <span class="product-flash-new">new</span>
                                <div class="product-image">
                                    <img src="./images/product_img1.jpg" alt="">
                                </div>
                                <div class="product-info">
                                    <h4 class="product-title pb_20"><a href="./product-detail.html"> Blue Dress For Woman</a></h4>
                                    <span class="product-price">$45.00</span>
                                    <span class="product-price-old"><del>$55.55</del></span>
                                </div>
                            </div> 
                            
                        </div>

                    </div>
                </div>

                <div class="grid__full-with mt_108">
                    <div class="policy grid__row grid">
                        <div class="policy-item policy-delivery">
                            <i class="ti-truck"></i>
                            <h5>Free Delivery</h5>
                            <p>If you are going to use of Lorem, you need to be sure there anything</p>
                        </div>
                        <div class="policy-item policy-return">
                            <i class="ti-reload"></i>
                            <h5>30 Day Return</h5>
                            <p>If you are going to use of Lorem, you need to be sure there anything</p>
                        </div><div class="policy-item">
                            <i class="ti-headphone-alt"></i>
                            <h5>27/4 Support</h5>
                            <p>If you are going to use of Lorem, you need to be sure there anything</p>
                        </div>
                    </div>
                </div>
                
            </div>

        </div>

        <!-- Footer -->
        <footer class="footer grid__full-with">
            <div class="Subscribe__email  grid__full-with bg-primary mt_108">
                <div  class="Subscribe__email-container grid grid__row">
                    <h3>Subscribe Our Newsletter</h3>
                    <form action="">
                        <input type="text" name="" id="email" placeholder="Enter Email Address" >
                        <input type="submit" name="" id="btn_subscribe" value="Subscribe">
                    </form>

                </div>
            </div>
            <div class="footer_container grid grid__row pt_108" >
                <div class="footer-widget">
                    <div class="footer-widget-logo">
                        <a href="./index.html"><img src="./images/logo_light.png" alt=""></a> 
                    </div>
                    <div class="footer-widget-text">
                        <p>If you are going to use of Lorem Ipsum need to be sure there isn't hidden of text</p>
                    </div>
                    <ul class="footer-socials">
                        <li class="footer-social-item">
                            <a href="" class="footer-social-item-link"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="footer-social-item">
                            <a href="" class="footer-social-item-link"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li class="footer-social-item">
                            <a href="" class="footer-social-item-link"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li class="footer-social-item">
                            <a href="" class="footer-social-item-link"><i class="fab fa-telegram-plane"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="footer-widget">
                    <h6 class="heading-text">Useful Links</h6>
                    <ul class="widget-list">
                        <li class="widget-item"><a href="" class="widget-link">About Us</a></li>
                        <li class="widget-item"><a href="" class="widget-link">FAQ</a></li>
                        <li class="widget-item"><a href="" class="widget-link">Location</a></li>
                        <li class="widget-item"><a href="" class="widget-link">Affiliates</a></li>
                        <li class="widget-item"><a href="./contact.html" class="widget-link">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-widget">
                    <h6 class="heading-text">Useful Links</h6>
                    <ul class="widget-list">
                        <li class="widget-item"><a href="" class="widget-link">About Us</a></li>
                        <li class="widget-item"><a href="" class="widget-link">FAQ</a></li>
                        <li class="widget-item"><a href="" class="widget-link">Location</a></li>
                        <li class="widget-item"><a href="" class="widget-link">Affiliates</a></li>
                        <li class="widget-item"><a href="" class="widget-link">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-widget">
                    <h6 class="heading-text">Useful Links</h6>
                    <ul class="widget-list">
                        <li class="widget-item"><a href="" class="widget-link">About Us</a></li>
                        <li class="widget-item"><a href="" class="widget-link">FAQ</a></li>
                        <li class="widget-item"><a href="" class="widget-link">Location</a></li>
                        <li class="widget-item"><a href="" class="widget-link">Affiliates</a></li>
                        <li class="widget-item"><a href="" class="widget-link">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-widget">
                    <h6 class="heading-text">Contact Info</h6>
                    <ul class="widget-list">
                        <li class="widget-item">
                            <a class="widget-link" href="tel:0964540635">
                                <i class="ti-mobile"></i>
                                0964540635
                            </a>
                        </li>
                        <li class="widget-item">
                            <a class="widget-link" href="mailto:quanntph18231@fpt.edu.vn">
                                <i class="ti-email"></i>
                                quanntph18231@fpt.edu.vn
                            </a>
                        </li>
                        <li class="widget-item">
                            <a class="widget-link" href="">
                                <i class="ti-location-pin"></i>
                                Thach That, Ha Noi, VietNames
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer_bottom grid__full-with mt_108">
                <div class="footer_bottom-containner grid grid__row">
                    <p>© 2022 All Rights Reserved by Nguyen Trung Quan</p>
                    <div class="footer_bottom-payment">
                        <img src="./images/visa.png" alt="">
                        <img src="./images/discover.png" alt="">
                        <img src="./images/master_card.png" alt="">
                        <img src="./images/paypal.png" alt="">
                        <img src="./images/amarican_express.png" alt="">
                    </div>
                </div>
            </div>
        </footer>

        <!-- Modal -->
        <div class="modal ">
            <div class=" modal__overlay"></div>
            <div class="modal__body">
                <form action="" class="form__search">
                    <i class="ti-close icon-close"></i>
                    <input type="text" name="" id="search_keyword" placeholder="Search...">
                    <i class="ti-search icon-search2"></i>
                </form>
            </div>
        </div>
    </div>


    <!-- javascript -->
    <script src="./js/slider.js"></script>
    <script src="./js/app.js"></script>

    <script>
        var productApi = 'http://localhost:3000/products'
        // http://localhost:3000/products?_sort=id&_order=desc&_limit=8
        var categoryApi = 'http://localhost:3000/categories'
        function start() {
            getNewProduct(renderNewProduct);
            getTrendingProducts(renderTrendingProducts);
            getCategory(renderCategory);
        }
        start();
        function getNewProduct(callback) {
            fetch(productApi + '?_sort=id&_order=desc&_limit=8')
            .then(function (response) {
                return response.json();
            })
            .then(callback)
        }
        function renderNewProduct(products){
            var listProducts = document.querySelector('.list-product-new');
            console.log(products)

            var productFlash = document.querySelector('.product-flash');
            console.log(productFlash)
            var productImage = document.querySelector('#product-img');
            var productTitle = document.querySelector('.product-title a');
            var productPrice = document.querySelector('.product-price');
            var productPriceOld = document.querySelector('.product-price-old');

            var htmls = products.map(function(product){
                
                return `<div class="product">
                            <span class="product-flash ${product.discount==0?'product-flash-new':'product-flash-sale'}">${product.discount==0?'New':'Sale'}</span>
                            <div class="product-image">
                                <a href="./product-detail.html?id=${product.id}"> 
                                    <img src="${product.image}" alt="" id="product-img">
                                </a>
                            </div>
                            <div class="product-info">
                                    <h4 class="product-title pb_20"><a href="./product-detail.html?id=${product.id}&categoryId=${product.categoryId}">${product.productname}</a></h4>
                                <span class="product-price">$${product.price - product.price*product.discount/100}</span>
                                <span><del class="product-price-old ${product.discount==0?'none':''}">$${product.price}</del></span>
                            </div>
                        </div>`
            })
            listProducts.innerHTML = htmls.join('');
        }
        // http://localhost:3000/products?_sort=id&_order=desc&_limit=8
        
        function getTrendingProducts(callback2) {
            fetch(productApi+'?_sort=view&_order=desc&_limit=8')
            .then(function(res) {
                return res.json();
            })
            .then(callback2);
        }

        function renderTrendingProducts(products2) {
            console.log(products2);
            var listTrendingProducts = document.querySelector('.list-product-trending');
            var htmls = products2.map(function(product) {
                return `<div class="product">
                            <span class="product-flash ${product.view>0?'product-flash-hot':'product-flash-new'}">${product.view>0?'Hot':'New'}</span>
                            <div class="product-image">
                                <a href="./product-detail.html?id=${product.id}"> 
                                    <img src="${product.image}" alt="" id="product-img">
                                </a>
                            </div>
                            <div class="product-info">
                                    <h4 class="product-title pb_20"><a href="./product-detail.html?id=${product.id}">${product.productname}</a></h4>
                                <span class="product-price">$${product.price - product.price*product.discount/100}</span>
                                <span><del class="product-price-old ${product.discount==0?'none':''}">$${product.price}</del></span>
                            </div>
                        </div>`
            })
            listTrendingProducts.innerHTML = htmls.join('');
        }


        function getCategory(callback3) {
            fetch(categoryApi+'?_sort=id&_order=desc')
            .then(function(response) {
                return response.json();
            })
            .then(callback3);
        }

        function renderCategory(categories){
            var listCategory = document.querySelector('.sub_nav-products');
            var htmls = categories.map(function(category){
                return `<li class="sub_nav-products-item">
                            <a class="sub_nav-products-link" href="./list-product.html?categoryId=${category.id}">${category.name}</a>
                        </li>`
            })
            listCategory.innerHTML = htmls.join('')
        }

    </script>

</body>
</html>