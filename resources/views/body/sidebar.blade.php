    <!--APP-SIDEBAR-->
    <div class="sticky">
                <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                <div class="app-sidebar">
                    <div class="side-header">
                        <a class="header-brand1" href="index.html">
                            <img src="{{asset('clientside/assets/images/brand/logo.png')}}" class="header-brand-img desktop-logo" alt="logo">
                            <img src="{{asset('clientside/assets/images/brand/logo-1.png')}}" class="header-brand-img toggle-logo" alt="logo">
                            <img src="{{asset('clientside/assets/images/brand/logo-2.png')}}" class="header-brand-img light-logo" alt="logo">
                            <img src="{{asset('clientside/assets/images/brand/logo-3.png')}}" class="header-brand-img light-logo1" alt="logo">
                        </a>
                        <!-- LOGO -->
                    </div>
                    <div class="main-sidemenu">
                        <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"/></svg></div>
                        <ul class="side-menu">
                            <li class="sub-category">
                                <h3>Menu</h3>
                            </li>
                            <li class="slide">



                               @if(Auth::guard('web')->user() == Auth::user())
                                <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('admin.home')}}">
                                <i class="side-menu__icon fa fa-line-chart"></i>
                                <span class="side-menu__label">Tableau de bord</span>
                                </a>
                                @endif


                            </li>

                    @if(Auth::guard('web')->user()->role->role_name != "INVESTISSEUR")

                    @if(Auth::guard('web')->user()->role->role_name != 'COMMERCIAL')
                    <li class="sub-category">
                                <h3>Gestion</h3>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide"><i class="side-menu__icon fa fa-wpforms"></i><span class="side-menu__label">Réservations</span><i class="angle fe fe-chevron-right"></i></a>
                                <ul class="slide-menu">

                                    <li><a  href="{{route('all.reservations')}}" class="slide-item">List  réservation</a></li>
                                    <li><a  href="{{route('createnew.reservation')}}" class="slide-item">Création réservation</a></li>



                                    <li><a  href="{{route('all.reservstatus')}}" class="slide-item">Status</a></li>


                                </ul>
                            </li>

                        @endif

                              <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                        class="side-menu__icon fa fa-object-group"></i><span
                                        class="side-menu__label">Les Lots</span><i
                                        class="angle fe fe-chevron-right"></i></a>
                                <ul class="slide-menu mega-slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Bootstrap</a></li>
                                    <div class="mega-menu">
                                        <div class="">
                                            <ul>
                                                <li><a href="{{route('all.lots')}}" class="slide-item">List Lots</a></li>

                                                @if(Auth::guard('web')->user()->role->role_name != 'COMMERCIAL')
                                                <li></li>
                                                <li><a href="{{route('all.ilos')}}" class="slide-item">iLots</a></li>
                                                <li><a href="{{route('all.tranches')}}" class="slide-item">Tranche</a></li>
                                                <li><a href="{{route('all.types')}}" class="slide-item">Types</a></li>
                                                <!-- <li><a href="#" class="slide-item"> Nouveau Clients</a></li> -->
                                               @endif
                                            </ul>
                                        </div>

                                    </div>
                                </ul>
                                 </li>

                       @if(Auth::guard('web')->user()->role->role_name != 'COMMERCIAL')
                                 <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide"><i class="side-menu__icon fa fa-user-plus"></i><span class="side-menu__label">Clients</span><i class="angle fe fe-chevron-right"></i></a>
                                <ul class="slide-menu">

                                    <li><a  href="{{route('all.clients')}}" class="slide-item">List  Clients</a></li>


                                </ul>
                            </li>



                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide"><i class="side-menu__icon fa fa-user"></i><span class="side-menu__label">Commercial</span><i class="angle fe fe-chevron-right"></i></a>
                                <ul class="slide-menu">

                                    <li><a  href="{{route('all.commercials')}}" class="slide-item">List  Commercial</a></li>


                                </ul>
                            </li>



                            <li class="sub-category">
                                <h3>Réglages</h3>
                            </li>

                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide"><i class="side-menu__icon fa fa-list-ul"></i><span class="side-menu__label">Demandes</span><i class="angle fe fe-chevron-right"></i></a>
                                <ul class="slide-menu">

                                    <li><a  href="{{route('all.demandes')}}" class="slide-item">List  Demandes</a></li>
                                    <li><a  href="{{route('all.demandestatus')}}" class="slide-item">Status</a></li>


                                </ul>
                            </li>





                              <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                        class="side-menu__icon fa fa-cogs"></i><span
                                        class="side-menu__label">Paramètres</span><i
                                        class="angle fe fe-chevron-right"></i></a>
                                <ul class="slide-menu mega-slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Bootstrap</a></li>
                                    <div class="mega-menu">
                                        <div class="">
                                            <ul>
                                            @if(Auth::guard('web')->user()->role->role_name == "ADMIN")
                                                <li><a href="{{route('all.members')}}" class="slide-item">Utilisateurs</a></li>
                                            @endif

                                            </ul>
                                        </div>

                                    </div>
                                </ul>
                                 </li>


                        @endif





                            <!-- <li class="sub-category">
                                <h3>General</h3>
                            </li> -->

                    @endif



                        </ul>
                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/></svg></div>
                    </div>
                </div>
                <!--/APP-SIDEBAR-->
            </div>
