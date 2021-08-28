@extends('frontend.layout.app2')
@section('main_content')
<main class="no-main">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="ps-breadcrumb__list">
                <li class="active"><a href="index.html">Home</a></li>
                <li class="active"><a href="shop.html">Beer, Wine &amp; Spirits</a></li>
                <li class="active"><a href="shop.html">Beer</a></li>
                <li><a href="javascript:void(0);">Beck's Blue Alcohol Free Beer</a></li>
            </ul>
        </div>
    </div>
    <section class="section--product-type">
        <div class="container">
            <div class="product__header">
                <h3 class="product__name">Beck's Blue Alcohol Free Beer</h3>

            </div>
            <div class="product__detail">
                <div class="row">
                    <div class="col-12 col-lg-9">
                        <div class="ps-product--detail">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="ps-product__variants">

                                        <div class="ps-product__thumbnail">
                                            <div class="ps-product__zoom"><img id="ps-product-zoom" src="../{{ $product->thumbnail_image }}" alt="alt" />

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="ps-product__sale"><span class="price-sale">{{ $product->price }}</span><span class="price">{{ $product->price  }}</span><span class="ps-product__off">15% Off</span>
                                    </div>
                                    <div class="ps-product__unit">{{ $product->unit->unit_quantity }} {{ $product->unit->unit_type }}</div>
                                    <div class="ps-product__avai alert__success">Availability: <span>{{ $product->stock }}</span>
                                    </div>

                                    <div class="ps-product__shopping">
                                        <div class="ps-product__quantity">
                                            <label>Quantity: </label>
                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus dec" onclick="dec({{$product->id  }})" ><i class="icon-minus"></i></button>
                                                <input class="quantity quantity-{{ $product->id }}" value="1" min="0" name="quantity" type="number" id="quantity-{{ $product->id }}"  readonly='readonly' />
                                                <input type="hidden" name="hidden_product_id" value={{  $product->id}}>
                                                <button class="plus inc"><i class="icon-plus"></i></button>
                                            </div>
                                        </div><button class="ps-product__addcart ps-button" onclick="cart_add({{ $product->id }})"><i class="icon-cart"></i>Add to cart</button>
                                    </div>

                                    <div class="ps-product__footer"><a class="ps-product__shop" href="shop-view-grid.html"><i class="icon-store"></i><span>Store</span></a><a class="ps-product__addcart ps-button" data-toggle="modal" data-target="#popupAddToCart"><i class="icon-cart"></i>Add to cart</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="ps-product--extention">



                            <div class="extention__block extention__contact">
                                <p> <span class="text-black">Hotline Order: </span>Free 7:00-21:30</p>
                                <h4 class="extention__phone">970978-6290</h4>
                                <h4 class="extention__phone">970343-8888</h4>
                            </div>
                            <p class="extention__footer">Become a Vendor? <a href="register.html">Register now</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product__content">
                <ul class="nav nav-pills" role="tablist" id="productTabDetail">
                    <li class="nav-item"><a class="nav-link active" id="description-tab" data-toggle="tab" href="#description-content" role="tab" aria-controls="description-content" aria-selected="true">Description</a></li>
                    <li class="nav-item"><a class="nav-link" id="nutrition-tab" data-toggle="tab" href="#nutrition-content" role="tab" aria-controls="nutrition-content" aria-selected="false">Nutrition</a></li>
                    <li class="nav-item"><a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews-content" role="tab" aria-controls="reviews-content" aria-selected="false">Reviews(4)</a></li>
                    <li class="nav-item"><a class="nav-link" id="qa-tab" data-toggle="tab" href="#qa-content" role="tab" aria-controls="qa-content" aria-selected="false">Q&A</a></li>
                    <li class="nav-item"><a class="nav-link" id="vendor-tab" data-toggle="tab" href="#vendor-content" role="tab" aria-controls="vendor-content" aria-selected="false">Vendor Info</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="description-content" role="tabpanel" aria-labelledby="description-tab">
                        <p class="block-content">Raised without antibiotics and full of flavor, this beef is the base of big, juicy burgers, savory meat loaf and rich Bolognese sauce. You can enjoy this delicious local ground beef for your meatloaf, burgers, meatballs, shepherd's pie, spicy taco meat and so much more.</p>
                        <p class="block-content">As one of Farmart's premium beef suppliers, <b class='text-black'>Local Angus</b> works with a coalition of small family farms throughout the Mid-Atlantic region *who feed theri cattle a diet of primarily grass, supplemented by grain throughout the finishing months. Every farm in this program is independently audited for animal welfare practices to ensure the best standards of care.</p>
                        <div class="heading-1">Preparation and Usage</div>
                        <p class="block-content">For perfectly cooked beef, our head chef recommends:</p>
                        <div class="heading-2">Storage</div>
                        <p class="block-content">Keep refrigerated 0-5<sup>o</sup>C. Consume within the use by date. Once pack is opened use on the same day. Suitable for free zing on day of purchase. Use within one month. Defrost fully before use. Do not re-freeze once defrosted.</p>
                        <div class="heading-2">Pan Fry</div>
                        <p class="block-content">Pour a little oil into a frying pan and cook for 4-6 minutes until browned. If preferred, drain off excess fat. Add a good beef stock, seasonal vegetables and a sprinkling of sea salt and freshly ground black pepper. Bring to the boil and reduce heat to simmer for 20 minutes until the meat is thoroughly cooked and your kitchen smells delicious. Wash hands, knives and surfaxes thoroughly before and after preparing raw meat.</p>
                        <div class="heading-2">Return To Address</div>
                        <p class="block-content"><span class='text-success'>Daylesford near Kingham, Gloucestershire GL56 OYG</span></p>
                        <p class="block-content">We choose British breeds who thrive in their native landscape and encourage healthy biodiversity on our farm. We avoid waste of any kind, so manure and kitchen waste compost are returned to the soil as rich natural fertilisers. We have built our own abattoir to ensure the highest animal welfare and reduced food miles, which results in better tasting meat, and we spread our message far beyond the boundaries of our own fields.</p>
                        <p class="block-content">Each step of our journey is made with a conscience, and a love for food.</p>
                    </div>
                    <div class="tab-pane fade" id="nutrition-content" role="tabpanel" aria-labelledby="nutrition-tab">
                        <div class="heading-2">Ingredients </div>
                        <p class="block-content">Allergy Advice: For allergens see highlighted ingredients</p>
                        <p class="block-content">Beef, Preservatives (Potassium Lactate, Sodium Acetates, Sodium Nitrite, Potassium Nitrite), Salt, Sugar, Maize Starch, Spices, Caramelised Sugar Powder, Smoked Paprika, Garlic Powder, Onion Powder, Rapeseed Oil, Thyme, Parsley, Prepared with 109g of Beef per 100g of finished product.</p>
                        <div class="heading-2">Dietary Information </div>
                        <p class="block-content">May Contain Celery, May Contain Cereals Containing Gluten, May Contain Eggs, May Contain Fish, May Contain Milk, May Contain Mustard, May Contain Soya.</p>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th><b class="text-black">Typical Values(*)</b></th>
                                    <th><b class="text-black">per 100g</b></th>
                                    <th><b class="text-black">per slice (20g)</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Energy</td>
                                    <td>536kj</td>
                                    <td>107kj</td>
                                </tr>
                                <tr>
                                    <td>Fat</td>
                                    <td>127kcal</td>
                                    <td>25kcal</td>
                                </tr>
                                <tr>
                                    <td>Of which saturates</td>
                                    <td>0.9g</td>
                                    <td>0.2g</td>
                                </tr>
                                <tr>
                                    <td>Carbohydrate</td>
                                    <td>0.7g</td>
                                    <td>0.1g</td>
                                </tr>
                                <tr>
                                    <td>Of which sugars</td>
                                    <td>0.5g</td>
                                    <td>0.1g</td>
                                </tr>
                                <tr>
                                    <td>Fibre</td>
                                    <td>0.5g</td>
                                    <td>0.1g</td>
                                </tr>
                                <tr>
                                    <td>Protein</td>
                                    <td>24.2g</td>
                                    <td>4.8g</td>
                                </tr>
                                <tr>
                                    <td>Salt</td>
                                    <td>1.82g</td>
                                    <td>0.36g</td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="text-center pb-4"><i>* Based on a 2,000 calorie diet. Your daily values may be higher or lower depending on your calorie needs:</i></p>
                    </div>
                    <div class="tab-pane fade" id="reviews-content" role="tabpanel" aria-labelledby="reviews-tab">
                        <div class="ps-product--reviews">
                            <div class="row">
                                <div class="col-12 col-lg-5">
                                    <div class="review__box">
                                        <div class="product__rate">4.5</div>
                                        <select class="rating-stars">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4" selected="selected">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <p>Avg. Star Rating: <b class="text-black">(4 reviews)</b></p>
                                        <div class="review__progress">
                                            <div class="progress-item"><span class="star">5 Stars</span>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 80%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div><span class="percent">80%</span>
                                            </div>
                                            <div class="progress-item"><span class="star">4 Stars</span>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div><span class="percent">20%</span>
                                            </div>
                                            <div class="progress-item"><span class="star">3 Stars</span>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 0%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div><span class="percent">0%</span>
                                            </div>
                                            <div class="progress-item"><span class="star">2 Stars</span>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 0%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div><span class="percent">0%</span>
                                            </div>
                                            <div class="progress-item"><span class="star">1 Stars</span>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 0%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div><span class="percent">0%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-7">
                                    <div class="review__title">Add A Review</div>
                                    <p class="mb-0">Your email will not be published. Required fields are marked <span class="text-danger">*</span></p>
                                    <form>
                                        <div class="form-row">
                                            <div class="col-12 form-group--block">
                                                <div class="input__rating">
                                                    <label>Your rating: <span>*</span></label>
                                                    <select class="rating-stars">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4" selected="selected">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 form-group--block">
                                                <label>Review: <span>*</span></label>
                                                <textarea class="form-control"></textarea>
                                            </div>
                                            <div class="col-12 col-lg-6 form-group--block">
                                                <label>Name: <span>*</span></label>
                                                <input class="form-control" type="text" required>
                                            </div>
                                            <div class="col-12 col-lg-6 form-group--block">
                                                <label>Email:</label>
                                                <input class="form-control" type="email">
                                            </div>
                                            <div class="col-12 form-group--block">
                                                <button class="btn ps-button ps-btn-submit">Submit Review</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="ps--comments">
                                <h5 class="comment__title">4 Comments</h5>
                                <ul class="comment__list">
                                    <li class="comment__item">
                                        <div class="item__avatar"><img src="img/blogs/comment_avatar1.png" alt="alt" /></div>
                                        <div class="item__content">
                                            <div class="item__name">Elyn Y.</div>
                                            <div class="item__date">- June 14, 2020</div>
                                            <div class="item__check"> <i class="icon-checkmark-circle"></i>Verified Purchase</div>
                                            <div class="item__rate">
                                                <select class="rating-stars">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4" selected="selected">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                            <p class="item__des">Farmart is great. Farmart is the most valuable business resource we have EVER purchased. I have gotten at least 50 times the value from Farmart. I just can't get enough of Farmart. I want to get a T-Shirt with Farmart on it so I can show it off to everyone.</p>
                                        </div>
                                    </li>
                                    <li class="comment__item">
                                        <div class="item__avatar"><img src="img/blogs/comment_avatar2.png" alt="alt" /></div>
                                        <div class="item__content">
                                            <div class="item__name">Rick E.</div>
                                            <div class="item__date">- June 14, 2020</div>
                                            <div class="item__check"> <i class="icon-checkmark-circle"></i>Verified Purchase</div>
                                            <div class="item__rate">
                                                <select class="rating-stars">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4" selected="selected">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                            <p class="item__des">Farmart is great. Farmart is the most valuable business resource we have EVER purchased. I have gotten at least 50 times the value from Farmart. I just can't get enough of Farmart. I want to get a T-Shirt with Farmart on it so I can show it off to everyone.</p>
                                        </div>
                                    </li>
                                    <li class="comment__item">
                                        <div class="item__avatar"><img src="img/blogs/comment_no_avatar.png" alt="alt" /></div>
                                        <div class="item__content">
                                            <div class="item__name">Timmi Y.</div>
                                            <div class="item__date">- June 13, 2020</div>
                                            <div class="item__check"> <i class="icon-checkmark-circle"></i>Verified Purchase</div>
                                            <div class="item__rate">
                                                <select class="rating-stars">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5" selected="selected">5</option>
                                                </select>
                                            </div>
                                            <p class="item__des">Farmart is great. Farmart is the most valuable business resource we have EVER purchased. I have gotten at least 50 times the value from Farmart. I just can't get enough of Farmart. I want to get a T-Shirt with Farmart on it so I can show it off to everyone.</p>
                                        </div>
                                    </li>
                                    <li class="comment__item">
                                        <div class="item__avatar"><img src="img/blogs/comment_no_avatar.png" alt="alt" /></div>
                                        <div class="item__content">
                                            <div class="item__name">Jack F.</div>
                                            <div class="item__date">- June 05, 2020</div>
                                            <div class="item__check"> <i class="icon-checkmark-circle"></i>Verified Purchase</div>
                                            <div class="item__rate">
                                                <select class="rating-stars">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5" selected="selected">5</option>
                                                </select>
                                            </div>
                                            <p class="item__des">Farmart is great. Farmart is the most valuable business resource we have EVER purchased. I have gotten at least 50 times the value from Farmart. I just can't get enough of Farmart. I want to get a T-Shirt with Farmart on it so I can show it off to everyone.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="qa-content" role="tabpanel" aria-labelledby="qa-tab">Q&A</div>
                    <div class="tab-pane fade" id="vendor-content" role="tabpanel" aria-labelledby="vendor-tab">Vendor Info</div>
                </div>
            </div>
            <div class="product__related" id="productTabDetailContent">
                <h3 class="product__name">Related Products</h3>
                <div class="owl-carousel" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                    <div class="ps-post--product">
                        <div class="ps-product--standard"><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_29a.jpg" alt="alt" /></a><a class="ps-product__expand" href="javascript:void(0);" data-toggle="modal" data-target="#popupQuickview"><i class="icon-expand"></i></a>
                            <div class="ps-product__content">
                                <p class="ps-product__type"><i class="icon-store"></i>Farmart</p>
                                <h5><a class="ps-product__name" href="product-default.html">Michelob Ultra Cans</a></h5>
                                <p class="ps-product__unit">1.5L</p>
                                <div class="ps-product__rating">
                                    <select class="rating-stars">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4" selected="selected">4</option>
                                        <option value="5">5</option>
                                    </select><span>(2)</span>
                                </div>
                                <p class="ps-product-price-block"><span class="ps-product__sale">$15.90</span><span class="ps-product__price">$20.00</span><span class="ps-product__off">23% Off</span>
                                </p>
                            </div>
                            <div class="ps-product__footer">
                                <div class="def-number-input number-input safari_only">
                                    <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                    <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                    <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                </div>
                                <div class="ps-product__total">Total: <span>$15.90</span>
                                </div>
                                <button class="ps-product__addcart" data-toggle="modal" data-target="#popupAddToCart"><i class="icon-cart"></i>Add to cart</button>
                                <div class="ps-product__box"><a class="ps-product__wishlist" href="wishlist.html">Wishlist</a><a class="ps-product__compare" href="wishlist.html">Compare</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-post--product">
                        <div class="ps-product--standard"><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_13a.jpg" alt="alt" /></a><a class="ps-product__expand" href="javascript:void(0);" data-toggle="modal" data-target="#popupQuickview"><i class="icon-expand"></i></a>
                            <div class="ps-product__content">
                                <p class="ps-product__type"><i class="icon-store"></i>Farmart</p>
                                <h5><a class="ps-product__name" href="product-default.html">Extreme Budweiser Light Can</a></h5>
                                <p class="ps-product__unit">250g</p>
                                <div class="ps-product__rating">
                                    <select class="rating-stars">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5" selected="selected">5</option>
                                    </select><span>(14)</span>
                                </div>
                                <p class="ps-product-price-block"><span class="ps-product__sale">$6.99</span><span class="ps-product__price">$12.00</span><span class="ps-product__off">45% Off</span>
                                </p>
                            </div>
                            <div class="ps-product__footer">
                                <div class="def-number-input number-input safari_only">
                                    <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                    <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                    <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                </div>
                                <div class="ps-product__total">Total: <span>$6.99</span>
                                </div>
                                <button class="ps-product__addcart" data-toggle="modal" data-target="#popupAddToCart"><i class="icon-cart"></i>Add to cart</button>
                                <div class="ps-product__box"><a class="ps-product__wishlist" href="wishlist.html">Wishlist</a><a class="ps-product__compare" href="wishlist.html">Compare</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-post--product">
                        <div class="ps-product--standard"><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_30a.jpg" alt="alt" /></a><a class="ps-product__expand" href="javascript:void(0);" data-toggle="modal" data-target="#popupQuickview"><i class="icon-expand"></i></a>
                            <div class="ps-product__content">
                                <p class="ps-product__type"><i class="icon-store"></i>Farmart</p>
                                <h5><a class="ps-product__name" href="product-default.html">Grapes, Red Seedless</a></h5>
                                <p class="ps-product__unit">5 per pack</p>
                                <div class="ps-product__rating">
                                    <select class="rating-stars">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select><span>(0)</span>
                                </div>
                                <p class="ps-product-price-block"><span class="ps-product__sale">$12.90</span><span class="ps-product__price">$20.99</span><span class="ps-product__off">25% Off</span>
                                </p>
                            </div>
                            <div class="ps-product__footer">
                                <div class="def-number-input number-input safari_only">
                                    <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                    <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                    <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                </div>
                                <div class="ps-product__total">Total: <span>$12.90</span>
                                </div>
                                <button class="ps-product__addcart" data-toggle="modal" data-target="#popupAddToCart"><i class="icon-cart"></i>Add to cart</button>
                                <div class="ps-product__box"><a class="ps-product__wishlist" href="wishlist.html">Wishlist</a><a class="ps-product__compare" href="wishlist.html">Compare</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-post--product">
                        <div class="ps-product--standard"><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_1a.jpg" alt="alt" /></a><a class="ps-product__expand" href="javascript:void(0);" data-toggle="modal" data-target="#popupQuickview"><i class="icon-expand"></i></a><span class="ps-badge ps-product__new">New </span>
                            <div class="ps-product__content">
                                <p class="ps-product__type"><i class="icon-store"></i>Farmart</p>
                                <h5><a class="ps-product__name" href="product-default.html">Morrisons The Best Beef Topside</a></h5>
                                <p class="ps-product__unit">454g</p>
                                <div class="ps-product__rating">
                                    <select class="rating-stars">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select><span>(0)</span>
                                </div>
                                <p class="ps-product-price-block"><span class="ps-product__sale">$5.99</span><span class="ps-product__price">$8.99</span><span class="ps-product__off">30% Off</span>
                                </p>
                            </div>
                            <div class="ps-product__footer">
                                <div class="def-number-input number-input safari_only">
                                    <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                    <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                    <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                </div>
                                <div class="ps-product__total">Total: <span>$5.99</span>
                                </div>
                                <button class="ps-product__addcart" data-toggle="modal" data-target="#popupAddToCart"><i class="icon-cart"></i>Add to cart</button>
                                <div class="ps-product__box"><a class="ps-product__wishlist" href="wishlist.html">Wishlist</a><a class="ps-product__compare" href="wishlist.html">Compare</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-post--product">
                        <div class="ps-product--standard"><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_18a.jpg" alt="alt" /></a><a class="ps-product__expand" href="javascript:void(0);" data-toggle="modal" data-target="#popupQuickview"><i class="icon-expand"></i></a>
                            <div class="ps-product__content">
                                <p class="ps-product__type"><i class="icon-store"></i>Shannan Yu</p>
                                <h5><a class="ps-product__name" href="product-default.html">Natures Own 100% Wheat</a></h5>
                                <p class="ps-product__unit">454g</p>
                                <div class="ps-product__rating">
                                    <select class="rating-stars">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select><span>(0)</span>
                                </div>
                                <p class="ps-product-price-block"><span class="ps-product__price-default">$12.00</span>
                                </p>
                            </div>
                            <div class="ps-product__footer">
                                <div class="def-number-input number-input safari_only">
                                    <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                    <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                    <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                </div>
                                <div class="ps-product__total">Total: <span>$12.00</span>
                                </div>
                                <button class="ps-product__addcart" data-toggle="modal" data-target="#popupAddToCart"><i class="icon-cart"></i>Add to cart</button>
                                <div class="ps-product__box"><a class="ps-product__wishlist" href="wishlist.html">Wishlist</a><a class="ps-product__compare" href="wishlist.html">Compare</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-post--product">
                        <div class="ps-product--standard"><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/06-SoftDrinks-TeaCoffee/06_11a.jpg" alt="alt" /></a><a class="ps-product__expand" href="javascript:void(0);" data-toggle="modal" data-target="#popupQuickview"><i class="icon-expand"></i></a><span class="ps-badge ps-product__offbadge">35% Off </span>
                            <div class="ps-product__content">
                                <p class="ps-product__type"><i class="icon-store"></i>Shannan Yu</p>
                                <h5><a class="ps-product__name" href="product-default.html">Corn, Yellow Sweet</a></h5>
                                <p class="ps-product__unit">100g</p>
                                <div class="ps-product__rating">
                                    <select class="rating-stars">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3" selected="selected">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select><span>(6)</span>
                                </div>
                                <p class="ps-product-price-block"><span class="ps-product__price-default">$9.99</span>
                                </p>
                            </div>
                            <div class="ps-product__footer">
                                <div class="def-number-input number-input safari_only">
                                    <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                    <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                    <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                </div>
                                <div class="ps-product__total">Total: <span>$9.99</span>
                                </div>
                                <button class="ps-product__addcart" data-toggle="modal" data-target="#popupAddToCart"><i class="icon-cart"></i>Add to cart</button>
                                <div class="ps-product__box"><a class="ps-product__wishlist" href="wishlist.html">Wishlist</a><a class="ps-product__compare" href="wishlist.html">Compare</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="popupQuickview" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl ps-quickview">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid quickview-body">
                            <div class="row">
                                <div class="col-12 col-lg-5">
                                    <div class="owl-carousel" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-item-xl="1" data-owl-duration="1000" data-owl-mousedrag="on">
                                        <div class="quickview-carousel"><img class="carousel__thumbnail" src="img/products/01-Fresh/01_1a.jpg" alt="alt" /></div>
                                        <div class="quickview-carousel"><img class="carousel__thumbnail" src="img/products/01-Fresh/01_2a.jpg" alt="alt" /></div>
                                        <div class="quickview-carousel"><img class="carousel__thumbnail" src="img/products/01-Fresh/01_4a.jpg" alt="alt" /></div>
                                        <div class="quickview-carousel"><img class="carousel__thumbnail" src="img/products/01-Fresh/01_9a.jpg" alt="alt" /></div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-7">
                                    <div class="quickview__product">
                                        <div class="product__header">
                                            <div class="product__title">Hovis Farmhouse Soft White Bread</div>
                                            <div class="product__meta">
                                                <div class="product__rating">
                                                    <select class="rating-stars">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4" selected="selected">4</option>
                                                        <option value="5">5</option>
                                                    </select><span>4 customer reviews</span>
                                                </div>
                                                <div class="product__code"><span>SKU: </span>#VEG20938</div>
                                            </div>
                                        </div>
                                        <div class="product__content">
                                            <div class="product__price"><span class="sale">$5.49</span><span class="price">$6.90</span><span class="off">25% Off</span></div>
                                            <p class="product__unit">300g</p>
                                            <div class="alert__success">Availability: <span>34 in stock</span></div>
                                            <ul>
                                                <li>Type: Organic</li>
                                                <li>MFG: Jun 4, 2020</li>
                                                <li>LIFE: 30 days</li>
                                            </ul>
                                        </div>
                                        <div class="product__action">
                                            <label>Quantity: </label>
                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                                <input class="quantity" min="0" name="quantity" value="1" type="number">
                                                <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                            </div>
                                            <button class="btn product__addcart"> <i class="icon-cart"></i>Add to cart</button>
                                            <button class="btn button-icon icon-md"><i class="icon-repeat"></i></button>
                                            <button class="btn button-icon icon-md"><i class="icon-heart"></i></button>
                                        </div>
                                        <div class="product__footer">
                                            <div class="ps-social--share"><a class="ps-social__icon facebook" href="#"><i class="fa fa-thumbs-up"></i><span>Like</span><span class="ps-social__number">0</span></a><a class="ps-social__icon facebook" href="#"><i class="fa fa-facebook-square"></i><span>Like</span><span class="ps-social__number">0</span></a><a class="ps-social__icon twitter" href="#"><i class="fa fa-twitter"></i><span>Like</span></a><a class="ps-social__icon" href="#"><i class="fa fa-plus-square"></i><span>Like</span></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="popupAddToCart" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl ps-addcart">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="alert__success"><i class="icon-checkmark-circle"></i> "Morrisons The Best Beef Topside" successfully added to you cart. <a href="shopping-cart.html">View cart(3)</a></div>
                            <hr>
                            <h3 class="cart__title">CUSTOMERS WHO BOUGHT THIS ALSO BOUGHT:</h3>
                            <div class="cart__content">
                                <div class="owl-carousel" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="4" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="4" data-owl-item-xl="4" data-owl-duration="1000" data-owl-mousedrag="on">
                                    <div class="cart-item">
                                        <div class="ps-product--standard"><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_35a.jpg" alt="alt" /></a>
                                            <div class="ps-product__content">
                                                <p class="ps-product__type"><i class="icon-store"></i>Farmart</p><a href="product-default.html">
                                                    <h5 class="ps-product__name">Extreme Budweiser Light Can</h5>
                                                </a>
                                                <p class="ps-product__unit">500g</p>
                                                <div class="ps-product__rating">
                                                    <select class="rating-stars">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4" selected="selected">4</option>
                                                        <option value="5">5</option>
                                                    </select><span>(4)</span>
                                                </div>
                                                <p class="ps-product-price-block"><span class="ps-product__sale">$8.90</span><span class="ps-product__price">$9.90</span><span class="ps-product__off">15% Off</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-item">
                                        <div class="ps-product--standard"><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_16a.jpg" alt="alt" /></a>
                                            <div class="ps-product__content">
                                                <p class="ps-product__type"><i class="icon-store"></i>Karery Store</p><a href="product-default.html">
                                                    <h5 class="ps-product__name">Honest Organic Still Lemonade</h5>
                                                </a>
                                                <p class="ps-product__unit">100g</p>
                                                <div class="ps-product__rating">
                                                    <select class="rating-stars">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5" selected="selected">5</option>
                                                    </select><span>(14)</span>
                                                </div>
                                                <p class="ps-product-price-block"><span class="ps-product__price-default">$1.99</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-item">
                                        <div class="ps-product--standard"><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_12a.jpg" alt="alt" /></a>
                                            <div class="ps-product__content">
                                                <p class="ps-product__type"><i class="icon-store"></i>John Farm</p><a href="product-default.html">
                                                    <h5 class="ps-product__name">Natures Own 100% Wheat</h5>
                                                </a>
                                                <p class="ps-product__unit">100g</p>
                                                <div class="ps-product__rating">
                                                    <select class="rating-stars">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select><span>(0)</span>
                                                </div>
                                                <p class="ps-product-price-block"><span class="ps-product__price-default">$4.49</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-item">
                                        <div class="ps-product--standard"><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_15a.jpg" alt="alt" /></a>
                                            <div class="ps-product__content">
                                                <p class="ps-product__type"><i class="icon-store"></i>Farmart</p><a href="product-default.html">
                                                    <h5 class="ps-product__name">Avocado, Hass Large</h5>
                                                </a>
                                                <p class="ps-product__unit">300g</p>
                                                <div class="ps-product__rating">
                                                    <select class="rating-stars">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3" selected="selected">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select><span>(6)</span>
                                                </div>
                                                <p class="ps-product-price-block"><span class="ps-product__sale">$6.99</span><span class="ps-product__price">$9.90</span><span class="ps-product__off">25% Off</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-item">
                                        <div class="ps-product--standard"><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/06-SoftDrinks-TeaCoffee/06_3a.jpg" alt="alt" /></a>
                                            <div class="ps-product__content">
                                                <p class="ps-product__type"><i class="icon-store"></i>Sun Farm</p><a href="product-default.html">
                                                    <h5 class="ps-product__name">Kevita Kom Ginger</h5>
                                                </a>
                                                <p class="ps-product__unit">200g</p>
                                                <div class="ps-product__rating">
                                                    <select class="rating-stars">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4" selected="selected">4</option>
                                                        <option value="5">5</option>
                                                    </select><span>(6)</span>
                                                </div>
                                                <p class="ps-product-price-block"><span class="ps-product__sale">$4.90</span><span class="ps-product__price">$3.99</span><span class="ps-product__off">15% Off</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection

