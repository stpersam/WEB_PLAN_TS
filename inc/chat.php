<script>
    $(document).ready(function(){
        fetch_user();
        setInterval(function(){
            fetch_user();
        }, 5000);

        function fetch_user()
        {
            $.ajax({
                url:"./utility/fetch_user.php",
                method:"POST",
                success:function(data){
                    $('#user_details').html(data);
                }
            })
        }
    });
</script>

<div class="container">
    <br />

    <h3 align="center">Chat Application using PHP Ajax Jquery</a></h3><br />
    <br />

    <div class="table-responsive">
        <h4 align="center">Online User</h4>
        <form method="post" action="utility/login.php">
            <button type="submit" name="logout" id="logout" class="btn btn-primary" style="float: right">Logout</button>
        </form>
        <div id="user_details"></div>
    </div>
</div>
