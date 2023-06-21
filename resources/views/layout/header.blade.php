<nav class="bg-white shadow shadow-lg" style="display:flex; align-items:center; justify-content:space-between; padding:10px 20px;">
<div style="display:flex; gap:10px; align-items:center;">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger  align-self-center"></i>
    </a>
    <a href="{{ Route('statistiques.index') }}">
        <i id="home_link" style="font-size:25px;" class="bi bi-house-door"></i>
    </a>
</div>

    {{--  <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">  --}}
            <div class="nav-item dropdown">
                {{--  <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                  </a>  --}}

                <a class="nav-link dropdown-toggle " href="#" data-bs-toggle="dropdown">
                    <?php
                      $img = auth()->user()->img;
                      if($img==null){
                        $img = "assets/img/defaultProfile.png";
                      }                            
                ?>
                <img src="{{ asset($img) }}" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark">{{auth()->user()->prenom}} {{auth()->user()->nom}}</span>
                </a>
                <div class="dropdown-menu mt-5 dropdown-menu-end">
                    <a class="dropdown-item" href="{{ Route('profile.edit') }}"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
                    <form method="post" action="{{ Route('logout') }}">
                        @csrf
                        <button class="dropdown-item" type="submit"><i style="margin-right:8px;" class="bi bi-box-arrow-left"></i> Log out</button>
                    </form>
                </div>
            </div>
        {{--  </ul>
    </div>  --}}
</nav>
