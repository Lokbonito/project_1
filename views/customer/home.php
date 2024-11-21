<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <title>Home</title>

    <style>
        html,
        body {
            position: relative;
            height: 100%;
        }

        body {
            background: #eee;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            color: #000;
            margin: 0;
            padding: 0;
        }

        .swiper {
            width: 100%;
            height: 586px;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .swiper-button-prev1,
        .swiper-button-next1 {
            position: absolute;
            top: 50%;
            z-index: 10;
            transform: translateY(-50%);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body class="bg-white">
    <?php include_once 'views/layout/navbar.php' ?>
    <div class="mt-20"></div>
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php foreach ($slides as $slide) {  ?>
                <div class="swiper-slide">
                    <div class="flex gap-x-32 px-[85px] items-center ">
                        <div class="w-[713px]">
                            <img src="imgs/<?= $slide['image'] ?>" class="w-full " alt="">
                        </div>
                        <div class="flex-1 text-start">
                            <h2 class="font-medium text-[44px] mb-4"><?= $slide['name']  ?></h2>
                            <p class="text-lg mb-[50px]"><?= $slide['description'] ?></p>

                            <button class="py-2 px-8 text-2xl border rounded-[37px] hover:px-10 border-black hover:text-white hover:bg-green-500 transition-all"><a href="?controller=productDetail&id=<?= $slide['id'] ?>">Details</a></button>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="swiper-button-next1 right-8">
            <svg width="18" height="26" viewBox="0 0 18 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.84849 25.3438L16.5922 14.4234C16.7975 14.2474 16.9623 14.0291 17.0753 13.7834C17.1883 13.5377 17.2468 13.2704 17.2468 13C17.2468 12.7296 17.1883 12.4623 17.0753 12.2166C16.9623 11.9709 16.7975 11.7526 16.5922 11.5766L3.84849 0.65626C2.63208 -0.385928 0.753174 0.478135 0.753174 2.0797V23.9234C0.753174 25.525 2.63208 26.3891 3.84849 25.3438Z" fill="black" fill-opacity="0.5" />
            </svg>
        </div>
        <div class="swiper-button-prev1 left-8">
            <svg width="18" height="26" viewBox="0 0 18 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.1516 0.656241L1.40782 11.5766C1.20252 11.7526 1.03772 11.9709 0.924739 12.2166C0.811753 12.4623 0.753253 12.7296 0.753253 13C0.753253 13.2704 0.811753 13.5377 0.924739 13.7834C1.03772 14.0291 1.20252 14.2474 1.40782 14.4234L14.1516 25.3437C15.368 26.3859 17.2469 25.5219 17.2469 23.9203L17.2469 2.07655C17.2469 0.474991 15.368 -0.389072 14.1516 0.656241Z" fill="black" fill-opacity="0.5" />
            </svg>
        </div>
    </div>

    <div class="h-[1px] w-full bg-[#000]"></div>

    <div class="mt-[150px] mx-[238px]">
        <div class="flex justify-between mb-[38px]">
            <h1 class="border-b-2 border-black text-3xl">New Product</h1>

            <form action="?controller=home" method="post">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative w-[500px]">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="search" id="default-search" name="name_category" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required>
                    <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>
        </div>

        <div class="!grid !grid-cols-4 gap-4 w-full ">
            <?php if (isset($_POST['name_category'])) {
                foreach ($new_product as $product) {
            ?>
                    <div class="border border-gray-600 rounded-xl">
                        <img src="imgs/<?= $product['image'] ?>" class="my-6">
                        <div class="mx-auto p-[26px]">
                            <h1 class="text-xl "><?= $product['name'] ?></h1>
                            <p class="text-red-600 text-2xl font-semibold text-right my-2">$<?= $product['price'] ?></p>
                            <div class="flex items-center  gap-x-[18px]">

                                <button class="border border-black w-[115px] py-2 font-semibold hover:w-[150px] hover:text-white hover:bg-green-500 rounded-xl transition-all"> <a href="?controller=cart&action=addToCart&id=<?= $product['id'] ?>">Add to cart </a></button>

                                <button class="border border-black bg-black text-white w-[115px] py-2 font-semibold hover:w-[150px] hover:text-black hover:bg-gray-500 rounded-xl transition-all"><a href="?controller=productDetail&id=<?= $product['id'] ?>">More</a> </button>
                            </div>
                        </div>
                    </div>
                <?php
                }
            } elseif (!isset($_POST['name_category'])) {
                foreach ($new_product as $product) { ?>
                    <div class="border border-gray-600 rounded-xl">
                        <img src="imgs/<?= $product['image'] ?>" class="my-6">
                        <div class="mx-auto p-[26px]">
                            <h1 class="text-xl "><?= $product['name'] ?></h1>
                            <p class="text-red-600 text-2xl font-semibold text-right my-2">$<?= $product['price'] ?></p>
                            <div class="flex items-center  gap-x-[18px]">

                                <button class="border border-black w-[115px] py-2 font-semibold hover:w-[150px] hover:text-white hover:bg-green-500 rounded-xl transition-all"> <a href="?controller=cart&action=addToCart&id=<?= $product['id'] ?>">Add to cart </a></button>

                                <button class="border border-black bg-black text-white w-[115px] py-2 font-semibold hover:w-[150px] hover:text-black hover:bg-gray-500 rounded-xl transition-all"><a href="?controller=productDetail&id=<?= $product['id'] ?>">More</a> </button>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>

    <div class="mt-[55px] mx-[238px]">
        <div class="flex gap-x-[29px] mb-[38px]">
            <h1 class="border-b-2 border-black text-3xl">ROOM</h1>
            <button class="text-gray-700 text-sm">See all <i class='bx bx-caret-right'></i></button>
        </div>
        <div class="grid grid-cols-2 gap-4 w-full ">
            <div class="relative">
                <img src="imgs/livingroom.webp" class=" rounded-xl">
                <div class="absolute bottom-[28px] left-[218px] text-4xl my-[14px] text-white hover:text-pink-400 hover:text-5xl transition-all">
                    <a href="#">
                        <h1 class=" font-bold">livingroom</h1>
                    </a>
                </div>
            </div>
            <div class="relative">
                <img src="imgs/bedroom.jpg" class="rounded-xl">
                <div class="absolute top-[28px] right-10 text-4xl my-[5px] text-white hover:text-pink-400 hover:text-5xl transition-all ">
                    <a href="#">
                        <h1 class=" font-bold">bedroom</h1>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'views/layout/footer.php' ?>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            navigation: {
                nextEl: ".swiper-button-next1",
                prevEl: ".swiper-button-prev1",
            },
            loop: true
        });
    </script>
</body>

</html>