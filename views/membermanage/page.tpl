<script type="module" src="http://localhost:8888/gameStore/js/membermanage.js" defer></script>

<h1 class="text-center">會員管理</h1>
<hr>
{{if $memberAuth}}
<div class="container">
    <table class="table">
        <thead>
            <tr bgcolor="#003087" style="color: white;">
                <th scope="col" class="col-xs-2 text-center">會員編號</th>
                <th scope="col" class="col-xs-6">帳號名稱</th>
                <th scope="col" class="col-xs-2 text-center">註冊時間</th>
                <th scope="col" class="col-xs-2 text-center">狀態</th>
            </tr>
        </thead>
        <tbody>
            {{foreach $members as $member}}
            <tr>
                <td class="text-center" style="vertical-align: middle;">{{$member.id}}</td>
                <td style="vertical-align: middle;">{{$member.user_name}}</td>
                <td class="col-xs-1 text-center" style="vertical-align: middle;">{{$member.reg_time}}</td>
                <td class="col-xs-1 text-center" style="vertical-align: middle;">
                    <div class="elementContr">
                        <form>
                            <input type="hidden" name="userId" value="{{$member.id}}"></input>
                            <input type="hidden" name="status" id="status" value="{{$member.enabled}}"></input>

                            {{if $member.enabled}}
                            <button type="submit" id="button" class="btn btn-success">啟用中</button>
                            {{else}}
                            <button type="submit" id="button" class="btn btn-danger">停用中</button>
                            {{/if}}
                        </form>
                    </div>
                </td>
            </tr>
            {{/foreach}}
        </tbody>
    </table>
</div>
{{else}}
<p class="text-center">無權限查閱</p>
{{/if}}