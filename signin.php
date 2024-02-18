<?Php
include 'head.php';
?>

    <body style = "background:rgba(192, 247, 231, 0.813);">

        <label class = "logo" style = "margin-top:6em; margin-left:20em; margin-bottom: 2em; font-family:protest riot;  font-size:1.7em;">
            <strong>Vidcom</strong>
        </label>
        <div class = "container" style ="background:white; margin-left:25em; margin-right:30em; width:32%; padding-left:1.5em; padding-right:1.5em; padding-bottom:2em; border: 1px solid rgb(223, 232, 248);" >

                <p style = "padding-top:1em; font-size:1.7em; font-weight:bold; padding-bottom:-4em;">Sign in</p>

                <form action = "signindb.php" method = "POST">

                    <div class = form-group>

                        <label for = "email"> </label>
                        <input type = "email" class = "form-control" name = "email" id = "email" placeholder = "Email"/>

                        <label for = "password"> </label>
                        <input type = "password" class = "form-control" name = "password" id = "password" placeholder = "Password"/>
                    </div>
                
                
                <button class = "btn btn-primary" onclick = "submit()" style = "padding-left:1em; padding-right:1em; margin-right:5em;">Sign in </button><a href = "#" style = "font-size:1em; ">Forgot password?</a>
            
                </form>
            </div>

        <p style = "margin-left:29em; margin-top:1em; font-size:1em;"> New to Vidcom? <a href = "signup.php"> Register as a User</a> </p>
        
    </body>
    </html>

