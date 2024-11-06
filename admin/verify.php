<?php
include("db/db.php");
session_start();
if(!isset($_SESSION['email'])){
    header("location: login.php");
}else {
    if (isset($_POST['save'])) {
        $id = $_SESSION['cid'];
        $cname = $_POST['cname'];
        $email = $_POST['email'];
        $pan = $_POST['pan'];
        $gst = $_POST['gst'];
        $link = $_POST['website'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $verify = "Verification Pending";
    
        $buf = $_FILES['docs']['tmp_name'];
        $type = $_FILES['docs']['type'];
        $pdf = time() . $_FILES['docs']['name'];
        move_uploaded_file($buf, "uploads/" . $pdf);
    
        $buf2 = $_FILES['license']['tmp_name'];
        $type2 = $_FILES['license']['type'];
        $pdf2 = time() . $_FILES['license']['name'];
        move_uploaded_file($buf2, "uploads/" . $pdf2);
    
        if ($type == "application/pdf" && $type2 == "application/pdf") {
            $upd = "UPDATE recruiter SET cname='$cname', email='$email', pan='$pan', gst='$gst', country='$country', city='$city', state='$state', docs='$pdf', license='$pdf2', website='$link', verify='$verify' WHERE cid='$id' ";
            $con->query($upd);

            $sel = "SELECT * FROM recruiter";
            $rs = $con->query($sel);
            $row = $rs->fetch_assoc();
            $_SESSION['verify'] = $row['verify'];

            header("location:verify.php");
        } else {
            echo "Error 404";
        }
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Jobs</title>
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
    <!-- Main wrapper to hold sidebar and main content -->
    <div class="flex">
      <!-- Sidebar -->
      <?php include("includes/sidebar.php"); ?>

      <!-- Main content (topbar and other content) -->
      <div class="flex-1 flex flex-col">
        <!-- Topbar -->
        <?php include("includes/topbar.php"); ?>

        <!-- Other content can go here -->
         <?php if($row['verify'] == 'Not Verified'){ ?>
        <div class="p-10">
          <h2 class="text-3xl text-gray-500">Enter your company details</h2>

            <form action="" method="post" enctype="multipart/form-data">
            <div class="space-y-12">
                

                <div class="border-b border-gray-900/10 pb-12 mt-10">
               <div class="flex justify-between">
                    <div >
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Verify</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">Verify your company or organization to continue with jobify.</p>
                    </div>
                    <div>
                        <div class="text-center">
                            <span class="inline-flex items-center rounded-md bg-blue-50 px-4 py-2 font-medium text-blue-700 ring-1 ring-inset ring-blue-600/10">Status : <?php if(isset($_SESSION['verify']) == 'Verification Pending'){ echo $_SESSION['verify']; } else if(isset($_SESSION['verify']) == 'Verified' ) { echo $_SESSION['verify']; } else { echo $_SESSION['verify']; } ?></span>
                        </div>
                    </div>
               </div>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                    <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Comapny name</label>
                    <div class="mt-2">
                        <input type="text" name="cname" id="cyname" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    </div>
                    </div>

                    <div class="sm:col-span-4">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    </div>
                    </div>

                    <div class="sm:col-span-3">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">PAN No.</label>
                    <div class="mt-2">
                        <input id="pan" name="pan" type="text" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    </div>
                    </div>

                    <div class="sm:col-span-3">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">GST No.</label>
                    <div class="mt-2">
                        <input id="gst" name="gst" type="text" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    </div>
                    </div>


                    <div class="sm:col-span-3">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Upload Verified Documents <span class="text-xs text-red-500">*Upload a PDF file</span></label>
                    <div class="mt-2">
                        <input id="docs" accept="application/pdf" name="docs" type="file" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    </div>
                    </div>

                    <div class="sm:col-span-3">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Upload License <span class="text-xs text-red-500">*Upload a PDF file</span></label>
                    <div class="mt-2">
                        <input id="license" accept="application/pdf" name="license" type="file" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    </div>
                    </div>



                    <div class="sm:col-span-full">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Website Link</label>
                    <div class="mt-2">
                        <input id="website" name="website" type="text" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    </div>
                    </div>


                    <div class="sm:col-span-2">
                    <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Country</label>
                    <div class="mt-2">
                        <input id="country" name="country" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-sm sm:leading-6"/>
                    </div>
                    </div>

                    <div class="sm:col-span-2">
                    <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City</label>
                    <div class="mt-2">
                        <input type="text" name="city" id="city" autocomplete="city" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    </div>
                    </div>

                    <div class="sm:col-span-2">
                    <label for="state" class="block text-sm font-medium leading-6 text-gray-900">State / Province</label>
                    <div class="mt-2">
                        <input type="text" name="state" id="state" autocomplete="address-level1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    </div>
                    </div>                    
                    
                </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <input type="submit" value="Verify" name='save' class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"/>
                </div>
            </form>

            <!-- Model Box -->
        </div>

        
        <?php } else if($row['verify'] == 'Verification Pending') { ?>
                <div class="flex justify-center items-center h-full">
                    <div class="text-center flex flex-col items-center gap-5">
                        <h2 class="text-3xl text-gray-500">Verification Submitted</h2>
                        <span class="inline-flex items-center rounded-md bg-blue-50 px-4 py-2 font-medium text-blue-700 ring-1 ring-inset ring-blue-600/10">Status : <?php if(isset($row['verify']) == 'Verification Pending'){ echo $row['verify']; } else if(isset($row['verify']) == 'Verified' ) { echo $row['verify']; } else { echo 'Not Verified'; } ?></span>
                        <a href="dashboard.php" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Redirect to Dashboard</a>
                    </div>
                </div>
            <?php } else { ?>
                <div class="flex justify-center items-center h-full">
                    <div class="text-center flex flex-col items-center gap-5">
                        <h2 class="text-3xl text-gray-500">Already Verified</h2>
                        <span class="inline-flex items-center rounded-md bg-blue-50 px-4 py-2 font-medium text-blue-700 ring-1 ring-inset ring-blue-600/10">Status : <?php if(isset($row['verify']) == 'Verification Pending'){ echo $row['verify']; } else if(isset($row['verify']) == 'Verified' ) { echo $row['verify']; } else { echo 'Not Verified'; } ?></span>
                        <a href="dashboard.php" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Redirect to Dashboard</a>
                    </div>
                </div>
            <?php } ?>
      </div>
    </div>



  </body>
</html>
