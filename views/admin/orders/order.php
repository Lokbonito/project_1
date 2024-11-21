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
    <div class="mx-[239px] mt-[74px]">
        <div class="flex justify-between text-2xl font-bold text-white mb-[45px] ">
            <h1> ORDER</h1>
            <a href="?controller=order&action=add">
                <button type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">+ ADD ORDER </button>
            </a>
        </div>

        <form action="?controller=order" method="post">
            <div class=" relative my-8">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="search" id="default-search" name="search_order" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos...">
                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Bill code
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Purchase date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($array['result']['data'] as $item) {
                    ?>
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $item['id'] ?>
                            </th>
                            <td class="px-6 py-4">
                                <?= $item['order_code'] ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $item['purchase_date'] ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php
                                if ($item['status'] == 1) {
                                    echo 'Pending';
                                }
                                if ($item['status'] == 2) {
                                    echo 'Delivering';
                                }
                                if ($item['status'] == 3) {
                                    echo 'Completed';
                                }
                                if ($item['status'] == 4) {
                                    echo 'Canceled';
                                }
                                ?>
                            </td>
                            <td class="px-6 py-4">
                                $ <?= $array['result'][$item['id']] ?>
                            </td>
                            <td class="px-6 py-4">
                                <a href=" ?controller=order&action=edit&id=<?= $item['id'] ?>" class=" py-2.5 <?= $item['status'] == COMPLETED ||  $item['status'] == CANCELED ? 'pointer-events-none cursor-not-allowed' : '' ?>">
                                    <button class=" text-white bg-blue-700 hover:bg-blue-900 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ">edit
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

            <nav aria-label=" Page navigation example" class="py-[19px]">
                <ul class="inline-flex -space-x-px">
                    <li class="<?= $array['currentPage'] == 1 ? 'pointer-events-none cursor-not-allowed' : '' ?>">
                        <a href="?controller=order&page=<?= $array['currentPage'] - 1 ?>" class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><i class='bx bx-caret-left'></i></a>
                    </li>
                    <?php for ($i = 1; $i <= $array['totalPage']; $i++) { ?>
                        <li>
                            <a href="?controller=order&page=<?= $i ?>" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><?= $i ?></a>
                        </li>
                    <?php } ?>
                    <li>
                        <a href="?controller=order&page=<?= $array['currentPage'] + 1 ?>" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><i class='bx bx-caret-right'></i></a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
</body>

</html>