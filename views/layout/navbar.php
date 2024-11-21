<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet' />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
    <title>Document</title>
</head>

<body>
    <header class="flex justify-between h-[130px] items-center px-40 bg-white drop-shadow-lg ">
        <div class="w-[150px]">
            <a href="?controller=home">
                <img src="imgs/Logo.png" class="w-full" alt="">
            </a>
        </div>
        <div class="flex items-center gap-x-[50px] text-gray-700 ">
        <div class="flex items-center gap-x-10 text-[24px]">
                <a href="?controller=home" class="hover:text-3xl hover:text-zinc-400 transition-all">Home</a>
                <a href="" class="hover:text-3xl hover:text-zinc-400 transition-all">Product</a>
                <a href="" class="hover:text-3xl hover:text-zinc-400 transition-all">Shop</a>
            </div>
            <div class="h-[50px] w-[2px] bg-[rgba(0,0,0,0.6)]"></div>
            <div class="flex items-center gap-x-[30px] text-3xl">


                <a href="?controller=cart"><i
                        class='bx bx-cart hover:text-3xl hover:text-zinc-300 transition-all'></i></a>

                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                    class=" text-gray-800 bg-gray-300 hover:bg-gray-600 hover:text-white font-bold rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center transition-all"
                    type="button"> <i class='bx bxs-user-account hover:text-3xl hover:text-zinc-300 transition-all'></i>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdown"
                    class="z-10 hidden bg-gray-600 divide-y divide-gray-100 rounded-lg shadow w-28 items-center dark:bg-gray-700">
                    <ul class="py-2 text-sm text-white dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="?controller=orderBrowsing"
                                class="flex items-center gap-1 px-4 py-2  dark:hover:bg-gray-600 dark:hover:text-white">
                                <i class='bx bx-cart'></i>
                                MyOrder
                            </a>
                        </li>
                        <li>
                            <a href="?controller=customer&action=logout"
                                class="flex items-center gap-1 px-4 py-2  dark:hover:bg-gray-600 dark:hover:text-white">
                                <i class='bx bx-log-out text-base'></i>
                                Sign out
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

    </header>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>

</body>

</html>