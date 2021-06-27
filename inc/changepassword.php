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
    <div class="form_überschrift">
        <h2>Passwort ändern</h2>
    </div>
    <!--Form to get the data of the User and validate it -->
    <div class="formular">
        <form name = "myForm" action="./utility/passwordchangeAPI.php" method="post">
            <div class="Formularfenster" Id="eltern">    
            <div class="form-group">
                    <label for="password">altes Passwort:</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="password" required>
                </div>     
                    <div class="form-group">
                    <label for="password">neues Passwort:</label>
                    <input type="password" id="newpassword" name="newpassword" class="form-control" placeholder="password" required>
                </div>
                <div class="form-group">
                    <label for="passwordBest">Passwort wiederholen:</label>
                    <input type="password" id="passwordBest" name="passwordBest" class="form-control" onchange="check_pass();" placeholder="Confirm Password" required>
                </div>
                <button type="submit" name="passwordchange" id="passwordchange" class="btn btn-color">Ändern</button>
        </form>
    </div>
    </div>
</div>
