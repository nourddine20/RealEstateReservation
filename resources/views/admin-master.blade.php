<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Les Roches De Benslimane">
    <meta name="author" content="Les Roches De Benslimane">
    <meta name="keywords" content="lot terrain R+4, Villa , Immeuble , Immobilier">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontside/assets/images/favicon.ico')}}" />

    <!-- TITLE -->
    <title>Les Roches De Benslimane</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{asset('clientside/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <link href="{{asset('clientside\assets\css\toast.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.css" integrity="sha512-jQG1E/4m1U5KloaLuKODuYwGFW8HC4MdH9E9IjkRDjqUuFD0RJ/InBSPCWkVx/K2pQD4kPcD12xXVWbNOmmivQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- <link rel="stylesheet" href="{{asset('clientside\assets\css\tagsmanager.css')}}" integrity="sha512-jQG1E/4m1U5KloaLuKODuYwGFW8HC4MdH9E9IjkRDjqUuFD0RJ/InBSPCWkVx/K2pQD4kPcD12xXVWbNOmmivQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.14.0/css/selectize.bootstrap4.css" integrity="sha512-PwfVn33vwl4Z3lsd5n8e1Zjh0pA82jVLdKYvufhlmV/LiXuxNIlDjUIK8YIOzGM8l6hscvQz3uaq3DVZII/LTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


    <!-- STYLE CSS -->
    <link href="{{asset('clientside/assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('clientside/assets/css/dark-style.css')}}" rel="stylesheet" />
    <link href="{{asset('clientside/assets/css/transparent-style.css')}}" rel="stylesheet">
    <link href="{{asset('clientside/assets/css/skin-modes.css')}}" rel="stylesheet" />


    <!--- FONT-ICONS CSS -->
    <link href="{{asset('clientside/assets/css/icons.css')}}" rel="stylesheet" />

      <!-- INTERNAL Switcher css -->
      <link href="{{asset('clientside/assets/switcher/css/switcher.css')}}" rel="stylesheet" />
    <link href="{{asset('clientside/assets/switcher/demo.css')}}" rel="stylesheet" />

     <!-- Froala Editor Stylesheet-->
     <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />


    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('clientside/assets/colors/color1.css')}}" />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

</head>

<!-- <script src="{{asset('clientside\assets\js\ajax.jquery.min.js')}}" integrity="sha512-suUtSPkqYmFd5Ls30Nz6bjDX+TCcfEzhFfqjijfdggsaFZoylvTj+2odBzshs0TCwYrYZhQeCgHgJEkncb2YVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

<script src="{{asset('clientside\assets\js\toast.min.js')}}"></script>



