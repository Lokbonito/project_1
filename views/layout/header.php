<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
    <title>Document</title>
</head>

<body>
    <header class="flex justify-between items-center h-[159px] px-[130px] bg-gray-600 drop-shadow-xl ">

        <div class="flex items-center text-white text-xl font-bold">
            <img src='imgs/—Pngtree—modern abstract 3d logo_4092287.png' class="w-[70px] h-[70px]" />
            <span>ADMIN PAGE</span>
        </div>

        <div class=" flex items-center text-[17px] gap-x-48 pt-[10px] pl-10">
            <div class="flex gap-x-[80px] text-white">
                <a href="?controller=dashboard"><i class='bx bxs-dashboard mx-1'></i>Dashboard</a>
                <a href="?controller=product"><i class='bx bxs-cart mx-1'></i>Product</a>
                <a href="?controller=account"><i class='bx bxs-user mx-1'></i>account</a>
                <a href="?controller=order"><i class='bx bxs-cart-download mx-1'></i>Order</a>
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-gray-500 rounded-lg text-base px-2 py-1 text-center inline-flex items-center  " type="button"> <i class='bx bx-dots-vertical-rounded'></i>Other <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg></button>

                <div id="dropdown" class="z-10 hidden bg-gray-400 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-black" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="?controller=category" class="block px-4 py-2  dark:hover:bg-gray-600 dark:hover:text-white">Category</a>
                        </li>
                        <li>
                            <a href="?controller=room" class="block px-4 py-2  dark:hover:bg-gray-600 dark:hover:text-white">Room</a>
                        </li>
                    </ul>
                </div>

            </div>
            <a href="?controller=admin&action=logout">
                <button class=" flex items-center boder rounded-lg bg-gray-500 h-[47px] w-[132px] text-white hover:bg-gray-800 transition-all"><i class='bx bx-log-out px-3'></i>Sign out</button>
            </a>
        </div>
    </header>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>

</html>