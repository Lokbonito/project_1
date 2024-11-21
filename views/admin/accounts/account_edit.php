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
    <title>Document</title>
</head>

<body class="bg-gray-700 h-[1000px]">
    <?php include_once 'views/layout/header.php' ?>
    <div class="mx-[239px] mt-[74px] font-bold text-white">
        <div class="flex text-2xl">
            <h1>UPDATE ACCOUNT</h1>
        </div>
        <?php
        foreach ($accounts as $account) {
        ?>
            <form action="?controller=account&action=update" method="post">
                <div class="grid grid-cols-2 gap-10 bg-white mt-[19px] py-[60px] px-[100px] rounded-xl drop-shadow-lg ">
                    <input type="hidden" name="id" value="<?= $account['id'] ?>">
                    <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-500 rounded-md py-2 pl-9 pr-3 shadow-lg focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm text-black " placeholder="Account Name..." type="text" name="name" value="<?= $account['name'] ?>" />

                    <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-500 rounded-md py-2 pl-9 pr-3 shadow-lg focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm text-black " placeholder="Email..." type="text" name="email" value="<?= $account['email'] ?>" />

                    <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-500 rounded-md py-2 pl-9 pr-3 shadow-lg focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm text-black " placeholder="Password..." type="text" name="password" value="<?= $account['password'] ?>" />

                    <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-500 rounded-md py-2 pl-9 pr-3 shadow-lg focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm text-black " placeholder="Address..." type="text" name="address" value="<?= $account['address'] ?>" />

                    <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-500 rounded-md py-2 pl-9 pr-3 shadow-slgfocus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm text-black " placeholder="Phone Number..." type="text" name="phonenumber" value="<?= $account['phonenumber'] ?>" />

                    <div class="flex items-center mb-4 gap-3">
                        <h1 class="text-base">Role:</h1>
                        <input id="default-checkbox" type="radio" name="role" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded   dark:ring-offset-gray-800  dark:bg-gray-700 dark:border-gray-600" <?= $account['role'] == 1 ? "checked" : "" ?>>
                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-800">Customer</label>
                        <input id="checked-checkbox" type="radio" name="role" value="2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded   dark:ring-offset-gray-800  dark:bg-gray-700 dark:border-gray-600" <?= $account['role'] == 2 ? "checked" : "" ?>>
                        <label for="checked-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-800">Employee</label>
                    </div>
                    <div></div>
                    <div></div>
                    <button class="w-[306px] h-[49px] border bg-blue-400 text-white rounded-md hover:bg-blue-700 drop-shadow-lg" type="submit"> UPDATE NOW</button>
                </div>
            </form>
        <?php
        }
        ?>
    </div>
</body>

</html>