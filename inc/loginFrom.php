<div class="form_überschrift">
    <h2>Login</h2>
</div>

<div class="formular">
    <form name = "myForm" action="" method="post">
        <div class="Formularfenster" Id="eltern">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" name="stayLoggedIn" value="yes" class="form-check-input" id="stayLoggedIn">
                <label class="form-check-lable" for="stayLoggedIn">Stay Logged in</label>
            </div>
        <button type="submit" name="login" id="login" class="btn btn-primary">Login</button>
    </form>
</div>
</div>