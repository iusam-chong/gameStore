<script type="module" src="http://localhost:8888/gameStore/js/adminmanage.js" defer></script>
{{if $employeeAuth}}
<div class="container">
        <div class="row" style="display: flex; align-items: center;">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <h1 class="text-center">後台帳號管理</h1>
            </div>
            <div class="col-lg-2">
                <button class="btn btn-success btn-block" data-toggle="modal" data-target="#newAccount" style="float:right; margin-top: 10px;">新增後台帳號</button>
            </div>
        </div>

    <div class="modal fade" id="newAccount">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">新增後台帳號</h4>
                </div>

                <div id="newAccount">
                    <form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="userName">帳號:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="userName" name="userName" placeholder="輸入後台帳號名稱">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="password">密碼:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="輸入密碼">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="passwordComfrim">密碼確認:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="passwordComfrim" name="passwordComfrim" placeholder="輸入密碼確認">
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">取消</button>
                            <button type="submit" class="btn btn-success">送出</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="container">
    <table class="table">
        <thead>
            <tr bgcolor="#003087" style="color: white;">
                <th scope="col" class="col-xs-1 text-center">管理者編號</th>
                <th scope="col" class="col-xs-3">帳號名稱</th>
                <th scope="col" class="col-xs-2 text-center">創建時間</th>
                <th scope="col" class="col-xs-1 text-center">狀態</th>
                <th scope="col" class="col-xs-1 text-center">商品管理權限</th>
                <th scope="col" class="col-xs-1 text-center">會員管理權限</th>
                <th scope="col" class="col-xs-1 text-center">後台帳號管理</th>
            </tr>
        </thead>
        <tbody>
            {{foreach $admins as $admin}}
            <tr>
                <td class="text-center" style="vertical-align: middle;">{{$admin.id}}</td>
                <td style="vertical-align: middle;">{{$admin.user_name}}</td>
                <td class="text-center" style="vertical-align: middle;">{{$admin.reg_time}}</td>
                <td class="text-center" style="vertical-align: middle;">
                    {{if $userId === $admin.id}}
                    <button class="btn btn-primary" disabled>啟用中</button>
                    {{else}}
                    <div class="enabledContr">
                        <form>
                            <input type="hidden" name="userId" value="{{$admin.id}}">
                            <input type="hidden" name="enabledStatus" class="status" value="{{$admin.enabled}}">
                            {{if $admin.enabled}}
                            <button type="submit" class="btn btn-success">啟用中</button>
                            {{else}}
                            <button type="submit" class="btn btn-danger">停用中</button>
                            {{/if}}
                        </form>
                    </div>
                    {{/if}}
                </td>
                <td class="text-center" style="vertical-align: middle;">
                    <div class="productContr">
                        <form>
                            <input type="hidden" name="userId" value="{{$admin.id}}">
                            <input type="hidden" name="productStatus" class="status" value="{{$admin.product}}">
                            {{if $admin.product}}
                            <button type="submit" class="btn btn-success">已授權</button>
                            {{else}}
                            <button type="submit" class="btn btn-danger">未授權</button>
                            {{/if}}
                        </form>
                    </div>
                </td>
                <td class="text-center" style="vertical-align: middle;">
                    <div class="memberContr">
                        <form>
                            <input type="hidden" name="userId" value="{{$admin.id}}">
                            <input type="hidden" name="memberStatus" class="status" value="{{$admin.member}}">
                            {{if $admin.member}}
                            <button type="submit" class="btn btn-success">已授權</button>
                            {{else}}
                            <button type="submit" class="btn btn-danger">未授權</button>
                            {{/if}}
                        </form>
                    </div>
                </td>
                <td class="text-center" style="vertical-align: middle;">
                    {{if $userId === $admin.id}}
                    <button class="btn btn-primary" disabled>已授權</button>
                    {{else}}
                    <div class="employeeContr">
                        <form>
                            <input type="hidden" name="userId" value="{{$admin.id}}">
                            <input type="hidden" name="employeeStatus" class="status" value="{{$admin.employee}}">
                            {{if $admin.employee}}
                            <button type="submit" class="btn btn-success">已授權</button>
                            {{else}}
                            <button type="submit" class="btn btn-danger">未授權</button>
                            {{/if}}
                        </form>
                    </div>
                    {{/if}}
                </td>
            </tr>
            {{/foreach}}
        </tbody>
    </table>
</div>

<div class="container text-center">
    <ul class="pagination">
        {{for $i=1 to $pagination}}
        {{if $currentPage == $i}}
        <li class="active"><a href="http://localhost:8888/gameStore/adminmanage/page/{{$i}}">{{$i}}</a></li>
        {{else}}
        <li><a href="http://localhost:8888/gameStore/adminmanage/page/{{$i}}">{{$i}}</a></li>
        {{/if}}
        {{/for}}
    </ul>
</div>
{{else}}
<h1 class="text-center">後台帳號管理</h1>
<hr>
<p class="text-center">無權限查閱</p>
{{/if}}