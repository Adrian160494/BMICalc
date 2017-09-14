<form class="form-inline text-center" ng-submit="logIn(user)" id="loginForm">
        <div class="panel-group">
            <input class="form-control-inverse" type="text" name="login" placeholder="Login" ng-model="user.login"/>
            <input class="form-control-inverse" type="password" name="password" placeholder="Password" ng-model="user.password"/>
        </div>
    <div class="form-group">
        <button type="submit" class="fill" ><span class="text">Login</span></button>
        <button type="reset" class="fill2"><span class="text">Reset</span></button>
    </div>
</form>
<div class="text-center" style="color: red" ng-show="error">
    <span>{{error}}</span>
</div>
