<div class="bg-blue-900 w-[230px] h-[100vh] sticky top-0 left-0 bottom-0 shadow-lg">
        <ul class="flex flex-col text-gray-400 gap-5 px-5 py-10 justify-center">
          <li class="flex">
            <h1 class="text-white text-3xl font-bold px-3">Jobify</h1>
            <p class="text-white font-bold">Find Jobs</p>
          </li>
          <a href="dashboard.php" class="p-2 active:text-white">
            <li class="mt-10 flex items-center gap-3 hover:text-white duration-300">
              <i class="fa-solid fa-house"></i>
              <h2 class="text-lg font-semibold">Dashboard</h2>
            </li>
          </a>

          <?php 
            $id= $_SESSION['cid'];
            $sel = "SELECT * FROM recruiter WHERE cid='$id'";
            $rs=$con->query($sel);
            $row=$rs->fetch_assoc();
          ?>
          <?php if($row['verify'] == 'Verified'){ ?>
          <a href="addjob.php" class="p-2 active:text-white">
            <li class="flex items-center gap-3 hover:text-white duration-300">
              <i class="fa-solid fa-address-card"></i>
              <h2 class="text-lg font-semibold">List Job</h2>
            </li>
          </a>
          <a href="notification.php" class="p-2 active:text-white">
            <li class="flex items-center gap-3 hover:text-white duration-300">
              <i class="fa-solid fa-check"></i>
              <h2 class="text-lg font-semibold">Notifications</h2>
            </li>
          </a>
          <a href="listjob.php" class="p-2 active:text-white">
            <li class="flex items-center gap-3 hover:text-white duration-300 ">
              <i class="fa-solid fa-list"></i>
              <h2 class="text-lg font-semibold">All Listed Jobs</h2>
            </li>
          </a>

          <?php } ?>


          <a href="settings.php" class="p-2 active:text-white">
            <li class="flex items-center gap-3 hover:text-white duration-300 ">
              <i class="fa-solid fa-gear"></i>
              <h2 class="text-lg font-semibold">Settings</h2>
            </li>
          </a>
        </ul>
      </div>