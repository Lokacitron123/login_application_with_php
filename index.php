<?php
    require_once "includes/signup_view.inc.php";
    require_once "includes/config_session.inc.php";
    require_once "includes/login_view.inc.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="max-w-7xl mx-auto bg-slate-900">
    <header class="flex justify-between items-center">
        <div>
             <?php
                display_loggedin_user();
            ?>
        </div>
      
        <form action="includes/logout.inc.php" method="post">
            <button class="p-1 rounded-sm bg-slate-50 text-black">Logout</button>
        </form>
        
       
    </header>
    <main class=" flex flex-col gap-10 justify-center items-center  text-white">

        <section class="flex flex-col gap-3 ">
            
            <h3 class="text-3xl font-bold">Login</h3>
            
            <form action="includes/login.inc.php" method="post">
                <div class="flex flex-col">
                    <label for="login-username">Username</label>
                    <input class="p-1 text-black" id="login-username" type="text" name="username" placeholder="Username...">
                </div>
                <div class="flex flex-col">
                    <label for="login-password">Password</label>
                    <input class="p-1 text-black" id="login-password" type="password" name="pwd" placeholder="Password...">
                </div>
            <button class="mt-5 p-1 rounded-sm bg-slate-50 text-black">Login</button>
            </form>

         
        </section>

           <div class="flex flex-col">
            <?php
                check_login_errors();
            ?>
        </div>

          <section class="flex flex-col gap-3">
            <h3 class="text-3xl font-bold">Signup</h3>
        
            <form action="includes/signup.inc.php" method="post">
                <div class="flex flex-col">
                    <label for="signup-username">Username</label>
                    <input class="p-1 text-black" id="signup-username" type="text" name="username" placeholder="Username...">
                </div>
                <div class="flex flex-col">
                    <label for="signup-password">Password</label>
                    <input class="p-1 text-black" id="signup-password" type="password" name="password" placeholder="Password...">
                </div>
                <div class="flex flex-col">
                    <label for="signup-email">Email</label>
                    <input class="p-1 text-black" id="signup-email" type="text" name="email" placeholder="johndoe@test.se">
                </div>
                <button class="mt-5 p-1 rounded-sm bg-slate-50 text-black">Signup</button>
            </form>
                
                
        </section>

        <div class="flex flex-col">
            <?php
                check_signup_errors();
            ?>
        </div>


     

    </main>




    
</body>
</html>