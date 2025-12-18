 <aside class="app-sidebar sticky" id="sidebar">

     <!-- Start::main-sidebar-header -->
     <div class="main-sidebar-header" style="padding: 0px">
         <a href="index.html" class="header-logo">
             <img style="width: 150px; height:100px; max-height: 100px;"
                 src="{{ asset('frontend/assets/images/Logo-Gamikey-1024x576.png.webp') }}" alt="">
         </a>
     </div>
     <!-- End::main-sidebar-header -->

     <!-- Start::main-sidebar -->
     <div class="main-sidebar" id="sidebar-scroll">

         <!-- Start::nav -->
         <nav class="main-menu-container nav nav-pills flex-column sub-open">
             <div class="slide-left" id="slide-left">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                     viewBox="0 0 24 24">
                     <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                 </svg>
             </div>
             <ul class="main-menu">
                 <!-- Start::slide__category -->
                 <li class="slide__category"><span class="category-name">Main</span></li>
                 <!-- End::slide__category -->

                 <!-- Start::slide__category -->
                 <li class="slide__category"><span class="category-name">Bảng Thống Kế</span></li>
                 <!-- End::slide__category -->
                 <!-- Start::slide -->
                 <li class="slide  {{ setActive(['admin.dashboard']) }}">
                     <a href="{{ route('admin.dashboard') }}"
                         class="side-menu__item  {{ setActive(['admin.dashboard']) }}">
                         <i class="fe fe-home side-menu__icon"></i>
                         <span class="side-menu__label">Bảng Thống Kế</span>
                     </a>
                 </li>
                 <!-- End::slide -->

                 <!-- Start::slide__category -->
                 <li class="slide__category"><span class="category-name">Danh Mục</span></li>
                 <!-- End::slide__category -->

                 <!-- Start::slide -->
                 <li
                     class="slide has-sub {{ setActive(['admin.category.*', 'admin.sub-category.*', 'admin.brand.*', 'admin.tag.*']) }}">
                     <a href="javascript:void(0);"
                         class="side-menu__item {{ setActive(['admin.category.*', 'admin.sub-category.*', 'admin.brand.*', 'admin.tag.*']) }} ">
                         <i class="fe fe-slack side-menu__icon"></i>
                         <span class="side-menu__label">Quản Lý Danh Mục</span>
                         <i class="fe fe-chevron-right side-menu__angle"></i>
                     </a>
                     <ul class="slide-menu child1">
                         <li class="slide">
                             <a href="{{ route('admin.category.index') }}"
                                 class="side-menu__item  {{ setActive(['admin.category.*']) }}">
                                 <i class="fe fe-aperture side-menu__icon"></i>
                                 <span class="side-menu__label">Danh Mục</span>
                             </a>
                         </li>
                         <li class="slide">
                             <a href="{{ route('admin.sub-category.index') }}"
                                 class="side-menu__item {{ setActive(['admin.sub-category.*']) }}">
                                 <i class="fe fe-aperture side-menu__icon"></i>
                                 <span class="side-menu__label">Danh Mục Phụ</span>
                             </a>
                         </li>
                         <li class="slide">
                             <a href="{{ route('admin.brand.index') }}"
                                 class="side-menu__item {{ setActive(['admin.brand.*']) }}">
                                 <i class="fe fe-aperture side-menu__icon"></i>
                                 <span class="side-menu__label">Thương Hiệu</span>
                             </a>
                         </li>
                         <li class="slide">
                             <a href="{{ route('admin.tag.index') }}"
                                 class="side-menu__item {{ setActive(['admin.tag.*']) }}">
                                 <i class="fe fe-aperture side-menu__icon"></i>
                                 <span class="side-menu__label">Nhãn</span>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <!-- End::slide -->

                 <!-- Start::slide__category -->
                 <li class="slide__category"><span class="category-name">Sản Phẩm</span></li>
                 <!-- End::slide__category -->

                 <!-- Start::slide -->
                 <li class="slide has-sub {{ setActive(['admin.product.*', 'admin.coupon.*']) }}">
                     <a href="javascript:void(0);" class="side-menu__item {{ setActive(['admin.product.*']) }} ">
                         <i class="fe fe-slack side-menu__icon"></i>
                         <span class="side-menu__label">Quản Lý Sản Phẩm</span>
                         <i class="fe fe-chevron-right side-menu__angle"></i>
                     </a>
                     <ul class="slide-menu child1">
                         <li class="slide">
                             <a href="{{ route('admin.product.index') }}"
                                 class="side-menu__item  {{ setActive(['admin.product.*']) }}">
                                 <i class="fe fe-aperture side-menu__icon"></i>
                                 <span class="side-menu__label">Sản Phẩm</span>
                             </a>
                         </li>
                         <li class="slide">
                             <a href="{{ route('admin.coupon.index') }}"
                                 class="side-menu__item  {{ setActive(['admin.coupon.*']) }}">
                                 <i class="fe fe-aperture side-menu__icon"></i>
                                 <span class="side-menu__label">Mã Giảm Giá</span>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <!-- End::slide -->

                 <!-- Start::slide__category -->
                 <li class="slide__category"><span class="category-name">Đơn Hàng</span></li>
                 <!-- End::slide__category -->

                 <!-- Start::slide -->
                 <li class="slide has-sub {{ setActive(['admin.order.*', 'admin.pending-order']) }}">
                     <a href="javascript:void(0);"
                         class="side-menu__item {{ setActive(['admin.order.*', 'admin.pending-order']) }} ">
                         <i class="fe fe-slack side-menu__icon"></i>
                         <span class="side-menu__label">Quản Lý Đơn Hàng</span>
                         <i class="fe fe-chevron-right side-menu__angle"></i>
                     </a>
                     <ul class="slide-menu child1">
                         <li class="slide">
                             <a href="{{ route('admin.order.index') }}"
                                 class="side-menu__item  {{ setActive(['admin.order.index', 'admin.order.show']) }}">
                                 <i class="fe fe-aperture side-menu__icon"></i>
                                 <span class="side-menu__label">Tất Cả Đơn Hàng</span>
                             </a>
                         </li>
                         <li class="slide">
                             <a href="{{ route('admin.order.pending-order') }}"
                                 class="side-menu__item  {{ setActive(['admin.order.pending-order']) }}">
                                 <i class="fe fe-aperture side-menu__icon"></i>
                                 <span class="side-menu__label">Đơn Hàng Chờ Xử Lý</span>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <!-- End::slide -->

                 <!-- Start::slide__category -->
                 <li class="slide__category"><span class="category-name">Khách Hàng</span></li>
                 <!-- End::slide__category -->

                 <!-- Start::slide -->
                 <li class="slide has-sub {{ setActive(['admin.user.*']) }}">
                     <a href="javascript:void(0);" class="side-menu__item {{ setActive(['admin.user.*']) }} ">
                         <i class="fe fe-slack side-menu__icon"></i>
                         <span class="side-menu__label">Quản Lý Người Dùng</span>
                         <i class="fe fe-chevron-right side-menu__angle"></i>
                     </a>
                     <ul class="slide-menu child1">
                         <li class="slide">
                             <a href="{{ route('admin.user.index') }}"
                                 class="side-menu__item  {{ setActive(['admin.user.index']) }}">
                                 <i class="fe fe-aperture side-menu__icon"></i>
                                 <span class="side-menu__label">Tất Cả Khách Hàng</span>
                             </a>
                         </li>
                         <li class="slide">
                             <a href="{{ route('admin.user.soft-delete') }}"
                                 class="side-menu__item  {{ setActive(['admin.user.soft-delete']) }}">
                                 <i class="fe fe-aperture side-menu__icon"></i>
                                 <span class="side-menu__label">Khách Hàng Tạm Xóa</span>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <!-- End::slide -->

                 <!-- Start::slide__category -->
                 <li class="slide__category"><span class="category-name">Bình Luận</span></li>
                 <!-- End::slide__category -->

                 <!-- Start::slide -->
                 <li class="slide has-sub {{ setActive(['admin.comment.index', 'admin.comment.reply']) }}">
                     <a href="javascript:void(0);"
                         class="side-menu__item {{ setActive(['admin.comment.index', 'admin.comment.reply']) }} ">
                         <i class="fe fe-slack side-menu__icon"></i>
                         <span class="side-menu__label">Quản Lý Bình Luận</span>
                         <i class="fe fe-chevron-right side-menu__angle"></i>
                     </a>
                     <ul class="slide-menu child1">
                         <li class="slide">
                             <a href="{{ route('admin.comment.index') }}"
                                 class="side-menu__item  {{ setActive(['admin.comment.index']) }}">
                                 <i class="fe fe-aperture side-menu__icon"></i>
                                 <span class="side-menu__label">Tất Cả Bình luận</span>
                             </a>
                         </li>
                         <li class="slide">
                             <a href="{{ route('admin.comment.reply') }}"
                                 class="side-menu__item {{ setActive(['admin.comment.reply']) }}">
                                 <i class="fe fe-aperture side-menu__icon"></i>
                                 <span class="side-menu__label">Trả Lời Bình Luận</span>
                             </a>
                         </li>
                         <li class="slide">
                             <a href="{{ route('admin.brand.index') }}"
                                 class="side-menu__item {{ setActive(['admin.brand.*']) }}">
                                 <i class="fe fe-aperture side-menu__icon"></i>
                                 <span class="side-menu__label">Bình Luận Ẩn</span>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <!-- End::slide -->

                 <!-- Start::slide__category -->
                 <li class="slide__category"><span class="category-name">Cài Đặt</span></li>
                 <!-- End::slide__category -->

                 <!-- Start::slide -->
                 <li class="slide has-sub {{ setActive(['admin.payment-setting.*']) }}">
                     <a href="javascript:void(0);" class="side-menu__item">
                         <i class="fe fe-slack side-menu__icon"></i>
                         <span class="side-menu__label">Cài Đặt</span>
                         <i class="fe fe-chevron-right side-menu__angle"></i>
                     </a>
                     <ul class="slide-menu child1">
                         <li class="slide">
                             <a href="{{ route('admin.payment-setting.index') }}"
                                 class="side-menu__item {{ setActive(['admin.payment-setting.*']) }}">
                                 <i class="fe fe-aperture side-menu__icon"></i>
                                 <span class="side-menu__label">Cài Đặt Thanh Toán</span>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <!-- End::slide -->
             </ul>
             <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                     width="24" height="24" viewBox="0 0 24 24">
                     <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                 </svg></div>
         </nav>
         <!-- End::nav -->

     </div>
     <!-- End::main-sidebar -->

 </aside>
