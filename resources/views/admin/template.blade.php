<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin | @yield('title')</title>

	<!-- css -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('mystyle/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('mystyle/css/landingstyle.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('owlCarousel/docs/assets/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('owlCarousel/docs/assets/owlcarousel/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome/css/all.min.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <header class="fixed fixed-top">
        <div class="bg-landingprimary topbar text-landinglight">
            <div class="container pt-1 pb-1">
                <div>
                    <div class="float-start col-lg-6 col-md-6 col-12 text-lg-start text-md-start text-center">
                        <a href="/" class="text-landinglight ms-1"><i class="fas fa-home"></i> Beranda</a>
                    </div>
                    <div class="clearfix d-lg-none d-md-none"></div>
                    <hr class="pembatas mt-1 d-lg-none d-md-none">
                    <div class="float-start col-lg-6 col-md-6 col-12 text-lg-end text-md-end text-center">
                        @foreach($userdata as $user)
                        <a href="/profil" class="text-landinglight ms-2"><i class="fas fa-user-circle me-1"></i> {{$user->nama}}</a>
                        @endforeach
                        <a href="/logout" class="text-landinglight ms-2 d-lg-block d-md-block d-none"><i class="fas fa-right-from-bracket me-1"></i> Logout</a>
                    </div>
                    <div class="clearfix d-lg-none d-md-none"></div>
                    <hr class="pembatas mt-1 d-lg-none d-md-none">
                    <div class="float-start col-lg-6 col-md-6 col-12 text-lg-end text-md-end text-center d-lg-none d-md-none">
                        <a href="/logout" class="text-landinglight ms-2"><i class="fas fa-right-from-bracket me-1"></i> Logout</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </header>
    <style type="text/css">
        .sidebar.on{
            min-height: 100vh;
            width: 260px;
            animation: offSide .5s 1;
        }
        .sidebar.off{
            min-height: 100vh;
            width: 0px;
            animation: onSide .5s 1;
        }
        .sidebar.off div{
            display: none;
            transition: 1s;
        }
        .content-admin.on{
            width: calc(100% - 260px);
            animation: textoffSide .5s 1;
            margin-left: 260px;
        }
        .content-admin.off{
            width: 100%;
            animation: textSide .5s 1;
            margin-left: 0px;
        }

        @keyframes onSide{
            from{
                width: 260px;
            } to{
                width: 0;
            }
        }
        @keyframes offSide{
            from{
                width: 0;
            } to{
                width: 260px;
            }
        }
        @keyframes textSide{
            from{
                margin-left: 260px;
            } to{
                margin-left: 0;
            }
        }
        @keyframes textoffSide{
            from{
                margin-left: 0;
            } to{
                margin-left: 260px;
            }
        }
        .togle{
            position: fixed;
            top: 1px;
            left: 1px;
            z-index: 10000;
        }
        #sidebar{
            position: fixed;
        }
        #sidebar ul li{
            display: block;
            margin-left: -20px;
        }
    </style>
    <div class="mt-3">
        
        <button class="togle btn-landinginfo" onclick="coba()"><i class="fas fa-burger"></i></button>
        <div id="sidebar" class="sidebar on pt-lg-1 pt-md-1 pt-5 float-start bg-landinginfo">
            <div class="pt-5">
                <ul>
                    <a href="{{route('kelolahome')}}" class="bg-landingprimary"><li class="bg-landingprimary me-3 mt-2 p-2 rounded"><i class="fas fa-home me-2"></i> Kelola Home</li></a>
                    <a href="{{route('kelolaproduk')}}" class="bg-landingprimary"><li class="bg-landingprimary me-3 mt-2 p-2 rounded"><i class="fas fa-list me-2"></i> Kelola Produk</li></a>
                    <a href="{{route('kelolacheckout')}}" class="bg-landingprimary"><li class="bg-landingprimary me-3 mt-2 p-2 rounded"><i class="fa-solid fa-cart-shopping me-2"></i> Kelola Checkout</li></a>
                    <a href="{{route('riwayatpenjualan')}}" class="bg-landingprimary"><li class="bg-landingprimary me-3 mt-2 p-2 rounded"><i class="fa-solid fa-timeline me-2"></i> Riwayat Penjualan</li></a>
                    <a href="{{route('kelolauser')}}" class="bg-landingprimary"><li class="bg-landingprimary me-3 mt-2 p-2 rounded"><i class="fa-solid fa-user me-2"></i> Kelola User</li></a>
                    <a href="{{route('kelolatentang')}}" class="bg-landingprimary"><li class="bg-landingprimary me-3 mt-2 p-2 rounded"><i class="fa-solid fa-building me-2"></i> Tentang</li></a>
                    <a href="{{route('metodebayar')}}" class="bg-landingprimary"><li class="bg-landingprimary me-3 mt-2 p-2 rounded"><i class="fa-solid fa-info-circle me-2"></i> Metode Pembayaran</li></a>
                </ul>
            </div>
        </div>
        <div id="content-admin" class="content-admin on mt-5 float-start"> 
            <div class="ms-2 me-2"> 
    	       @yield('main')
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <script type="text/javascript">
        function coba(){
            document.getElementById('sidebar').classList.toggle('on')
            document.getElementById('sidebar').classList.toggle('off')
            document.getElementById('content-admin').classList.toggle('on')
            document.getElementById('content-admin').classList.toggle('off')
        }
    </script>
    <script type="text/javascript" src="{{ asset('jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('owlCarousel/docs/assets/owlcarousel/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    
    @yield('script')
</body>
</html>