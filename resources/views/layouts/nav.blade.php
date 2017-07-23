<div class="blog-masthead">
    <div class="container">
        <nav class="nav blog-nav">
            <a class="nav-link active" href="/">Home</a>
            <a class="nav-link" href="/posts/create">Publish a post</a>
            <a class="nav-link" href="#">Press</a>
            <a class="nav-link" href="#">New hires</a>
            <a class="nav-link" href="#">About</a>
            <div class="form-inline ml-auto">

            @if(! auth()->check() )
                <a class="nav-link " href="{{ route('login') }}">Login</a>
                <a class="nav-link" href="{{ url('register') }}">Register</a>
            @else
                <a class="nav-link" href="{{ url('logout') }}">Logout</a>
            @endif    

            </div>
            
        </nav>
    </div>
</div>