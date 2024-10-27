<header class="px-5 w-full shadow-lg">
      <div
        class="md:max-w-[1280px] mx-auto flex justify-between h-20 items-center"
      >
        <div class="flex gap-10 items-center">
          <h1 class="text-blue-900 text-3xl font-bold">Jobify</h1>
          <div class="hidden md:block">
            <ul class="flex gap-5 text-lg">
              <li><a href="index.php">Home</a></li>
              <li><a href="jobs.php">Jobs</a></li>
              <li><a href="">Companies</a></li>
            </ul>
          </div>
        </div>
        <div class="flex items-center gap-5">
        <?php
        if(!isset($data)){ ?>
          <div class="flex gap-4">
          <a href="Login.php" class="px-4 py-2 rounded-lg ring-1 ring-black">
            Login
          </a>
          <a href="signup.php"
            class="px-4 py-2 rounded-lg bg-blue-900 text-white font-semibold hover:ring-1 hover:ring-blue-900 hover:bg-white hover:text-blue-900 duration-300 ease-linear"
          >
            Sign-Up
          </a>
        </div>
        <?php }else{ ?>
          <h2><?php echo $row['email']; ?></h2>
          <?php if(!isset($row['profile'])){ ?>
            <img src="uploads/<?php echo $row['profile']; ?>" alt="Profile">
          <?php } else { ?>
            <img class="w-10 rounded-full ring-1" src="uploads/user.jpg" alt="Profile">
          <?php } ?>
       <?php } ?>
        </div>
      </div>
    </header>