<body class="app sidebar-mini ltr">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
   <div class="dimmer loader-img active">
                                            <div class="spinner" ></div>
                                        </div>
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
            <div class="app-header header sticky">
                <div class="container-fluid main-container">
                    <div class="d-flex">
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0)"></a>
                        <!-- sidebar-toggle-->
                        <a class="logo-horizontal " href="index.html">
                            <img src="{{asset('clientside/assets/images/brand/logo.png')}}" class="header-brand-img desktop-logo" alt="logo">
                            <img src="{{asset('clientside/assets/images/brand/logo-3.png')}}" class="header-brand-img light-logo1"
                                alt="logo">
                        </a>
                        <!-- LOGO -->
                        <div class="main-header-center ms-3 d-none d-lg-block">

                        </div>
                        <div class="d-flex order-lg-2 ms-auto header-right-icons">
                            <div class="dropdown d-none">

                                <div class="dropdown-menu header-search dropdown-menu-start">
                                    <div class="input-group w-100 p-2">

                                    </div>
                                </div>
                            </div>
                            <!-- SEARCH -->
                            <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                                aria-controls="navbarSupportedContent-4" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                            </button>
                            <div class="navbar navbar-collapse responsive-navbar p-0">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                                    <div class="d-flex order-lg-2">
                                        <div class="dropdown d-lg-none d-flex">
                                            <a href="javascript:void(0)" class="nav-link icon" data-bs-toggle="dropdown">
                                                <i class="fe fe-search"></i>
                                            </a>
                                            <div class="dropdown-menu header-search dropdown-menu-start">
                                                <div class="input-group w-100 p-2">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex country">

                                        </div>
                                        <!-- COUNTRY -->
                                        <div class="d-flex country">
                                            <a class="nav-link icon theme-layout nav-link-bg layout-setting">
                                                <span class="dark-layout"><i class="fe fe-moon"></i></span>
                                                <span class="light-layout"><i class="fe fe-sun"></i></span>
                                            </a>
                                        </div>
                                        <!-- Theme-Layout -->
                                        <div class="dropdown  d-flex shopping-cart">

                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <div class="drop-heading border-bottom">
                                                    <div class="d-flex">
                                                        <h6 class="mt-1 mb-0 fs-16 fw-semibold text-dark"> My Shopping Cart</h6>
                                                        <div class="ms-auto">
                                                            <span class="badge bg-danger-transparent header-badge text-danger fs-14">Hurry Up!</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="header-dropdown-list message-menu">
                                                    <div class="dropdown-item d-flex p-4">
                                                        <a href="cart.html" class="open-file"></a>
                                                        <span
                                                            class="avatar avatar-xl br-5 me-3 align-self-center cover-image"
                                                            data-bs-image-src="{{asset('clientside/assets/images/pngs/4.jpg')}}"></span>
                                                        <div class="wd-50p">
                                                            <h5 class="mb-1">Flower Pot for Home Decor</h5>
                                                            <span>Status: <span class="text-success">In Stock</span></span>
                                                            <p class="fs-13 text-muted mb-0">Quantity: 01</p>
                                                        </div>
                                                        <div class="ms-auto text-end d-flex fs-16">
                                                            <span class="fs-16 text-dark d-none d-sm-block px-4">
                                                                $438
                                                            </span>
                                                            <a href="javascript:void(0)" class="fs-16 btn p-0 cart-trash">
                                                                <i class="fe fe-trash-2 border text-danger brround d-block p-2"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-item d-flex p-4">
                                                        <a href="cart.html" class="open-file"></a>
                                                        <span
                                                            class="avatar avatar-xl br-5 me-3 align-self-center cover-image"
                                                            data-bs-image-src="{{asset('clientside/assets/images/pngs/6.jpg')}}"></span>
                                                        <div class="wd-50p">
                                                            <h5 class="mb-1">Black Digital Camera</h5>
                                                            <span>Status: <span class="text-danger">Out Stock</span></span>
                                                            <p class="fs-13 text-muted mb-0">Quantity: 06</p>
                                                        </div>
                                                        <div class="ms-auto text-end d-flex">
                                                            <span class="fs-16 text-dark d-none d-sm-block px-4">
                                                                $867
                                                            </span>
                                                            <a href="javascript:void(0)" class="fs-16 btn p-0 cart-trash">
                                                                <i class="fe fe-trash-2 border text-danger brround d-block p-2"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-item d-flex p-4">
                                                        <a href="cart.html" class="open-file"></a>
                                                        <span
                                                            class="avatar avatar-xl br-5 me-3 align-self-center cover-image"
                                                            data-bs-image-src="{{asset('clientside/assets/images/pngs/8.jpg')}}"></span>
                                                        <div class="wd-50p">
                                                            <h5 class="mb-1">Stylish Rockerz 255 Ear Pods</h5>
                                                            <span>Status: <span class="text-success">In Stock</span></span>
                                                            <p class="fs-13 text-muted mb-0">Quantity: 05</p>
                                                        </div>
                                                        <div class="ms-auto text-end d-flex">
                                                            <span class="fs-16 text-dark d-none d-sm-block px-4">
                                                                $323
                                                            </span>
                                                            <a href="javascript:void(0)" class="fs-16 btn p-0 cart-trash">
                                                                <i class="fe fe-trash-2 border text-danger brround d-block p-2"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-item d-flex p-4">
                                                        <a href="cart.html" class="open-file"></a>
                                                        <span
                                                            class="avatar avatar-xl br-5 me-3 align-self-center cover-image"
                                                            data-bs-image-src="{{asset('clientside/assets/images/pngs/1.jpg')}}"></span>
                                                        <div class="wd-50p">
                                                            <h5 class="mb-1">Women Party Wear Dress</h5>
                                                            <span>Status: <span class="text-success">In Stock</span></span>
                                                            <p class="fs-13 text-muted mb-0">Quantity: 05</p>
                                                        </div>
                                                        <div class="ms-auto text-end d-flex">
                                                            <span class="fs-16 text-dark d-none d-sm-block px-4">
                                                                $867
                                                            </span>
                                                            <a href="javascript:void(0)" class="fs-16 btn p-0 cart-trash">
                                                                <i class="fe fe-trash-2 border text-danger brround d-block p-2"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-item d-flex p-4">
                                                        <a href="cart.html" class="open-file"></a>
                                                        <span
                                                            class="avatar avatar-xl br-5 me-3 align-self-center cover-image"
                                                            data-bs-image-src="{{asset('clientside/assets/images/pngs/3.jpg')}}"></span>
                                                        <div class="wd-50p">
                                                            <h5 class="mb-1">Running Shoes for men</h5>
                                                            <span>Status: <span class="text-success">In Stock</span></span>
                                                            <p class="fs-13 text-muted mb-0">Quantity: 05</p>
                                                        </div>
                                                        <div class="ms-auto text-end d-flex">
                                                            <span class="fs-16 text-dark d-none d-sm-block px-4">
                                                                $456
                                                            </span>
                                                            <a href="javascript:void(0)" class="fs-16 btn p-0 cart-trash">
                                                                <i class="fe fe-trash-2 border text-danger brround d-block p-2"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dropdown-divider m-0"></div>
                                                <div class="dropdown-footer">
                                                    <a class="btn btn-primary btn-pill w-sm btn-sm py-2" href="checkout.html"><i class="fe fe-check-circle"></i> Checkout</a>
                                                    <span class="float-end p-2 fs-17 fw-semibold">Total: $6789</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- CART -->
                                        <div class="dropdown d-flex">
                                            <a class="nav-link icon full-screen-link nav-link-bg">
                                                <i class="fe fe-minimize fullscreen-button"></i>
                                            </a>
                                        </div>
                                        <!-- FULL-SCREEN -->
                                        <div class="dropdown  d-flex notifications">

                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <div class="drop-heading border-bottom">

                                                </div>
                                                <div class="notifications-menu">
                                                    <a class="dropdown-item d-flex" href="notify-list.html">

                                                        <div class="mt-1 wd-80p">
                                                            <h5 class="notification-label mb-1">New Application received
                                                            </h5>
                                                            <span class="notification-subtext">3 days ago</span>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item d-flex" href="notify-list.html">
                                                        <div class="me-3 notifyimg  bg-secondary brround box-shadow-secondary">
                                                            <i class="fe fe-check-circle"></i>
                                                        </div>
                                                        <div class="mt-1 wd-80p">
                                                            <h5 class="notification-label mb-1">Project has been
                                                                approved</h5>
                                                            <span class="notification-subtext">2 hours ago</span>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item d-flex" href="notify-list.html">
                                                        <div class="me-3 notifyimg  bg-success brround box-shadow-success">
                                                            <i class="fe fe-shopping-cart"></i>
                                                        </div>
                                                        <div class="mt-1 wd-80p">
                                                            <h5 class="notification-label mb-1">Your Product Delivered
                                                            </h5>
                                                            <span class="notification-subtext">30 min ago</span>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item d-flex" href="notify-list.html">
                                                        <div class="me-3 notifyimg bg-pink brround box-shadow-pink">
                                                            <i class="fe fe-user-plus"></i>
                                                        </div>
                                                        <div class="mt-1 wd-80p">
                                                            <h5 class="notification-label mb-1">Friend Requests</h5>
                                                            <span class="notification-subtext">1 day ago</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="dropdown-divider m-0"></div>
                                                <a href="notify-list.html"
                                                    class="dropdown-item text-center p-3 text-muted">View all
                                                    Notification</a>
                                            </div>
                                        </div>
                                        <!-- NOTIFICATIONS -->
                                        <div class="dropdown  d-flex message">

                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <div class="drop-heading border-bottom">
                                                    <div class="d-flex">
                                                        <h6 class="mt-1 mb-0 fs-16 fw-semibold text-dark">You have 5
                                                            Messages</h6>
                                                        <div class="ms-auto">
                                                            <a href="javascript:void(0)" class="text-muted p-0 fs-12">make all unread</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="message-menu message-menu-scroll">
                                                    <a class="dropdown-item d-flex" href="chat.html">
                                                        <span
                                                            class="avatar avatar-md brround me-3 align-self-center cover-image"
                                                            data-bs-image-src="{{asset('clientside/assets/images/users/1.jpg')}}"></span>
                                                        <div class="wd-90p">
                                                            <div class="d-flex">
                                                                <h5 class="mb-1">Peter Theil</h5>
                                                                <small class="text-muted ms-auto text-end">
                                                                    6:45 am
                                                                </small>
                                                            </div>
                                                            <span>Commented on file Guest list....</span>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item d-flex" href="chat.html">
                                                        <span
                                                            class="avatar avatar-md brround me-3 align-self-center cover-image"
                                                            data-bs-image-src="{{asset('clientside/assets/images/users/15.jpg')}}"></span>
                                                        <div class="wd-90p">
                                                            <div class="d-flex">
                                                                <h5 class="mb-1">Abagael Luth</h5>
                                                                <small class="text-muted ms-auto text-end">
                                                                    10:35 am
                                                                </small>
                                                            </div>
                                                            <span>New Meetup Started......</span>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item d-flex" href="chat.html">
                                                        <span
                                                            class="avatar avatar-md brround me-3 align-self-center cover-image"
                                                            data-bs-image-src="{{asset('clientside/assets/images/users/12.jpg')}}"></span>
                                                        <div class="wd-90p">
                                                            <div class="d-flex">
                                                                <h5 class="mb-1">Brizid Dawson</h5>
                                                                <small class="text-muted ms-auto text-end">
                                                                    2:17 pm
                                                                </small>
                                                            </div>
                                                            <span>Brizid is in the Warehouse...</span>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item d-flex" href="chat.html">
                                                        <span
                                                            class="avatar avatar-md brround me-3 align-self-center cover-image"
                                                            data-bs-image-src="{{asset('clientside/assets/images/users/4.jpg')}}"></span>
                                                        <div class="wd-90p">
                                                            <div class="d-flex">
                                                                <h5 class="mb-1">Shannon Shaw</h5>
                                                                <small class="text-muted ms-auto text-end">
                                                                    7:55 pm
                                                                </small>
                                                            </div>
                                                            <span>New Product Realease......</span>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item d-flex" href="chat.html">
                                                        <span
                                                            class="avatar avatar-md brround me-3 align-self-center cover-image"
                                                            data-bs-image-src="{{asset('clientside/assets/images/users/3.jpg')}}"></span>
                                                        <div class="wd-90p">
                                                            <div class="d-flex">
                                                                <h5 class="mb-1">Cherry Blossom</h5>
                                                                <small class="text-muted ms-auto text-end">
                                                                    7:55 pm
                                                                </small>
                                                            </div>
                                                            <span>You have appointment on......</span>
                                                        </div>
                                                    </a>

                                                </div>
                                                <div class="dropdown-divider m-0"></div>
                                                <a href="javascript:void(0)" class="dropdown-item text-center p-3 text-muted">See all
                                                    Messages</a>
                                            </div>
                                        </div>
                                        <!-- MESSAGE-BOX -->
                                        <div class="dropdown d-flex header-settings">

                                        </div>
                                        <!-- SIDE-MENU -->
                                        <div class="dropdown d-flex profile-1">

                                            <a href="javascript:void(0)" data-bs-toggle="dropdown" class="nav-link leading-none d-flex">
                                                <img src="{{asset('clientside/assets/images/users/21.jpg')}}" alt="profile-user"
                                                    class="avatar  profile-user brround cover-image">
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <div class="drop-heading">
                                                    <div class="text-center">


                                                  @if(Auth::guard('web')->check() == true && Auth::guard('web')->user() == Auth::user())

                                                        <h5 class="text-dark mb-0 fs-14 fw-semibold">{{ Auth::guard('web')->user()->name}}</h5>
                                                        <small class="text-muted">{{Auth::guard('web')->user()->role->role_name}}  </small>




                                                    @endif
                                                    </div>
                                                </div>
                                                <div class="dropdown-divider m-0"></div>


                                                @if(Auth::guard('web')->check() == true && Auth::guard('web')->user() == Auth::user())


                                                @endif



                                                <form method="post" action="{{route('admin.logout')}}">
                                                    @csrf
                                                <button type="submit" class="dropdown-item" >
                                                    <i class="dropdown-icon fe fe-alert-circle"></i> Sign out
                                                </button>
                                                </form>

                                            </div>
                                        </div>

                                        <!-- <div class="demo-icon nav-link icon" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"> <i class="fe fe-settings fa-spin  text_primary"></i> </div> -->

                                                 <!-- <button class="btn btn-primary off-canvas" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Toggle right offcanvas</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /app-Header -->

        @include('body.sidebar')


        @yield('content')

        </div>



        @include('body.sidebar-right')

        <!-- Country-selector modal-->
        <div class="modal fade" id="country-selector">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content country-select-modal">
                    <div class="modal-header">
                        <h6 class="modal-title">Choose Country</h6><button aria-label="Close" class="btn-close"
                            data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <ul class="row p-3">
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block active">
                                    <span class="country-selector"><img alt="" src="{{asset('clientside/assets/images/flags/us_flag.jpg')}}"
                                            class="me-3 language"></span>USA
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                        src="{{asset('clientside/assets/images/flags/italy_flag.jpg')}}"
                                        class="me-3 language"></span>Italy
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                        src="{{asset('clientside/assets/images/flags/spain_flag.jpg')}}"
                                        class="me-3 language"></span>Spain
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                        src="{{asset('clientside/assets/images/flags/india_flag.jpg')}}"
                                        class="me-3 language"></span>India
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                        src="{{asset('clientside/assets/images/flags/french_flag.jpg')}}"
                                        class="me-3 language"></span>French
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                        src="{{asset('clientside/assets/images/flags/russia_flag.jpg')}}"
                                        class="me-3 language"></span>Russia
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                        src="{{asset('clientside/assets/images/flags/germany_flag.jpg')}}"
                                        class="me-3 language"></span>Germany
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                        src="{{asset('clientside/assets/images/flags/argentina.jpg')}}"
                                        class="me-3 language"></span>Argentina
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt="" src="{{asset('clientside/assets/images/flags/malaysia.jpg')}}"
                                        class="me-3 language"></span>Malaysia
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt="" src="{{asset('clientside/assets/images/flags/turkey.jpg')}}"
                                        class="me-3 language"></span>Turkey
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Country-selector modal-->

