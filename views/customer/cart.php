<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/quantity.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet' />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Cart</title>

    <style>
        body {
            background-color: white;
            font-family: 'Nunito', sans-serif;
            color: #696969;
        }
    </style>
</head>

<body>
    <?php include_once 'views/layout/navbar.php'; ?>

    <div class="flex flex-col mt-[50px] mx-[238px] ">
        <div class="flex items-center w-auto h-[50px] mb-[25px]">
            <h1 class="w-[150px] text-3xl font-semibold">Cart list</h1>
            <div class="h-[1px] w-full bg-gray-500"></div>
        </div>

        <form action="?controller=cart&action=store" method="POST">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg h-[500px] max-h-[500px]">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Image</span>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Product
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Qty
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($array['data'] as $each) { ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="w-[200px] p-4">
                                    <img src="imgs/<?= $each['image'] ?>">
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                    <?= $each['name'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="wrapper">
                                        <a href="?controller=cart&action=changeAmount&id=<?= $each['id'] ?>&func=minus">-</a>
                                        <span class="num"><?= $each['amount_cart'] < 10 ? "0" . $each['amount_cart'] : $each['amount_cart'] ?></span>
                                        <a href="?controller=cart&action=changeAmount&id=<?= $each['id'] ?>&func=add">+</a>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                    $<?= $each['price'] ?>
                                </td>
                                <td class="px-2 py-4">
                                    <a href="?controller=cart&action=destroy&id=<?= $each['id'] ?>">
                                        <button type="button" class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"><i class='bx bxs-trash-alt'></i></button>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="flex flex-row justify-between items-center mt-3 px-[50px] border rounded-lg text-l shadow">
                <div class="flex justify-between items-center">
                    Total Price : $<?= $array['total_price'] ?>
                </div>
                <button type="submit" class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 mt-4">Payment</button>
            </div>
        </form>
    </div>
    <?php include_once 'views/layout/footer.php' ?>

</body>

</html>