 <script>
     // ? Format Price to Vietnamese Currency
     function formatPrice(price) {
         return price.toLocaleString('it-IT', {
             style: 'currency',
             currency: 'VND'
         });
     }
     // ? Count Cart
     function countCart() {
         $.ajax({
             url: "{{ route('cart.count') }}",
             method: 'GET',
             success: function(response) {
                 $('#count-main-cart').text(response.count);
                 $('.header_qty_cart').text(response.count);
             }
         })
     }
     // ? Count Price Total
     function countPriceTotal() {
         $.ajax({
             url: "{{ route('cart.total') }}",
             method: 'GET',
             success: function(response) {
                 $('.mini_cart_subtotal').text(formatPrice(response.total));
                 $('.sub_total_price').text(formatPrice(response.total));
             }
         })
     }
     // ? Get Sidebar Cart Subtotal
     function fetchSidebarCartProducts() {
         $.ajax({
             method: 'GET',
             url: "{{ route('cart-products') }}",
             success: function(data) {
                 console.log(data);
                 $('.mini_cart_wrapper').html("");
                 var html = '';
                 for (let item in data) {
                     let product = data[item];
                     let price = formatPrice(product.price);
                     html += `
                        <li>
                            <div class="mini_cart_img">
                                <a href="{{ url('product-show') }}/${product.options.slug}">
                                    <img src="{{ asset('/') }}${product.options.image}" alt="">
                                </a>
                                <div data-id="${product.rowId}" class="mini_cart_mini_icon_remove_product" href="">
                                    <i class="fas fa-minus-circle" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="mini_cart_text">
                                <a class="mini_cart_title_anchor" href="">${product.name}</a>
                                <p class="mini_cart_price">${price}</p>
                                <small class="mini_cart_qty">Số Lượng: <span>${product.qty}</span></small>
                            </div>
                        </li>
                        `
                 }

                 $('.mini_cart_wrapper').html(html);

                 getSidebarCartSubtoal();

             },
             error: function(data) {

             }
         })
     }

     // !!! Search product
     $(document).ready(function() {
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
         // ? Search product
         $("#searchproduct").on("keydown", function() {
             if ($('#searchproduct').val().length >= 3) {
                 $.ajax({
                     url: "{{ route('search-products') }}",
                     type: "POST",
                     data: {
                         search: $("#searchproduct").val(),
                     },
                     beforeSend: function() {
                         $('#btnSeachProduct').html(
                             '<i class="fas fa-spinner fa-spin"></i>');
                     },
                     success: function(data) {
                         $(".header_search_items").html("");
                         let products = data['products'];
                         if (products.length > 0) {
                             for (let product in products) {
                                 let item = products[product];
                                 let price = formatPrice(item.price);
                                 $(".header_search_items").append(
                                     `
                                    <div class='header_search_item'>
                                        <a href='{{ url('products-detail') }}/${item.slug}'>
                                            <div class='col-2'>
                                                <img class='header_search_item_img'
                                                    src='{{ url('${item.image}') }}'
                                                    alt=''>
                                            </div>
                                            <div class='col-8'>
                                                <h4 class='header_search_item_name'>${item.name}</h4>
                                            </div>
                                            <div class='col-2'>
                                                <h5 class='header_search_item_price'>${price}</h5>
                                            </div>
                                        </a>
                                    </div>
                                `);
                             }
                         } else {
                             $(".header_search_items").html(
                                 "<h4 class='my-5 text-center'>Không tìm thấy sản phẩm</h4>"
                             );
                         }
                     },
                     error: function(xhr, status, error) {
                         $(".header_search_items").html(
                             "<h4 class='my-5 text-center'>Không tìm thấy sản phẩm</h4>");
                     },
                     complete: function() {
                         $('#btnSeachProduct').html('<i class="fas fa-search"></i>');
                     }
                 });
                 $(".header_search_items").css("display", "block");
             }
         });

         // ? Close search product
         $(document).on("click", function() {
             $(".header_search_items").css("display", "none");
         });

         // ? Delete Mini Cart
         $('body').on('click', '.mini_cart_mini_icon_remove_product', function() {
             let id = $(this).data('id');
             $.ajax({
                 url: "{{ route('cart.delete') }}",
                 method: 'POST',
                 data: {
                     id: id
                 },
                 success: function(response) {
                     fetchSidebarCartProducts();
                     countCart();
                     countPriceTotal();
                 },
                 error: function(xhr, status, error) {
                     console.log(xhr.responseText);
                 }
             })
         })
     });
 </script>
