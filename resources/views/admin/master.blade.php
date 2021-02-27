<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/css/easion.css') }}"> 
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="{{ url('js/chart-js-config.js') }}"></script>
    <title>QuantumAdmin</title>
</head>

<body>
    <div class="dash">
        <div class="dash-nav dash-nav-dark">
            <header>
                <a href="#!" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </a>
                <a href="{{url('admin')}}" class="easion-logo"><i class="fas fa-sun"></i> <span>Quantum</span></a>
            </header>
            <nav class="dash-nav-list">
                <a href="/admin" class="dash-nav-item">
                    <i class="fas fa-home"></i> Dashboard </a>
                    
                    <a href="{{url('admin/course/create')}}" class="dash-nav-item">
                        <i class="fas fa-plus"></i> Add Course </a>
                        <div class="dash-nav-dropdown">
                            <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                                <i class="fas fa-sticky-note"></i> Posts </a>
                                <div class="dash-nav-dropdown-menu">
                                    <a href="/admin/posts/create " class="dash-nav-dropdown-item">
                                        <i class="far fa-plus-square mr-2"></i> Add Post</a>
                                    </div>
                                    <div class="dash-nav-dropdown-menu">
                                        <a href="/admin/posts" class="dash-nav-dropdown-item">
                                            <i class="fas fa-plus-circle mr-2"></i>All Posts</a>
                                        </div>
                                    </div>
                                    <div class="dash-nav-dropdown">
                                        <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                                            <i class="fas fa-users"></i> Groups </a>
                                            <div class="dash-nav-dropdown-menu">
                                                <a href="/admin/addMember" class="dash-nav-dropdown-item">
                                                    <i class="fas fa-user-plus  mr-2"></i>Add Member</a>
                                                </div>
                                                <div class="dash-nav-dropdown-menu">
                                                    <a href="/admin/groups/create" class="dash-nav-dropdown-item">
                                                        <i class="fas fa-plus-circle mr-2"></i>Add group</a>
                                                    </div>
                                                    <div class="dash-nav-dropdown-menu">
                                                        <a href="/admin/groups" class="dash-nav-dropdown-item">
                                                            <i class="fas fa-scroll mr-2"></i>All groups</a>
                                                        </div>
                                                    </div>
                                                    <div class="dash-nav-dropdown ">
                                                        {{-- <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                                                            <i class="fas fa-cube"></i> Components </a>
                                                            <div class="dash-nav-dropdown-menu">
                                                                <a href="cards.html" class="dash-nav-dropdown-item">Cards</a>
                                                                <a href="forms.html" class="dash-nav-dropdown-item">Forms</a>
                                                                <div class="dash-nav-dropdown ">
                                                                    <a href="#" class="dash-nav-dropdown-item dash-nav-dropdown-toggle">Icons</a>
                                                                    <div class="dash-nav-dropdown-menu">
                                                                        <a href="icons.html" class="dash-nav-dropdown-item">Solid Icons</a>
                                                                        <a href="icons.html#regular-icons" class="dash-nav-dropdown-item">Regular Icons</a>
                                                                        <a href="icons.html#brand-icons" class="dash-nav-dropdown-item">Brand Icons</a>
                                                                    </div>
                                                                </div>
                                                                <a href="stats.html" class="dash-nav-dropdown-item">Stats</a>
                                                                <a href="tables.html" class="dash-nav-dropdown-item">Tables</a>
                                                                <a href="typography.html" class="dash-nav-dropdown-item">Typography</a>
                                                                <a href="userinterface.html" class="dash-nav-dropdown-item">User Interface</a>
                                                            </div>
                                                        </div> --}}
                                                        <div class="dash-nav-dropdown">
                                                            {{-- <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                                                                <i class="fas fa-file"></i> Layouts </a>
                                                                <div class="dash-nav-dropdown-menu">
                                                                    <a href="blank.html" class="dash-nav-dropdown-item">Blank</a>
                                                                    <a href="content.html" class="dash-nav-dropdown-item">Content</a>
                                                                    <a href="login.html" class="dash-nav-dropdown-item">Log in</a>
                                                                    <a href="signup.html" class="dash-nav-dropdown-item">Sign up</a>
                                                                </div>
                                                            </div> --}}
                                                            <div class="dash-nav-dropdown">
                                                                {{-- <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                                                                    <i class="fas fa-info"></i> About </a>
                                                                    <div class="dash-nav-dropdown-menu">
                                                                        <a href="https://github.com/subet/easion" target="_blank" class="dash-nav-dropdown-item">GitHub</a>
                                                                        <a href="https://usebootstrap.com/theme/easion" target="_blank" class="dash-nav-dropdown-item">UseBootstrap</a>
                                                                        <a href="https://mudimedia.com" target="_blank" class="dash-nav-dropdown-item">Mudimedia Software</a>
                                                                    </div>
                                                                </div> --}}
                                                            </nav>
                                                        </div>
                                                        <div class="dash-app">
                                                            <header class="dash-toolbar">
                                                                <a href="#!" class="menu-toggle">
                                                                    <i class="fas fa-bars"></i>
                                                                </a>
                                                                <a href="#!" class="searchbox-toggle">
                                                                    <i class="fas fa-search"></i>
                                                                </a>
                                                                <form class="searchbox" action="{{ url('admin/search/') }}" method="GET">
                                                                    {{-- <a href="#!" class="searchbox-toggle"> <i class="fas fa-arrow-left"></i> </a> --}}
                                                                    <button type="submit" class="searchbox-submit"> <i class="fas fa-search"></i> </button>
                                                                    <input type="text" name='s' class="searchbox-input" placeholder="type to search">
                                                                </form>
                                                                <div class="tools">
                                                                    {{-- <a href="https://github.com/subet/easion" target="_blank" class="tools-item">
                                                                        <i class="fab fa-github"></i>
                                                                    </a>
                                                                    <a href="#!" class="tools-item">
                                                                        <i class="fas fa-bell"></i>
                                                                        <i class="tools-item-count">4</i>
                                                                    </a>
                                                                    <div class="dropdown tools-item">
                                                                        <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="fas fa-user"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                                            <a class="dropdown-item" href="#!">Profile</a>
                                                                            <a class="dropdown-item" href="login.html">Logout</a>
                                                                        </div>
                                                                    </div> --}}
                                                                </div>
                                                            </header>
                                                            <main class="dash-content">
                                                                <div class="container-fluid">
                                                                    @yield('content')
                                                                </div>
                                                            </main>
                                                        </div>
                                                    </div>
                                                    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                                                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
                                                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
                                                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
                                                    <script src="{{ url('js/easion.js') }}"></script>
                                                    {{-- <link rel="stylesheet" href="{{ url('/css/easion.css') }}">  --}}
                                                    
                                                </body>
                                                
                                                </html>