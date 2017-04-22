<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">BookShare</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
              @if(Auth::check())
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="/users/{{ Auth::user()->id }}">マイページ</a></li>
                    <li role="separator" class="divider"></li>
                        <li><a href="/logout">ログアウト</a></li>
                  </ul>
                </li>
              @endif
              @unless(Auth::check())
                <li><a href="/login">ログイン</a></li>
              @endunless
            </ul>
        </div>
    </div>
</nav>
