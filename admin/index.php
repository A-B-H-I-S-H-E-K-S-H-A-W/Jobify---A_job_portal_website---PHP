<?php 
include("db/db.php");
if(isset($_POST['save'])){
    $pan = $_POST['pan'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];
    $confirm = 'Not Verified';

    if($pass === $cpass && strlen($pan) === 8){
        $ins = "INSERT INTO recruiter SET pan='$pan', email='$email', password='$pass', cpassword='$cpass', verify='$confirm'";
        $con->query($ins);
        header("location: login.php");
    }else{
        if($pass !== $cpass){
            $err = "Password do not match";
        }
        if(strlen($pan) !== 8){
            $err = "PAN No. should be of 8 characters";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
  <div class="div flex min-h-screen flex-col justify-center px-6 py-12 lg:px-80">
  <div class="bg-white py-5 rounded-lg">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm text-center">
  <h1 class="text-blue-900 text-3xl font-bold">Jobify</h1>
    <h2 class="mt-3 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign up your account</h2>
  </div>

  <?php 
  if(isset($err)){ ?> 
    <div class="text-center">
        <span class="inline-flex items-center rounded-md bg-red-50 px-4 py-2 font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Danger : <?php echo $err; ?></span>
    </div>
 <?php } ?>
  <div class="mt-3 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="" method="POST">
    <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Registered PAN No.</label>
        <div class="mt-2">
          <input id="pan" name="pan" type="text" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
        <div class="mt-2">
          <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
        </div>
        <div class="mt-2">
          <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Confirm Password</label>
        </div>
        <div class="mt-2">
          <input id="password" name="cpassword" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <button type="submit" name="save" class="flex w-full justify-center rounded-md bg-blue-900 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Sign in</button>
      </div>
    </form>

    <p class="mt-10 text-center text-sm text-gray-500">
      Already have an account !
      <a href="login.php" class="font-semibold leading-6 text-blue-600 hover:text-blue-500">Login</a>
    </p>
  </div>
        </div>
    </div>
  </body>
</html>
