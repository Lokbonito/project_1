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
        <div class="flex justify-between text-2xl font-bold text-white">
            <h1>PRODUCT</h1>
            <a href="?controller=product&action=add">
                <button type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">+ ADD PRODUCT</button>
            </a>
        </div>
        <div class="mt-[19px]">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Product name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Size
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Fabric
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Unit Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Amount
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3 ">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($array['product'] as $product) {
                        ?>
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <?= $product['id'] ?>
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                                    <img src="imgs/<?= $product['image'] ?>" class="h-20" alt="">
                                </th>
                                <td class="px-6 py-4">
                                    <?= $product['name'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $product['size'] ?> M
                                </td>
                                <td class="px-6 py-4">
                                    <?= $product['fabric'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    $<?= $product['price'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    x<?= $product['amount'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $product['category_name'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="?controller=product&action=edit&id=<?= $product['id'] ?>">
                                        <button type="button" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Edit</button>
                                    </a>
                                    <a href="?controller=product&action=destroy&id=<?= $product['id'] ?>" class="<?= $product['id'] == COMPLETED || $product['id'] == CANCELED ? 'pointer-events-none cursor-not-allowed' : '' ?>">
                                        <button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Delete</button>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>


                <nav aria-label="Page navigation example" class="py-[19px]">
                    <ul class="inline-flex -space-x-px">
                        <li class="<?= $array['currentPage'] == 1 ? 'pointer-events-none cursor-not-allowed' : '' ?>">
                            <a href="?controller=product&page=<?= $array['currentPage'] - 1 ?>" class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><i class='bx bx-caret-left'></i></a>
                        </li>
                        <?php for ($i = 1; $i <= $array['totalPage']; $i++) { ?>
                            <li>
                                <a href="?controller=product&page=<?= $i ?>" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><?= $i ?></a>
                            </li>
                        <?php } ?>
                        <li>
                            <a href="?controller=product&page=<?= $array['currentPage'] + 1 ?>" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><i class='bx bx-caret-right'></i></a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>
</body>

</html>