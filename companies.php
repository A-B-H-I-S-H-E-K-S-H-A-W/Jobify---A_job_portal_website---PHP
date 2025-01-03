<?php
session_start();
include("admin/db/db.php");
if(isset($_SESSION['email_id'])){
  $emailopt = $_SESSION['email_id'];
}
$res = "all";
if(isset($_GET['search'])){
  $input = $_GET['inputSearch'];

  $trim = trim($input);
  $lower = strtolower($trim);

  $str = $lower;

  $pattern = "/" . preg_quote($str, '/') . "/i";

  $select = "SELECT * FROM recruiter WHERE verify='verified'";
  $rss = $con->query($select);
  $rows = array();
  while ($rowe = $rss->fetch_assoc()) {
    $rows[] = $rowe['cname'];
  }

  $res = null;
  foreach($rows as $ele){
    if(preg_match($pattern, $ele)){
      $res = $ele;
      break;
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
                  Search for top companies
                </h2>
                <p class="mt-3">
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde,
                  consequatur.
                </p>
              </div>
              <div
                class="flex justify-center mx-auto my-5 px-5 max-w-[400px] ring-1 rounded-3xl shadow-xl"
              >
                <form action="" method="GET" class="flex gap-3 flex-col md:flex-row items-center">
                  <div class="flex gap-3 items-center px-1 my-1 md:my-0">
                    <i class="fa-solid fa-building text-base md:text-lg"></i>
                    <input placeholder="Search Company" type="text" name="inputSearch" class="py-3 rounded-3xl md:px-10 px-16 bg-gray-50" id="">
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
          </div>




          <div>
            <h2 class="text-3xl font-bold text-gray-600 my-16">All Available Companies</h2>
          </div>

              
          <?php
          // Fetch company listings

          if($res == "all"){
            $seli = "SELECT * FROM recruiter WHERE verify='verified' ";
          } else {
            $seli = "SELECT * FROM recruiter WHERE verify='verified' AND cname='$res'";
          }
          $rsi = $con->query($seli);
          $countCompany = 0;
          while ($row = $rsi->fetch_assoc()) { $countCompany++
          ?>
          <!-- Comapny Card -->
          <div  class="text-start">
            <div class="grid grid-cols-1 gap-5 shadow-xl mt-5">
              <div class="h-full ring-1 ring-gray-400 p-6 rounded-xl flex flex-col gap-3">

              <?php if(isset($_SESSION['email'])){ ?>
              <a href="perjob.php?jid=<?php echo $row['cid'] ?>">
                <div class="flex flex-col items-start">
                
                  <div class="flex justify-between w-full">
                    <h3 class="text-2xl text-blue-800 font-bold"><?php echo $row['cname']; ?></h3>
                    <p class="px-4 py-2 rounded-lg bg-blue-900 text-white font-semibold hover:ring-1 hover:ring-blue-900 hover:bg-white hover:text-blue-900 duration-200 ease-linear">About Company</p>
                  </div>
                  <p><?php echo $row['city']; ?>, <?php echo $row['state']; ?></p>
                  <p>Total job openings : <?php
                  $count = 0; 
                  $cid = $row['cid'];
                  $sel = "SELECT * FROM jobs WHERE rid='$cid'";
                  $rs = $con->query($sel);
                  while ($row = $rs->fetch_assoc()) {
                    if($cid == $row['rid']){
                      $count += 1;
                    } 
                  }
                  echo $count;
                  ?></p>
                  
                </div>
              </a>
                <?php } else { ?>
                      <div class="flex flex-col items-start">
                      
                        <div class="flex justify-between w-full">
                          <h3 class="text-2xl text-blue-800 font-bold"><?php echo $row['cname']; ?></h3>
                          <button onclick="openModal('modelConfirm')"  class="px-4 py-2 rounded-lg bg-blue-900 text-white font-semibold hover:ring-1 hover:ring-blue-900 hover:bg-white hover:text-blue-900 duration-200 ease-linear">About Company</button>
                        </div>
                        <p><?php echo $row['city']; ?>, <?php echo $row['state']; ?></p>
                        <p>Total job openings : <?php
                        $count = 0; 
                        $cid = $row['cid'];
                        $sel = "SELECT * FROM jobs WHERE rid='$cid'";
                        $rs = $con->query($sel);
                        while ($row = $rs->fetch_assoc()) {
                          if($cid == $row['rid']){
                            $count += 1;
                          } 
                        }
                        echo $count;
                        ?></p>
                        
                      </div>
                <?php } ?>
                </div>
                </div>
              </div>
          <?php } ?>

          <?php if($countCompany == 0){ ?>
            <div class="h-[40vh]">
            <div class="flex justify-center items-center">
              <h2 class="text-3xl text-blue-900 font-semibold">No Companies Found</h2>
            </div>
          </div>
          <?php } ?>

          <!-- Model Box -->

          <div id="modelConfirm" class="fixed hidden top-0 z-50 inset-0 h-full w-full px-4">
                <div class="relative top-10 mx-auto shadow-2xl rounded-md border bg-white max-w-md">
                    <div class="flex justify-end p-2">
                        <button onclick="closeModal('modelConfirm')" type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1 ml-auto inline-flex items-center">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="p-6 pt-0 flex flex-col">
                        <h2 class="text-2xl text-center font-bold mb-5 text-blue-900">Alert Message from Jobify</h2>
                        <!-- Content Area -->
                        <span class="text-start text-lg font-medium mb-3 text-red-700 p-2 rounded-lg">Warning : Login First to Access</span>
                        <div class="text-end">
                          <button onclick="closeModal('modelConfirm')" type="button" class="px-4 py-2 rounded-lg bg-red-700 text-white font-semibold hover:ring-1 hover:ring-red-900 hover:bg-white hover:text-red-900 duration-300 ease-linear">Close</button>
                        </div>
                    </div>
                </div>
            </div>
          </div>

    <?php include("includes/footer.php"); ?>
    <script src="index.js" type="text/javascript" ></script>
  </body>
</html>
