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

<body class="bg-gray-700 h-[1200px]">
    <?php include_once 'views/layout/header.php' ?>
    <form action="?controller=order&action=store" method="post">
        <div class="flex justify-between items-start gap-7 mx-[99px] mt-[100px]">
            <div class="relative overflow-x-auto w-[1250px] bg-white rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Product
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Quantity
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($array['data'] as $key => $val) {
                        ?>
                            <tr class="bg-white">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex items-center text-black ">
                                        <img src='imgs/<?= $val['image'] ?>' class=" h-[166px]" />
                                        <div class="my-2">
                                            <h1 class="font-bold text-2xl"><?= $val['name'] ?></h1>
                                            <h2>size: <?= $val['size'] ?> M</h2>
                                            <h2>fabric: <?= $val['fabric'] ?></h2>
                                        </div>
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    $ <?= $val['price'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    x <?= $val['amount_order'] ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div class="flex my-7 mx-7"></div>
                <div class="h-[1px] bg-black"></div>
                <div class="flex justify-between my-[31px] mx-[100px] font-semibold">
                    <div>
                        Purchase date: <?= date('d/m/Y') ?>
                    </div>
                    <div class="flex flex-col gap-3">
                        <div>
                            Total price : $ <?= $array['price'] ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-16 items-center border bg-white w-[397px] rounded-lg">
                <div class="text-lg font-semibold mt-7">
                    <h2>Customer Name:</h2>
                    <input type="text" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Customer name..." name="name" required>

                </div>
                <div class="text-lg font-semibold">
                    <h2>Phone:</h2>
                    <input type="text" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Phone number..." name="phone" required>
                </div>
                <div class="text-lg font-semibold">
                    <h2>Address:</h2>
                    <input type="text" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Adress..." name="address" required>
                </div>
                <div class=" text-lg font-semibold mb-7">
                    <h2>Status:</h2>
                    <select id="countries" class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" name="status" required>
                        <option selected>Select Status</option>
                        <option value="<?= PENDING ?>"> Pending</option>
                        <option value="<?= DELIVERING ?>">Delivering</option>
                        <option value="<?= COMPLETED ?>">Completed</option>
                        <option value="<?= CANCELED ?>">Canceled</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="flex justify-between text-white mx-[99px] mt-[50px]">
            <a href="?controller=order&action=add">
                <button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">BACK</button>
            </a>

            <button data-modal-target="staticModal" data-modal-toggle="staticModal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">
                + ADD ORDER
            </button>

        </div>
    </form>
</body>

</html>