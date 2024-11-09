<?php
session_start();
include("db/db.php");
if(!isset($_SESSION['email'])){
  header("location: login.php");
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
        <div class="p-10">
          <h2 class="text-3xl text-gray-500">List Job to Jobify</h2>

                    <!--
            This example requires some changes to your config:
            
            ```
            // tailwind.config.js
            module.exports = {
                // ...
                plugins: [
                // ...
                require('@tailwindcss/forms'),
                ],
            }
            ```
            -->
            <?php 
            $jid=$_GET['jid'];
            $sel = "SELECT * FROM jobs WHERE jid='$jid'";
            $rs = $con->query($sel);
            $row=$rs->fetch_assoc();
            ?>
            <form action="operations/jobs/upd.php" method="post">
            <div class="space-y-12">

                <div class="border-b border-gray-900/10 pb-12 mt-10">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Job Information</h2>

                <input type="text" name="jid" value="<?php echo $row['jid']; ?>" hidden>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-full">
                    <label for="jobrole" class="block text-sm font-medium leading-6 text-gray-900">Job Role</label>
                    <div class="mt-2">
                        <input type="text" value="<?php echo $row['role']; ?>" name="jobrole" id="jobrole" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    </div>
                    </div>

                    <div class="sm:col-span-3">
                    <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Job Type</label>
                    <div class="mt-2">
                        <select id="country" name="jobtype" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option value="Full Time" <?php if($row['type'] == 'Full Time') echo 'selected'; ?>>Full Time</option>
                            <option value="Part Time" <?php if($row['type'] == 'Part Time') echo 'selected'; ?>>Part Time</option>
                            <option value="Night Shift" <?php if($row['type'] == 'Night Shift') echo 'selected'; ?>>Night Shift</option>
                            <option value="Internship" <?php if($row['type'] == 'Internship') echo 'selected'; ?>>Internship</option>
                        </select>
                    </div>
                    </div>

                    <div class="sm:col-span-3">
                    <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Job Category</label>
                    <div class="mt-2">
                        <select id="country" name="jobcat" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-sm sm:leading-6">
                        <option value="Full Stack Developer" <?php if($row['jcat'] == 'Full Stack Developer') echo 'selected' ?>>Full Stack Developer</option>
                        <option value="Front-End Developer" <?php if($row['jcat'] == 'Front-End Developer') echo 'selected' ?>>Front-End Developer</option>
                        <option value="Back-End Developer" <?php if($row['jcat'] == 'Back-End Developer') echo 'selected' ?>>Back-End Developer</option>
                        <option value="UI/UX Designer" <?php if($row['jcat'] == 'UI/UX Designer') echo 'selected' ?>>UI/UX Designer</option>
                        <option value="Cloud Engineer" <?php if($row['jcat'] == 'Cloud Engineer') echo 'selected' ?>>Cloud Engineer</option>
                        <option value="Application Developer" <?php if($row['jcat'] == 'Application Developer') echo 'selected' ?>>Application Developer</option>
                        <option value="Data Scientist" <?php if($row['jcat'] == 'Data Scientist') echo 'selected' ?>>Data Scientist</option>
                        <option value="AI Developer" <?php if($row['jcat'] == 'AI Developer') echo 'selected' ?>>AI Developer</option>
                        <option value="Back-End Engineer" <?php if($row['jcat'] == 'Back-End Engineer') echo 'selected' ?>>Back-End Engineer</option>
                        <option value="Full-Stack Engineer" <?php if($row['jcat'] == 'Full-Stack Engineer') echo 'selected' ?>>Full-Stack Engineer</option>
                        <option value="Database Engineer" <?php if($row['jcat'] == 'Database Engineer') echo 'selected' ?>>Database Engineer</option>
                        <option value="Data Entry" <?php if($row['jcat'] == 'Data Entry') echo 'selected' ?>>Data Entry</option>
                        <option value="Accountant" <?php if($row['jcat'] == 'Accountant') echo 'selected' ?>>Accountant</option>
                        <option value="Computer Operator" <?php if($row['jcat'] == 'Computer Operator') echo 'selected' ?>>Computer Operator</option>
                        <option value="Software Developer" <?php if($row['jcat'] == 'Software Developer') echo 'selected' ?>>Software Developer</option>
                        <option value="Data Analyist" <?php if($row['jcat'] == 'Data Analyist') echo 'selected' ?>>Data Analyist</option>
                        </select>
                    </div>
                    </div>

                    <div class="sm:col-span-full">
                    <label for="exprience" class="block text-sm font-medium leading-6 text-gray-900">Exprience</label>
                    <div class="mt-2">
                        <select id="exprience" name="exprience" autocomplete="exprience" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-sm sm:leading-6">
                        <option value="Freshers" <?php if($row['exp'] == "Freshers") echo 'selected' ?>>Freshers</option>
                        <option value="1 Year" <?php if($row['exp'] == "1 Year") echo 'selected' ?>>1 Year</option>
                        <option value="2 Year" <?php if($row['exp'] == "2 Year") echo 'selected' ?>>2 Year</option>
                        <option value="3 Year" <?php if($row['exp'] == "3 Year") echo 'selected' ?>>3 Year</option>
                        <option value="5 Year" <?php if($row['exp'] == "5 Year") echo 'selected' ?>>5 Year</option>
                        <option value="7 Year" <?php if($row['exp'] == "7 Year") echo 'selected' ?>>7 Year</option>
                        <option value="8 Year" <?php if($row['exp'] == "8 Year") echo 'selected' ?>>8 Year</option>
                        <option value="10 Year" <?php if($row['exp'] == "10 Year") echo 'selected' ?>>10 Year</option>
                        <option value="12 Year" <?php if($row['exp'] == "12 Year") echo 'selected' ?>>12 Year</option>
                        <option value="15 Year" <?php if($row['exp'] == "15 Year") echo 'selected' ?>>15 Year</option>
                        </select>
                    </div>
                    </div>

                    <div class="sm:col-span-2">
                    <label for="min" class="block text-sm font-medium leading-6 text-gray-900">Min. Salary</label>
                    <div class="mt-2">
                        <input value="<?php echo $row['min_salary']; ?>" type="number" name="min" id="min" autocomplete="postal-code" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    </div>
                    </div>

                    <div class="sm:col-span-2">
                    <label for="max" class="block text-sm font-medium leading-6 text-gray-900">Max. Salary</label>
                    <div class="mt-2">
                        <input value="<?php echo $row['max_salary']; ?>" type="number" name="max" id="max" autocomplete="postal-code" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    </div>
                    </div>

                    <div class="border-b border-gray-900/10 pb-12 col-span-full">
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="col-span-full">
                            <label for="about" class="block text-sm font-medium leading-6 text-gray-900">About</label>
                                <div class="mt-2">
                                    <textarea id="about" name="about" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"><?php echo $row['about']; ?></textarea>
                                </div>
                            <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about job role.</p>
                            </div>
                        </div>


                    </div>

                    <div class="sm:col-span-3">
                    <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Country</label>
                    <div class="mt-2">
                        <input value="<?php echo $row['country']; ?>" id="country" name="country" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-sm sm:leading-6"/>
                    </div>
                    </div>

                    <div class="sm:col-span-2 sm:col-start-1">
                    <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City</label>
                    <div class="mt-2">
                        <input value="<?php echo $row['city']; ?>" type="text" name="city" id="city" autocomplete="address-level2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    </div>
                    </div>

                    <div class="sm:col-span-2">
                    <label for="region" class="block text-sm font-medium leading-6 text-gray-900">State / Province</label>
                    <div class="mt-2">
                    <select
                            class="py-3 rounded-3xl md:px-3 px-16 bg-gray-50"
                            placeholder="Seacrh for Location"
                            type="text"
                            name="state"
                            id="state"
                        >
                        <option value="">-- Select Location --</option>
                        <option value="Andhra Pradesh" <?php if($row['state'] == "Andhra Pradesh") echo 'selected' ?>>Andhra Pradesh</option>
                        <option value="Arunachal Pradesh" <?php if($row['state'] == "Arunachal Pradesh") echo 'selected' ?>>Arunachal Pradesh</option>
                        <option value="Assam" <?php if($row['state'] == "Assam") echo 'selected' ?>>Assam</option>
                        <option value="Bihar" <?php if($row['state'] == "Bihar") echo 'selected' ?>>Bihar</option>
                        <option value="Chhattisgarh" <?php if($row['state'] == "Chhattisgarh") echo 'selected' ?>>Chhattisgarh</option>
                        <option value="Goa" <?php if($row['state'] == "Goa") echo 'selected' ?>>Goa</option>
                        <option value="Gujarat" <?php if($row['state'] == "Gujarat") echo 'selected' ?>>Gujarat</option>
                        <option value="Haryana" <?php if($row['state'] == "Haryana") echo 'selected' ?>>Haryana</option>
                        <option value="Himachal Pradesh" <?php if($row['state'] == "Himachal Pradesh") echo 'selected' ?>>Himachal Pradesh</option>
                        <option value="Jharkhand" <?php if($row['state'] == "Jharkhand") echo 'selected' ?>>Jharkhand</option>
                        <option value="Karnataka" <?php if($row['state'] == "Karnataka") echo 'selected' ?>>Karnataka</option>
                        <option value="Kerala" <?php if($row['state'] == "Kerala") echo 'selected' ?>>Kerala</option>
                        <option value="Madhya Pradesh" <?php if($row['state'] == "Madhya Pradesh") echo 'selected' ?>>Madhya Pradesh</option>
                        <option value="Maharashtra" <?php if($row['state'] == "Maharashtra") echo 'selected' ?>>Maharashtra</option>
                        <option value="Manipur" <?php if($row['state'] == "Manipur") echo 'selected' ?>>Manipur</option>
                        <option value="Meghalaya" <?php if($row['state'] == "Meghalaya") echo 'selected' ?>>Meghalaya</option>
                        <option value="Mizoram" <?php if($row['state'] == "Mizoram") echo 'selected' ?>>Mizoram</option>
                        <option value="Nagaland" <?php if($row['state'] == "Nagaland") echo 'selected' ?>>Nagaland</option>
                        <option value="Odisha" <?php if($row['state'] == "Odisha") echo 'selected' ?>>Odisha</option>
                        <option value="Punjab" <?php if($row['state'] == "Punjab") echo 'selected' ?>>Punjab</option>
                        <option value="Rajasthan" <?php if($row['state'] == "Rajasthan") echo 'selected' ?>>Rajasthan</option>
                        <option value="Sikkim" <?php if($row['state'] == "Sikkim") echo 'selected' ?>>Sikkim</option>
                        <option value="Tamil Nadu" <?php if($row['state'] == "Tamil Nadu") echo 'selected' ?>>Tamil Nadu</option>
                        <option value="Telangana" <?php if($row['state'] == "Telangana") echo 'selected' ?>>Telangana</option>
                        <option value="Tripura" <?php if($row['state'] == "Tripura") echo 'selected' ?>>Tripura</option>
                        <option value="Uttar Pradesh" <?php if($row['state'] == "Uttar Pradesh") echo 'selected' ?>>Uttar Pradesh</option>
                        <option value="Uttarakhand" <?php if($row['state'] == "Uttarakhand") echo 'selected' ?>>Uttarakhand</option>
                        <option value="West Bengal" <?php if($row['state'] == "West Bengal") echo 'selected' ?>>West Bengal</option>
                        <option value="Andaman and Nicobar Islands" <?php if($row['state'] == "Andaman and Nicobar Islands") echo 'selected' ?>>Andaman and Nicobar Islands</option>
                        <option value="Chandigarh" <?php if($row['state'] == "Chandigarh") echo 'selected' ?>>Chandigarh</option>
                        <option value="Dadra and Nagar Haveli and Daman and Diu" <?php if($row['state'] == "Dadra and Nagar Haveli and Daman and Diu") echo 'selected' ?>>Dadra</option>
                        <option value="Lakshadweep" <?php if($row['state'] == "Lakshadweep") echo 'selected' ?>>Lakshadweep</option>
                        <option value="Delhi" <?php if($row['state'] == "Delhi") echo 'selected' ?>>Delhi</option>
                        <option value="Puducherry" <?php if($row['state'] == "Puducherry") echo 'selected' ?>>Puducherry</option>
                        <option value="Ladakh" <?php if($row['state'] == "Ladakh") echo 'selected' ?>>Ladakh</option>
                        <option value="Jammu and Kashmir" <?php if($row['state'] == "Jammu and Kashmir") echo 'selected' ?>>Jammu and Kashmir</option>
                    </select>
                    </div>
                    </div>

                    <div class="sm:col-span-2">
                    <label for="pin" class="block text-sm font-medium leading-6 text-gray-900">ZIP / Postal code</label>
                    <div class="mt-2">
                        <input value="<?php echo $row['pin']; ?>" type="text" name="pin" id="pin" autocomplete="postal-code" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                    </div>
                    </div>
                    
                </div>
                </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                <button type="submit" name="save" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Save</button>
            </div>
            </form>

        </div>
      </div>
    </div>
  </body>
</html>
