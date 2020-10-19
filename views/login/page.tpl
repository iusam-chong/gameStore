<div class="container" style="top:30%; width:100%; position: absolute;">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <div class="panel panel-default center-block" style="width: 70%;">
                <div class="panel-body">
                    <h2 class="text-center">Somy</h2>
                    <form>
                        <h3 id="errContent" class="text-center hidden">
                            <small class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span></small>
                            <small id="errMessage" class="text-danger"></small>
                        </h3>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input id="userName" type="text" class="form-control" placeholder="登入帳號" name="userName" maxlength="16">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <input id="password" type="password" class="form-control" placeholder="密碼" name="password" maxlength="16">
                        </div>
                        <button id="loginBtn" type="submit" class="btn btn-primary btn-block" disabled>登入</button>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- ./row -->
</div> <!-- ./container -->
<script src="http://localhost:8888/gameStore/js/login.js" defer></script>