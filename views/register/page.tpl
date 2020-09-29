<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="thumbnail">
                <div class="caption">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="user-name">帳號</label>
                            <input name="userName" maxlength="16" type="text" class="form-control" id="user-name" required="required" />
                        </div>
                        <span class="text-danger">
                            <p id="textUserNameErr"></p>
                        </span>
                        <div class="form-group">
                            <label for="pwd">密碼</label>
                            <input name="password" maxlength="16" type="password" class="form-control" id="pwd" required="required" />
                        </div>
                        <span class="text-danger">
                            <p id="textPasswordErr"></p>
                        </span>
                        <div class="form-group">
                            <label for="pwdconfirm">密碼確認</label>
                            <input name="passwordConfirm" maxlength="16" type="password" class="form-control" id="pwdconfirm" required="required" />
                        </div>
                        <span class="text-danger">
                            <p id="textPasswordConfirmErr"></p>
                        </span>
                        <button name="register" value="1" type="submit" class="btn btn-primary btn-block" id="btnSubmit">註冊</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="module" src="./js/register.js" defer></script>