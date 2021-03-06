<script>
    function check_pass() {
        if (document.getElementById('password').value == document.getElementById('passwordBest').value) {
            document.getElementById('registrieren').disabled = false;
        } else {
            document.getElementById('registrieren').disabled = true;
        }
    }
</script><link rel="stylesheet" href="res/assets/css/main.css" />
<style>
    input, button {
        text-align: center;
        margin: auto;
  display: block;
    }

    label {
        text-align: center;
    }

    h2 {
        text-align: center;
    }

    .formular {
        text-align: center;
        margin: auto;
  width: 50%;
  padding: 10px;
    }


</style>

<div class="container" >
    <div class="form_├╝berschrift">
        <h2>Register</h2>
    </div>
    <!--Form to get the data of the User and validate it -->
    <div class="formular">
        <form name = "myForm" action="./utility/regValidate.php" method="post">
            <div class="Formularfenster" Id="eltern">              
                
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" class="form-control" placeholder="User" required>
                </div>
                <div class="form-group">
                    <label for="password">Passwort:</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="password" required>
                </div>
                <div class="form-group">
                    <label for="passwordBest">Passwort wiederholen:</label>
                    <input type="password" id="passwordBest" name="passwordBest" class="form-control" onchange="check_pass();" placeholder="Confirm Password" required>
                </div>
                <div class="form-group">
                    <label for="email">E-Mail:</label>
                    <input type="email" name="email" class="form-control" placeholder="user@mail.com">
                </div>
                <button type="submit" name="registrieren" id="registrieren" class="btn btn-color">Register</button>
        </form>
    </div>
    </div>
</div>
