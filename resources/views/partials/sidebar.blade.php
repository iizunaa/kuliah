<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a href="/home">
                Zuna Movie
            </a>
        </li>
        <li>
            <a href="/home"><i class="bi bi-house"></i> 
                Home</a>
        </li>
        <li>

            <a href="/history"><i class="bi bi-hand-thumbs-up"></i> 
                Film yang disukai
            </a>
        </li>
        <li>

            <a href="/daftar"><i class="bi bi-archive"></i> 
                Semua film
            </a>
        </li>
        {{-- <li>
            <a href="/about"><i class="bi bi-square"></i> 
                About</a>
        </li>      --}}
        <div class="border-bottom"></div>
             {{-- login  --}}

             @auth
             <li class="mt-1">
                <h1 class="text-light">Account</h1>
                <a href="">
                    <i class="bi bi-person"></i>
                  {{ auth()->user()->username }}
                </a>

                @can('admin')  
                <a href="/dashboard"><i class="bi bi-dash-square"></i> Dashboard</a>
                @endcan
                
                <ul>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="btn btn-toggle align-items-center rounded collapsed 
                    mt-2 btn-dark"> 
                        logout
                        <i class="bi bi-box-arrow-right"></i>
                    </button>
                  </form>
                </ul>
              </li>
                 @else

                 <li class="navbar-login">
                     <a href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                 </li>
                 @endauth
 </ul>     
</div>