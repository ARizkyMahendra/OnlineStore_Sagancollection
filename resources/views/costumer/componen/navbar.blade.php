<nav class="navbar navbar-expand-lg" style="background-color: #F9F5F6">
    <div class="container">
        <a class="navbar-brand" href="#">
            <h2>Sagan Collection</h2>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end gap-5" id="navbarSupportedContent">
            <ul class="navbar-nav gap-2">
                <li class="nav-item">
                    <a class="nav-link  {{Request::path() == '/' ? 'active' : ''}}" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">  
                    <a class="nav-link  {{Request::path() == 'shop' ? 'active' : ''}}" href="/shop">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{Request::path() == 'contact' ? 'active' : ''}}" href="/contact">Contact Us</a>
                </li>
                <li class="nav-item">
                    <div class="notif ">
                        <a href="/transaksi" class="fs-5 nav-link">
                            <i class="fa-solid icon-nav fa-bag-shopping "></i>
                            @if ($count)
                                <div class="badge badge-warning" id='lblCartCount'>{{$count}}</div>
                            @endif
                        </a>
                    </div>
                </li>
                <li class="nav-item">                  
                    <button class="btn btn-light border-success" type="button" 
                        data-bs-toggle="modal" data-bs-target="#loginModal">Login / Register</button>
                </li>
            </ul>
        </div>
    </div>
</nav>