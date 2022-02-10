<center class="title top p-5">
    <h1>AMAZING BOOK STORE</h1>    
    <div class="row justify-content-center mt-4">
        <div class="col-md-4 ">
            <form action="/">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search Book Title.." name="search">
                    <button class="btn btn-outline-success" type="submit" id="button-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                      </svg></button>
                  </div>
            </form>
            <form action="/auth/logout" method="POST">
                @csrf
                <button class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-in-right pt-1 pr-1" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                  <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>Logout</button>
              </form>
        </div>
    </div>
  </center>
  
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item {{ ($title === "Home") ? 'active': '' }}">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown {{ ($title === "Category") ? 'active': '' }}">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Book Category    
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                @foreach ($categories as $item)
                    <a class="dropdown-item" href="/category/{{ $item->id }}">{{ $item->category }}</a>   
                @endforeach
            </div>
            </li>
            <li class="nav-item {{ ($title === "Cart") ? 'active': '' }}">
                <a class="nav-link" href="/cart">Cart</a>
            </li>
            <li class="nav-item {{ ($title === "Profile") ? 'active': '' }}">
                <a class="nav-link" href="/profile">Profile</a>
            </li>
            @admin
            <li class="nav-item {{ ($title === "Account Maintanance") ? 'active': '' }}">
                <a class="nav-link" href="/account-maintanance">Account Maintanace</a>
            </li>
            @endadmin
            <li class="nav-item {{ ($title === "Help") ? 'active': '' }}">
                <a class="nav-link" href="/help">Help</a>
            </li>
        </ul>
        </div>
  </nav>
  