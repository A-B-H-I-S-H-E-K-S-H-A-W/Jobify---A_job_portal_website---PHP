        <div
          class="h-20 bg-white shadow-xl flex items-center justify-between px-10"
        >
                        <h1 class="text-blue-800 text-xl font-bold px-3"><?php if(isset($_SESSION['cname'])) { echo "Hello, ".$_SESSION['cname']; } else { echo "Greetings!"; } ?></h1>
                        <div class="text-center">
                            <span class="inline-flex items-center rounded-md bg-blue-50 px-4 py-2 font-medium text-blue-700 ring-1 ring-inset ring-blue-600/10">Status : <?php if(isset($row['verify']) == 'Verification Pending'){ echo $row['verify']; } else if(isset($row['verify']) == 'Verified' ) { echo $row['verify']; } else { echo $row['verify']; } ?></span>
                        </div>
        </div>