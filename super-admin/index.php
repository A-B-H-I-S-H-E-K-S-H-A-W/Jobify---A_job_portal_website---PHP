<?php 
session_start(); 
include("db/db.php");

if(isset($_POST['save'])){
    $email = $_POST['email'];
    $user = $_POST['user'];
    $pass = $_POST['password'];


    if (!isset($_SESSION['attempts'])) {
        $_SESSION['attempts'] = 3;
    }

    if ($_SESSION['attempts'] > 0) {

        $sel = "SELECT * FROM admin WHERE email='$email' AND password='$pass' AND name='$user'";
        $result = $con->query($sel);

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();

            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['aid'];
            
            header("location: dashboard.php");
            exit();
        } else {
            $_SESSION['attempts']--;
            $err = "Invalid email, username, or password.";
        }
    } else {
        $err = "Too many login attempts. Please try again later.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin</title>
    <link rel="stylesheet" href="styles/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="div flex min-h-screen flex-col justify-center px-6 py-12 lg:px-80">
        <div class="bg-white py-10 rounded-lg">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm text-center">
                <h1 class="text-black text-3xl font-bold">Jobify</h1>
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Only for Admin's!</h2>

                <?php if(isset($err)): ?> 
                    <div class="text-center">
                        <span class="inline-flex items-center rounded-md bg-red-50 px-4 py-2 font-medium text-red-700 ring-1 ring-inset ring-red-600/10">
                            Danger: <?php echo $err; ?>
                        </span>
                        
                    </div>
                <?php endif; ?>
                <?php if(isset($_SESSION['attempts'])){ ?>
                    <span class="inline-flex items-center rounded-md bg-red-50 px-4 py-2 font-medium text-red-700 ring-1 ring-inset ring-red-600/10">
                            Attempts left <?php echo $_SESSION['attempts']; ?>
                        </span>
                        
                <?php } ?>
            </div>

            <div class="div2 mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="" method="POST">
                    <div>
                        <label for="user" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                        <div class="mt-2">
                        <input <?php if(isset($_SESSION['attempts']) && $_SESSION['attempts'] === 0) { echo 'disabled'; } ?> id="user" name="user" type="text" autocomplete="username" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                        <div class="mt-2">
                        <input <?php if(isset($_SESSION['attempts']) && $_SESSION['attempts'] === 0)  { echo 'disabled'; }  ?> id="email" name="email" type="text" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6">

                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        </div>
                        <div class="mt-2">
                        <input <?php if(isset($_SESSION['attempts']) && $_SESSION['attempts'] === 0) { echo 'disabled'; } ?> id="password" name="password" type="password" autocomplete="password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6">

                        </div>
                    </div>

                    <button <?php if(isset($_SESSION['attempts']) && $_SESSION['attempts'] === 0) { echo 'disabled'; } ?>  type="submit" name="save" class="flex w-full justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black"
                        >
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
