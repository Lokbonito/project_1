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
    <div class="mx-[239px] mt-[74px] ">
        <div class="flex text-2xl font-bold text-white">
            <h1>ADD PRODUCT</h1>
        </div>
        <form action="?controller=product&action=addProduct" method="post" enctype="multipart/form-data">

            <div class="grid grid-cols-2 items-start gap-10 bg-white mt-[19px] py-[60px] px-[100px] rounded-xl drop-shadow-lg ">
                <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-500 rounded-md py-2 pl-9 pr-3 shadow-lg focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm " placeholder="Name..." type="text" name="name" required />

                <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-500 rounded-md py-2 pl-9 pr-3 shadow-lg focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm " placeholder="Price..." type="text" name="price" required />

                <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-500 rounded-md py-2 pl-9 pr-3 shadow-lg focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm " placeholder="Amount..." type="text" name="amount" required />

                <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-500 rounded-md py-2 pl-9 pr-3 shadow-lg focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm " placeholder="Size..." type="text" name="size" required />

                <select name="category_id" class="outline-none flex items-center border border-gray-500 rounded-lg text-gray-400 py-2 pl-9 pr-3" required>
                    <option value=""> - choose Category - </option>
                    <?php
                    foreach ($categorys as $category) {
                    ?>
                        <option value="<?= $category['id'] ?>">
                            <?= $category['name'] ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>

                <select name="room_id" class="outline-none flex items-center border border-gray-500 rounded-lg text-gray-400 py-2 pl-9 pr-3" required>
                    <option value=""> - choose room - </option>
                    <?php
                    foreach ($rooms as $room) {
                    ?>
                        <option value="<?= $room['id'] ?>">
                            <?= $room['name'] ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>

                <textarea class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-500 rounded-md py-2 pl-9 pr-3 shadow-lg focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm h-32" placeholder="Description..." type="text" name="description" required></textarea>

                <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-500 rounded-md py-2 pl-9 pr-3 shadow-lg focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm " placeholder="Farbic..." type="text" name="fabric" required />

                <div></div>

                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="image" required>

                <div></div>
                <div></div>
                <div></div>
                <div></div>

                <button class="w-[306px] h-[49px] border bg-orange-400 text-white rounded-md hover:bg-orange-700 drop-shadow-lg">+ ADD PRODUCT NOW</button>
            </div>
        </form>
    </div>
</body>

</html>