<!--- switcher ---->

<!--- end switcher ---->

  <!--Right Offcanvas-->

        <!--/Right Offcanvas-->


        <!-- FOOTER -->
        <footer class="footer">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-md-12 col-sm-12 text-center">
                        Copyright © <span id="year"></span> <a href="javascript:void(0)">Les Roches De Benslimane</a>. Designed with <span class="fa fa-heart text-danger"></span> by <a href="https://jokesigner.com"> Jokesigner SARL </a> All rights reserved.
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER CLOSED -->
    </div>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="{{asset('clientside/assets/js/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.js" integrity="sha512-HiJMeObPjMYvMcA0jvYKyRPFz75sq+YsOJb8HW+RxMiXgWQlgdLd5sNqb16LcyqLCiWNfNeh/QZoi9kzr4d6ng==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="{{asset('clientside\assets\plugins\tagsmanger\jquery.tagsmanager.min.js')}}" integrity="sha512-HiJMeObPjMYvMcA0jvYKyRPFz75sq+YsOJb8HW+RxMiXgWQlgdLd5sNqb16LcyqLCiWNfNeh/QZoi9kzr4d6ng==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

    <!-- BOOTSTRAP JS -->
    <script src="{{asset('clientside/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('clientside/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

     <!-- daterange JS -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <!-- INPUT MASK JS-->
    <script src="{{asset('clientside/assets/plugins/input-mask/jquery.mask.min.js')}}"></script>

    <!-- SIDE-MENU JS -->
    <script src="{{asset('clientside/assets/plugins/sidemenu/sidemenu.js')}}"></script>

	<!-- TypeHead js -->
	<script src="{{asset('clientside/assets/plugins/bootstrap5-typehead/autocomplete.js')}}"></script>
    <script src="{{asset('clientside/assets/js/typehead.js')}}"></script>

          <!-- INTERNAL SELECT2 JS -->
          <script src="{{asset('clientside/assets/plugins/select3/select3.full.min.js')}}"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="{{asset('clientside/assets/plugins/select2/select2.full.min.js')}}"></script>



    <!-- DATA TABLE JS-->
    <script src="{{asset('clientside/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('clientside/assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('clientside/assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('clientside/assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{asset('clientside/assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{asset('clientside/assets/plugins/datatable/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('clientside/assets/plugins/datatable/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('clientside/assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('clientside/assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('clientside/assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('clientside/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('clientside/assets/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>
    <script src="{{asset('clientside/assets/js/table-data.js')}}"></script>

    <!-- SIDEBAR JS -->
    <script src="{{asset('clientside/assets/plugins/sidebar/sidebar.js')}}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{asset('clientside/assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('clientside/assets/plugins/p-scroll/pscroll.js')}}"></script>
    <script src="{{asset('clientside/assets/plugins/p-scroll/pscroll-1.js')}}"></script>

    <!-- Color Theme js -->
    <script src="{{asset('clientside/assets/js/themeColors.js')}}"></script>

    <!-- Sticky js -->
    <script src="{{asset('clientside/assets/js/sticky.js')}}"></script>


     <!-- MULTI SELECT JS-->
    <script src="{{asset('clientside/assets/plugins/multipleselect/multiple-select.js')}}"></script>
    <script src="{{asset('clientside/assets/plugins/multipleselect/multi-select.js')}}"></script>

    <!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


    <!-- INTERNAL SELECT2 JS -->

    <script src="{{asset('clientside/assets/js/select3.js')}}"></script>
    <script src="{{asset('clientside/assets/js/select2.js')}}"></script>

      <!-- Switcher js -->
      <script src="{{asset('clientside/assets/switcher/js/switcher.js')}}"></script>



       <!-- CUSTOM JS -->
    <script src="{{asset('clientside/assets/js/custom1.js')}}"></script>

      <!-- CUSTOM JS -->
    <script src="{{asset('clientside/assets/js/custom.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.14.0/js/selectize.min.js" integrity="sha512-VReIIr1tJEzBye8Elk8Dw/B2dAUZFRfxnV2wbpJ0qOvk57xupH+bZRVHVngdV04WVrjaMeR1HfYlMLCiFENoKw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- FORM WIZARD JS-->
