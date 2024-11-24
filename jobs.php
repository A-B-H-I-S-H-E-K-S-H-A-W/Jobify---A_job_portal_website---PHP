<?php
session_start();
include("admin/db/db.php");
if(!isset($_SESSION['email_id'])){
}

if(isset($_GET['Internship'])){
  $internship = $_GET['Internship'];
}

if(isset($_GET['startup'])){
$startup = $_GET['startup'];
}



$jobcat = "All";
$state= "All";
$count = 0;
$counti = 0;
if(isset($_GET['search'])){
  $jobcat = $_GET['jobcat'];
  $state = $_GET['state'];

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
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
    <div class="max-w-[1280px] mx-auto px-10">


          <div class="mt-20">
            <div class="max-w-[1280px] mx-auto">
              <div class="title text-center">
                <h2 class="text-4xl font-bold text-blue-700">
                  Search your job oppertunities
                </h2>
                <p class="mt-3">
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde,
                  consequatur.
                </p>
              </div>

              <?php if(!isset($internship)){ ?>
            <div
                class="flex justify-center mx-auto my-5 px-5 max-w-[600px] ring-1 rounded-3xl shadow-xl"
              >
                <form action="" method="GET" class="flex gap-3 flex-col md:flex-row items-center">
                  <div class="flex gap-3 items-center px-1 my-1 md:my-0">
                    <i class="fa-solid fa-building text-base md:text-lg"></i>
                    <select
                      class="py-3 rounded-3xl md:px-3 px-16 bg-gray-50"
                      placeholder="Seacrh for Location"
                      type="text"
                      name="jobcat"
                    >
                    <option value="All">-- Select Job Category --</option>
                    <option value="All">All</option>
                    <option value="Full Stack Developer">Full Stack Developer</option>
                    <option value="Front-End Developer">Front-End Developer</option>
                    <option value="Back-End Developer">Back-End Developer</option>
                    <option value="UI/UX Designer">UI/UX Designer</option>
                    <option value="Cloud Engineer">Cloud Engineer</option>
                    <option value="Application Developer">Application Developer</option>
                    <option value="Data Scientist">Data Scientist</option>
                    <option value="AI Developer">AI Developer</option>
                    <option value="Back-End Engineer">Back-End Engineer</option>
                    <option value="Full-Stack Engineer">Full-Stack Engineer</option>
                    <option value="Database Engineer">Database Engineer</option>
                    <option value="Data Entry">Data Entry</option>
                    <option value="Accountant">Accountant</option>
                    <option value="Computer Operator">Computer Operator</option>
                    <option value="Software Developer">Software Developer</option>
                    <option value="Data Analyist">Data Analyist</option>
                  </select>
                  </div>
                  <div class="flex gap-3 items-center px-1 my-1 md:my-0">
                    <i class="fa-solid fa-location-dot text-base md:text-lg"></i>
                    <select
                      class="py-3 rounded-3xl md:px-3 px-16 bg-gray-50"
                      placeholder="Seacrh for Location"
                      type="text"
                      name="state"
                    >
                    <option value="All">-- Select Location --</option>
                    <option value="All">All</option>
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                    <option value="Assam">Assam</option>
                    <option value="Bihar">Bihar</option>
                    <option value="Chhattisgarh">Chhattisgarh</option>
                    <option value="Goa">Goa</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Haryana">Haryana</option>
                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                    <option value="Jharkhand">Jharkhand</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Kerala">Kerala</option>
                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Manipur">Manipur</option>
                    <option value="Meghalaya">Meghalaya</option>
                    <option value="Mizoram">Mizoram</option>
                    <option value="Nagaland">Nagaland</option>
                    <option value="Odisha">Odisha</option>
                    <option value="Punjab">Punjab</option>
                    <option value="Rajasthan">Rajasthan</option>
                    <option value="Sikkim">Sikkim</option>
                    <option value="Tamil Nadu">Tamil Nadu</option>
                    <option value="Telangana">Telangana</option>
                    <option value="Tripura">Tripura</option>
                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                    <option value="Uttarakhand">Uttarakhand</option>
                    <option value="West Bengal">West Bengal</option>
                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                    <option value="Chandigarh">Chandigarh</option>
                    <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra</option>
                    <option value="Lakshadweep">Lakshadweep</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Puducherry">Puducherry</option>
                    <option value="Ladakh">Ladakh</option>
                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                  </select>
                  </div>
                  <button name="search" class="hidden md:block">
                    <i
                      class="fa-solid fa-magnifying-glass hover:text-lg duration-100"
                    ></i>
                  </button>
                  <button
                    name="search"
                    class="block md:hidden px-36 py-2 my-2 bg-blue-900 text-white hover:bg-white hover:ring-1 hover:text-blue-900 duration-300 rounded-3xl border"
                  >
                    Search
                  </button>
                </form>
              </div>
            </div>
            <?php } ?>
          </div>


            <?php if($count > 0){ ?>
              <div>
                <h2 class="text-3xl font-bold text-center text-gray-600 my-16">All Available Jobs</h2>
              </div>
            <?php } ?>
            
          <?php if(!isset($internship)){ ?>
            <div>
              <div class="mt-10">
              <?php
              // Fetch job listings
              $valid = "valid";
              $verified = "verified";
              if($jobcat == "All" && $state == "All"){
                $sel = "SELECT recruiter.cname, recruiter.email, jobs.* 
                FROM recruiter 
                INNER JOIN jobs ON recruiter.cid = jobs.rid WHERE verify='$verified' AND valid='$valid'";  
              } else {
                $sel = "SELECT recruiter.cname, recruiter.email, jobs.* 
                FROM recruiter 
                INNER JOIN jobs ON recruiter.cid = jobs.rid WHERE verify='$verified' AND valid='$valid' AND jobs.state='$state' AND jcat='$jobcat'";  
              }            
              $rs = $con->query($sel);
              while ($row = $rs->fetch_assoc()) { $count++
              ?>
              <!-- Job Button -->

              <div  class="text-start">
                <div class="grid grid-cols-1 gap-5 shadow-xl mt-5">
                  <div class="h-full ring-1 ring-gray-400 p-6 rounded-xl flex flex-col gap-3">
                  <a href="jobDetails.php?jid=<?php echo $row['jid'] ?>">
                    <div class="flex flex-col items-start">
                    
                      <div class="flex justify-between w-full">
                        <h3 class="text-2xl text-blue-800 font-bold"><?php echo $row['role']; ?>, Exprience : <?php echo $row['exp']; ?></h3>
                        <p class="px-4 py-2 rounded-lg bg-blue-900 text-white font-semibold hover:ring-1 hover:ring-blue-900 hover:bg-white hover:text-blue-900 duration-200 ease-linear">Show Details</p>
                      </div>
                      <p><?php echo $row['cname']; ?></p>
                      <p><?php echo $row['city']; ?>, <?php echo $row['state']; ?></p>
                      
                    </div>
                    </a>
                    <div class="flex items-start">
                      <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10"><?php echo $row['type']; ?></span>
                    </div>
                    <div class="mini-description text-sm flex">
                      <p>Project Role : 
                        <?php
                        if (strlen($row['about']) > 300) {
                          echo substr($row['about'], 0, 300) . "...";
                        } else {
                          echo $row['about'];
                        }
                        ?>
                      </p>
                    </div>
                    <div><p class="text-gray-700 text-sm">Salary: 
                      <?php
                      if ($row['min_salary'] == 0 && $row['max_salary'] == 0) {
                        echo "Not disclosed";
                      } else {
                        echo "₹ " . $row['min_salary'] . " - ₹ " . $row['max_salary'];
                      }
                      ?>
                    </p></div>
                    <div><p class="text-gray-400 text-sm">Posted 4 days ago</p></div>
                  </div>
                </div>
              </div>
              <?php } ?>
              </div>
            </div>
          <?php } ?>


          <?php if($count == 0 && !isset($internship)){ ?>
            <div class="h-[40vh] flex justify-center items-center">
              <h2 class="text-3xl font-bold text-center text-gray-600 my-10">No Available Jobs</h2>
            </div>
          <?php } ?>



          <!-- Internship -->

          <?php if(isset($internship)){ ?>
           <div>
            <div>
              <div class="mt-10">
              <?php
              // Fetch job listings
              $valid = "valid";
              $verified = "verified";
                $sel = "SELECT recruiter.cname, recruiter.email, jobs.* 
                FROM recruiter 
                INNER JOIN jobs ON recruiter.cid = jobs.rid WHERE verify='$verified' AND valid='$valid' AND type='$internship'";        
              $rs = $con->query($sel);
              while ($row = $rs->fetch_assoc()) { $counti++
              ?>
              <!-- Job Button -->

              <div  class="text-start">
                <div class="grid grid-cols-1 gap-5 shadow-xl mt-5">
                  <div class="h-full ring-1 ring-gray-400 p-6 rounded-xl flex flex-col gap-3">
                  <a href="jobDetails.php?jid=<?php echo $row['jid'] ?>">
                    <div class="flex flex-col items-start">
                    
                      <div class="flex justify-between w-full">
                        <h3 class="text-2xl text-blue-800 font-bold"><?php echo $row['role']; ?>, Exprience : <?php echo $row['exp']; ?></h3>
                        <p class="px-4 py-2 rounded-lg bg-blue-900 text-white font-semibold hover:ring-1 hover:ring-blue-900 hover:bg-white hover:text-blue-900 duration-200 ease-linear">Show Details</p>
                      </div>
                      <p><?php echo $row['cname']; ?></p>
                      <p><?php echo $row['city']; ?>, <?php echo $row['state']; ?></p>
                      
                    </div>
                    </a>
                    <div class="flex items-start">
                      <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10"><?php echo $row['type']; ?></span>
                    </div>
                    <div class="mini-description text-sm flex">
                      <p>Project Role : 
                        <?php
                        if (strlen($row['about']) > 300) {
                          echo substr($row['about'], 0, 300) . "...";
                        } else {
                          echo $row['about'];
                        }
                        ?>
                      </p>
                    </div>
                    <div><p class="text-gray-700 text-sm">Salary: 
                      <?php
                      if ($row['min_salary'] == 0 && $row['max_salary'] == 0) {
                        echo "Not disclosed";
                      } else {
                        echo "₹ " . $row['min_salary'] . " - ₹ " . $row['max_salary'];
                      }
                      ?>
                    </p></div>
                    <div><p class="text-gray-400 text-sm">Posted 4 days ago</p></div>
                  </div>
                </div>
              </div>
              <?php } ?>
              </div>
            </div>
           </div>
          <?php } ?>


          <?php if($counti == 0 && isset($internship)){ ?>
            <div class="h-[40vh] flex justify-center items-center">
              <h2 class="text-3xl font-bold text-center text-gray-600 my-10">No Available Internships</h2>
            </div>
          <?php } ?>




      </div>
      </div>
    <?php include("includes/footer.php"); ?>
  </body>
</html>
