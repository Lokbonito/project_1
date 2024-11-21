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
            <h1>ADD CATEGORY</h1>
        </div>
        <form action="?controller=category&action=addCategory" method="post">
            <div class="grid grid-cols-2 items-start gap-10 bg-white mt-[19px] py-[60px] px-[100px] rounded-xl drop-shadow-lg ">
                <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-500 rounded-md py-2 pl-9 pr-3 shadow-lg focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm " placeholder="Name..." type="text" name="name" />

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    category name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($array['category'] as $category) {
                            ?>
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <?= $category['id'] ?>
                                    </th>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <?= $category['name'] ?>
                                    </th>

                                    <td class="px-6 py-4">
                                        <a href="?controller=category&action=destroyCategory&id=<?= $category['id'] ?>">
                                            <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800" type="button">
                                                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                    Delete
                                                </span>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div></div>
                <div></div>
                <button class="w-[306px] h-[49px] border bg-orange-400 text-white rounded-md hover:bg-orange-700 drop-shadow-lg">+ ADD CATEGORY NOW</button>
            </div>
        </form>
    </div>
</body>

</html>