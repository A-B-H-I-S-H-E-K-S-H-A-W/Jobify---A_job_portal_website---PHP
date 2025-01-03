<?php
session_start();
include("admin/db/db.php");
if(isset($_SESSION['email_id'])){
  $emailopt = $_SESSION['email_id'];
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Jobify</title>
    <link rel="stylesheet" href="style.css" />
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
    <?php include("includes/header.php"); ?>
    

    <div class="my-10 max-w-[1280px] mx-auto">
        <h2 class="text-4xl font-semibold mb-5">Personal Info</h2>
        <div class="border shadow-2xl w-full p-10">
            
            <div class="grid grid-cols-[30%_70%]">
                <div class="flex flex-col gap-5 border-r-2">
                    <div>
                    <?php if(isset($roww['profile'])){ ?>
                        <img src="uploads/profile/<?php echo $roww['profile'] ?>" class="w-40 border rounded-full" alt="Set up your iimage">
                    <?php } else { ?>
                        <img src="uploads/user.jpg" class="w-40 border rounded-full" alt="img">
                    <?php } ?>
                        <form class="mt-5" action="operations/updins.php" method="post" enctype="multipart/form-data">
                            <h2 class="text-lg font-bold text-blue-900 my-2">Edit Profile Photo</h2>
                            <input type="file" name="profile"/>
                            <input type="hidden" value="<?php echo $roww['uid']; ?>" name="uid"> 
                            <input type="submit" value="Change Profile Photo" name="profile-save" class="px-4 py-2 rounded-lg bg-blue-900 text-white font-semibold mt-2 hover:ring-1 hover:ring-blue-900 hover:bg-white hover:text-blue-900 duration-300 ease-linear"/>
                        </form>
                    </div>
                    <a href="personalInfo.php">
                    <?php if(isset($roww['name'])){ ?>
                        <h2 class="font-semibold text-3xl text-blue-800"><?php echo $roww['name']; ?></h2>
                    <?php } else { ?>
                        <h2 class="font-semibold text-3xl underline text-blue-800">Set Your Name</h2>
                    <?php } ?>
                    <div>
                    <h2 class="text-2xl text-semibold my-5">Contact :</h2>
                    <div>
                        <p><span class="font-semibold">Email :</span> <?php echo $roww['email_id']; ?></p>

                        <?php if(isset($roww['street'])){ ?>
                            <p><span class="font-semibold">Address : </span><?php echo $roww['street'] ?></p>
                        <?php } else { ?>
                            <p class="font-semibold">Address : <span class="text-blue-800 underline">Enter Your Address</span> </p>
                        <?php } ?>

                        <?php if(isset($roww['city']) && $roww['state']){ ?>
                            <p><span class="font-semibold">State : </span><?php echo $roww['state'] ?>, <?php echo $roww['city'] ?></p>
                        <?php } else { ?>
                            <p class="font-semibold">State : <span class="text-blue-800 underline">Enter Your City And State Details</span> </p>
                        <?php } ?>

                        <?php if(isset($roww['pin'])){ ?>
                            <p><span class="font-semibold">Pin-code : <?php echo $roww['pin'] ?></p>
                        <?php } else { ?>
                            <p class="font-semibold">Pin-code : <span class="text-blue-800 underline">Enter Your City Pincode</span> </p>
                        <?php } ?>
                        </a>
                    </div>
                </div>
                </div>
                
                <div class="text-start px-10">
                    <p class=''>
                    <?php if(isset($roww['about'])){ ?>
                        <p class="text-gray-800 text-lg pb-4 border-b-2"><?php echo $roww['about']; ?></p>
                    <?php } else { ?>
                        <p class="text-semibold underline text-lg text-blue-800 pb-4 border-b-2">Describe Yourself</p>
                    <?php } ?>
                    </p>
                

                    <div class="text-center mt-5">
                        <?php if(isset($roww['cv'])) { ?>
                            <h2 class="text-2xl text-semibold underline text-blue-800 mb-5">Download Your CV</h2>
                            <a download href="uploads/cv/<?php echo $roww['cv']; ?>" class="px-4 py-2 rounded-lg bg-blue-900 text-white font-semibold mt-2 hover:ring-1 hover:ring-blue-900 hover:bg-white hover:text-blue-900 duration-300 ease-linear">Download</a>
                            <form action="operations/pdfupd.php" method="post" enctype="multipart/form-data" class="mt-20">
                                <h2 class="text-lg font-bold text-blue-900 my-2">Edit your uploaded CV Photo</h2>    
                                <input type="file" name="pdf"/>
                                <input type="hidden" value="<?php echo $roww['uid']; ?>" name="uid"> 
                                <input type="submit" value="Change CV" name="cv-save" class="px-4 py-2 rounded-lg bg-blue-900 text-white font-semibold mt-2 hover:ring-1 hover:ring-blue-900 hover:bg-white hover:text-blue-900 duration-300 ease-linear"/>
                            </form>
                        <?php } else { ?>
                            <h2 class="text-2xl text-semibold underline text-blue-800">Upload Your CV</h2>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <?php include("includes/footer.php"); ?>
  </body>
</html>
