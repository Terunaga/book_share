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
                <li><a href="/books/create">登録する</a></li>
                <li><a href="users/{{ Auth::user()->id }}/lends">貸出リクエスト<span class="badge">{{ Auth::user()->requestedBookCounts() }}</span></a></li>
                @if(count($writable_books) != 0)
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">レビューを書く<span class="badge">{{ count($writable_books) }}<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        @foreach($writable_books as $book)
                          <li><a href="/books/{{ $book->id }}/reviews/create">{{ $book->name }}</a></li>
                        @endforeach
                      </ul>
                    </li>
                @endif
                <li><a href="/users/{{ Auth::user()->id }}">マイページ</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Hoge</a></li>
                    <li><a href="#">Fuga</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/logout">ログアウト</a></li>
                  </ul>
                </li>
              @else
                <li><a href="/login">ログイン</a></li>
              @endif
            </ul>
        </div>
    </div>
</nav>
