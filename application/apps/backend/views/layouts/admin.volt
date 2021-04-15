<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="/">
            管理画面
        </a>
        <div class="collapse navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                {% if session.has('auth') %}
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ auth['name'] }}<span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/admin/session/end"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                ログアウト
                            </a>

                            <form id="logout-form" action="/admin/session/end" method="POST" style="display: none;">
                            </form>
                        </div>
                    </li>
                {% endif %}
            </ul>
        </div>
    </div>
</nav>

<main class="py-4">
    <div class="container">
        <div class="row">
            {% include "layouts/menu.volt" %}
            {{ flash.output() }}
            {{ content() }}
        </div>
    </div>
</main>