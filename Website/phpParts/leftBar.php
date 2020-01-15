<?$filenameLink = basename($_SERVER['PHP_SELF']);?>

<div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    
                    
                    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <br>
                                <li>
                                    <a href="./home.php" class="<?if($filenameLink=='home.php'){echo'mm-active';}?>">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="./map.php" class="<?if($filenameLink=='map.php'){echo'mm-active';}?>">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        Map
                                    </a>
                                </li>
                                <li>
                                    <a href="./users.php" class="<?if($filenameLink=='users.php'){echo'mm-active';}?>">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        Users
                                    </a>
                                </li>
                          
                                <li>
                                    <a href="./bookings.php" class="<?if($filenameLink=='bookings.php'){echo'mm-active';}?>">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        Bookings
                                    </a>
                                </li>
                                <li>
                                    <a href="./export.php" class="<?if($filenameLink=='export.php'){echo'mm-active';}?>">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        Export Data
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>   