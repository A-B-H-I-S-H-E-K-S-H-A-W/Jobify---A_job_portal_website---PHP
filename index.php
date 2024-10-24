<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Jobify - Job Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <!-- Header Section -->
    <?php include("includes/header.php"); ?>
    <!-- Header Section Ends -->

    <!-- Hero Section -->
    <section class="w-full mt-20 px-5">
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
        <div
          class="flex justify-center mx-auto my-5 px-5 max-w-[580px] ring-1 rounded-3xl shadow-xl"
        >
          <form class="flex gap-3 flex-col md:flex-row items-center">
            <div class="flex gap-3 items-center px-1 my-1 md:my-0">
              <i class="fa-solid fa-building text-base md:text-lg"></i>
              <input
                class="py-3 rounded-3xl md:px-3 px-16 bg-gray-50"
                placeholder="Seacrh for company, skills"
                type="text"
              />
            </div>
            <div class="flex gap-3 items-center px-1 my-1 md:my-0">
              <i class="fa-solid fa-location-dot text-base md:text-lg"></i>
              <input
                class="py-3 rounded-3xl md:px-3 px-16 bg-gray-50"
                placeholder="Seacrh for Location"
                type="text"
              />
            </div>
            <button class="hidden md:block">
              <i
                class="fa-solid fa-magnifying-glass hover:text-lg duration-100"
              ></i>
            </button>
            <button
              class="block md:hidden px-36 py-2 my-2 bg-blue-900 text-white hover:bg-white hover:ring-1 hover:text-blue-900 duration-300 rounded-3xl border"
            >
              Search
            </button>
          </form>
        </div>
      </div>

      <!-- Card Section -->

      <div class="max-w-[1400px] mx-auto">
        <div class="mt-40">
          <h1 class="text-3xl font-bold ml-5">Top Companies Hiring Now</h1>
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4">
            <div class="e-card playing">
              <div class="image"></div>

              <div class="wave"></div>
              <div class="wave"></div>
              <div class="wave"></div>

              <div class="infotop">
                <br />
                MNCs
                <br />
                <p class="text-base">630 are actively hiring</p>
                <div class="name flex">
                  <img
                    src="images/284798.gif"
                    class="w-12 mx-auto rounded-md"
                    alt=""
                  />
                  <img
                    src="images/1293920.gif"
                    class="w-12 mx-auto rounded-md"
                    alt=""
                  />
                  <img
                    src="images/1714962.gif"
                    class="w-12 mx-auto rounded-md"
                    alt=""
                  />
                  <img
                    src="images/2893828.gif"
                    class="w-12 mx-auto rounded-md"
                    alt=""
                  />
                </div>
              </div>
            </div>
            <div class="e-card playing">
              <div class="image"></div>

              <div class="wave"></div>
              <div class="wave"></div>
              <div class="wave"></div>

              <div class="infotop">
                <br />
                Fintech
                <br />
                <p class="text-base">27 are actively hiring</p>
                <div class="name flex">
                  <img
                    src="images/284798.gif"
                    class="w-12 mx-auto rounded-md"
                    alt=""
                  />
                  <img
                    src="images/1293920.gif"
                    class="w-12 mx-auto rounded-md"
                    alt=""
                  />
                  <img
                    src="images/1714962.gif"
                    class="w-12 mx-auto rounded-md"
                    alt=""
                  />
                  <img
                    src="images/2893828.gif"
                    class="w-12 mx-auto rounded-md"
                    alt=""
                  />
                </div>
              </div>
            </div>
            <div class="e-card playing">
              <div class="image"></div>

              <div class="wave"></div>
              <div class="wave"></div>
              <div class="wave"></div>

              <div class="infotop">
                <br />
                Startups
                <br />
                <p class="text-base">77 are actively hiring</p>
                <div class="name flex">
                  <img
                    src="images/284798.gif"
                    class="w-12 mx-auto rounded-md"
                    alt=""
                  />
                  <img
                    src="images/1293920.gif"
                    class="w-12 mx-auto rounded-md"
                    alt=""
                  />
                  <img
                    src="images/1714962.gif"
                    class="w-12 mx-auto rounded-md"
                    alt=""
                  />
                  <img
                    src="images/2893828.gif"
                    class="w-12 mx-auto rounded-md"
                    alt=""
                  />
                </div>
              </div>
            </div>
            <div class="e-card playing">
              <div class="image"></div>

              <div class="wave"></div>
              <div class="wave"></div>
              <div class="wave"></div>

              <div class="infotop">
                <br />
                B2C
                <br />
                <p class="text-base">53 are actively hiring</p>
                <div class="name flex">
                  <img
                    src="images/284798.gif"
                    class="w-12 mx-auto rounded-md"
                    alt=""
                  />
                  <img
                    src="images/1293920.gif"
                    class="w-12 mx-auto rounded-md"
                    alt=""
                  />
                  <img
                    src="images/1714962.gif"
                    class="w-12 mx-auto rounded-md"
                    alt=""
                  />
                  <img
                    src="images/2893828.gif"
                    class="w-12 mx-auto rounded-md"
                    alt=""
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Card Section Ends -->



      <!-- Top Companies Section -->
      <div class="bg-white py-24 sm:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <h2 class="text-center text-lg font-semibold leading-8 text-gray-900">Trusted by the world’s most innovative Companies</h2>
    <div class="mx-auto mt-10 grid max-w-lg grid-cols-4 items-center gap-x-8 gap-y-10 sm:max-w-xl sm:grid-cols-6 sm:gap-x-10 lg:mx-0 lg:max-w-none lg:grid-cols-5">
      <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1" src="https://tailwindui.com/plus/img/logos/158x48/transistor-logo-gray-900.svg" alt="Transistor" width="158" height="48">
      <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1" src="https://tailwindui.com/plus/img/logos/158x48/reform-logo-gray-900.svg" alt="Reform" width="158" height="48">
      <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1" src="https://tailwindui.com/plus/img/logos/158x48/tuple-logo-gray-900.svg" alt="Tuple" width="158" height="48">
      <img class="col-span-2 max-h-12 w-full object-contain sm:col-start-2 lg:col-span-1" src="https://tailwindui.com/plus/img/logos/158x48/savvycal-logo-gray-900.svg" alt="SavvyCal" width="158" height="48">
      <img class="col-span-2 col-start-2 max-h-12 w-full object-contain sm:col-start-auto lg:col-span-1" src="https://tailwindui.com/plus/img/logos/158x48/statamic-logo-gray-900.svg" alt="Statamic" width="158" height="48">
    </div>
  </div>
</div>

      <!-- Top Companies Section Ends -->

      <div
        class="flex items-center px-5 max-w-[1350px] mt-20 mx-auto border w-full shadow-lg h-80 bg-gradient-to-l from-blue-200 via-blue-400 to-blue-900 rounded-2xl"
      >
        <div class="md:w-[50vw] w-full">
          <h1 class="text-white font-semibold text-3xl mb-5">
            Apply for your dream job now
          </h1>
          <p class="text-white">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quia, esse
            tenetur! Tempora necessitatibus culpa blanditiis. Amet sit, atque,
            repellat sint non exercitationem iusto veniam, corporis in fuga
            earum dolore accusamus!
          </p>
        </div>
        <div class="hidden md:block">
          <img src="images/R (1).png" class="mx-40 w-80 h-80" alt="img" />
        </div>
      </div>
    </section>
    <!-- Hero Section Ends -->

    <!-- Footer Section -->
    <?php include("includes/footer.php"); ?>
    <!-- Footer Section Ends -->
  </body>
</html>
