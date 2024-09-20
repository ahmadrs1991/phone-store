<header class="bg-primary p-3">
    <div class="container d-flex justify-content-between align-items-center">

        <nav>


                  @php
                 if(!auth()->guest())
                 $greeting =auth()->user()->image ;
                 else
                  $greeting="guest.png";
                 @endphp

            @auth
                <span class="text-white text-decoration-none me-3"> Wellcome  {{ auth()->user()->name }}</span>
                 <span class="text-white text-decoration-none me-3">
                   <img src="{{ asset('images/users/' .  $greeting)  }}" alt="{{ $greeting }}"
                                    style="width: 45px; height: auto;">
                 </span>
                @if (auth()->user()->isAdmin())
                    <a href="{{ route('dashboard') }}" class="text-white text-decoration-none me-3">Dashboard</a>
                @endif
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Logout</button>
                </form>
                 @else
                  <a href="{{ route('login') }}" class="text-white text-decoration-none me-5">Login</a>
                 <a href="{{ route('register') }}" class="text-white text-decoration-none me-5">Register</a>
                   <span class="text-white text-decoration-none me-3">
                   <img src="{{ asset('images/users/' .  $greeting)  }}" alt="{{ $greeting }}"
                                    style="width: 45px; height: auto;">
                 </span>

            @endauth

        </nav>
         <form class="d-flex"  action="{{ route('search') }}" method="GET">
        <input class="form-control me-2" name="query" type="text" placeholder="Search for Item" aria-label="Search">
        <button class="btn btn-primary" type="submit">Search</button>
      </form>

    </div>
</header>