<script src="{{asset('clientside/assets/plugins/formwizard/jquery.smartWizard.js')}}"></script>
<script src="{{asset('clientside/assets/plugins/formwizard/fromwizard.js')}}"></script>

<!-- INTERNAl Jquery.steps js -->
<script src="{{asset('clientside/assets/plugins/jquery-steps/jquery.steps.min.js')}}"></script>
<script src="{{asset('clientside/assets/plugins/parsleyjs/parsley.min.js')}}"></script>

   <!-- CHARTJS JS -->
      <script src="{{asset('clientside/assets/plugins/chart/Chart.bundle.js')}}"></script>

     <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>

    <!-- INTERNAL INDEX JS -->
    <script src="{{asset('clientside/assets/js/index1.js')}}"></script>

    <!-- INTERNAL ion.rangeSlider.min js -->
    <script src="{{asset('clientside/assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <script src="{{asset('clientside/assets/js/rangeslider.js')}}"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="{{asset('clientside/assets/js/circle-progress.min.js')}}"></script>

<!-- INTERNAL Accordion-Wizard-Form js-->
<script src="{{asset('clientside/assets/plugins/accordion-Wizard-Form/jquery.accordion-wizard.min.js')}}"></script>
<script src="{{asset('clientside/assets/js/form-wizard.js')}}"></script>

