<script type="module" src="http://localhost:8888/gameStore/js/nav.js" defer></script>
<nav class="navbar navbar-inverse" style="margin-bottom: 0;">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://localhost:8888/gameStore/index">Somy</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li id="shop"><a href="http://localhost:8888/gameStore/shop">商店<span class="sr-only"></span></a></li>
                {{if $loginStatus}}
                <li id="cart"><a href="http://localhost:8888/gameStore/cart">購物車<span class="sr-only"></span></a></li>
                <li id="statement"><a href="http://localhost:8888/gameStore/statement">交易紀錄<span class="sr-only"></span></a></li>
                {{/if}}
                {{if $type === 'admin' || $type === 'superAdmin'}}
                <li id="systemmanage"><a href="http://localhost:8888/gameStore/productmanage">系統管理<span class="sr-only"></span></a></li>
                {{/if}}
            </ul>

            <ul class="nav navbar-nav navbar-right">
                {{if $loginStatus}}
                <form id="logout" method="post" action=""></form>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{$userName}} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><button type="submit" form="logout" name="logout" class="btn btn-link btn-block">登出</button></a></li>
                    </ul>
                </li>
                {{else}}
                <li><a href="http://localhost:8888/gameStore/login"><span class="glyphicon glyphicon-log-in"></span> 登入</a></li>
                <li><a href="http://localhost:8888/gameStore/register"><span class="glyphicon glyphicon-user"></span> 註冊</a></li>
                {{/if}}
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>