<!-- FILE UPLOADES JS -->
<script src="{{asset('clientside/assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{asset('clientside/assets/plugins/fileuploads/js/file-upload.js')}}"></script>

  <!-- INTERNAL WYSIWYG Editor JS -->
  <script src="{{asset('clientside/assets/plugins/wysiwyag/jquery.richtext.js')}} "></script>
    <script src="{{asset('clientside/assets/plugins/wysiwyag/wysiwyag.js')}} "></script>


    <!-- INTERNAL SUMMERNOTE Editor JS -->
    <script src="{{asset('clientside/assets/plugins/summernote/summernote1.js')}}"></script>
    <script src="{{asset('clientside/assets/js/summernote.js')}}"></script>

    <!-- INTERNAL FORMEDITOR JS -->
    <script src="{{asset('clientside/assets/plugins/quill/quill.min.js')}}"></script>
    <script src="{{asset('clientside/assets/js/form-editor2.js')}}"></script>

    <!-- Froala Editor JS-->
    <script src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js"></script>
    <script src="{{asset('clientside/assets/js/froala.js')}}"></script>


        <!-- SHOW PASSWORD JS -->
        <script src="{{asset('clientside/assets/js/show-password.min.js')}}"></script>

<!-- GENERATE OTP JS -->
<script src="{{asset('clientside/assets/js/generate-otp.js')}}"></script>




<!-- INTERNAL File-Uploads Js-->
<script src="{{asset('clientside/assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
<script src="{{asset('clientside/assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
<script src="{{asset('clientside/assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
<script src="{{asset('clientside/assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
<script src="{{asset('clientside/assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
<script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.13/js/dataTables.checkboxes.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>


<!-- <script src="{{asset('clientside/assets/plugins/datatable/datatable.checkboxes.min.js')}}"></script> -->
    <!-- CUSTOM JS -->
    <script src="{{asset('clientside/assets/js/custom.js')}}"></script>


<script>






  $(document).ready(function(){


    $('.mybtnchangestatus').on('click',function(){

      clientid = $(this).data("id");
console.log(clientid)
      status = $('.mybtnchangestatus').attr('name');

      funchangestatusclient(clientid,status)



    });








  });


</script>





</body>

</html>
