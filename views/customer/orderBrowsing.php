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
            <h1 class=" w-[300px] text-3xl font-semibold">Order Queue</h1>
            <div class="h-[1px] w-full bg-gray-500"></div>
        </div>

        <?php foreach ($array as $each) { ?>
            <div class="flex flex-col overflow-x-auto shadow-md sm:rounded-lg mt-7">
                <div class="flex justify-between mt-7 text-xl mx-5 my-5 ">
                    <div></div>
                    <div class="flex gap-7">
                        <h1>CODE: <span class="text-red-500"><?= $each['order']['order_code'] ?></span></h1>
                        <h1>STATUS: <span class="text-red-500"><?php if ($each['order']['status'] == 1) {
                                                                    echo 'Pending';
                                                                }
                                                                if ($each['order']['status'] == 2) {
                                                                    echo 'Delivering';
                                                                }
                                                                if ($each['order']['status'] == 3) {
                                                                    echo 'Completed';
                                                                }
                                                                if ($each['order']['status'] == 4) {
                                                                    echo 'Canceled';
                                                                } ?></span></h1>
                    </div>
                </div>
                <?php foreach ($each['result'] as $item) { ?>
                    <div class="border h-[1px] w-full "></div>
                    <div class="flex gap-7 my-10 mx-7 ">
                        <img src="imgs/<?= $item['image'] ?>" class="h-36  ">

                        <div class="flex flex-col items-start justify-center gap-y-2 font-bold">
                            <p class="my-4"><?= $item['name'] ?></p>
                            <p class="my-4">Amount: x<?= $item['amount'] ?> </p>
                            <p class="my-4 text-red-400">Price: $<?= $item['price'] ?></p>
                        </div>
                        <div class="flex flex-col items-start gap-y-2 ml-60 font-bold">
                            <p class="my-4">DELIVER METHOD: <?= $item['id_delivery_method'] == 1 ? 'Fast Shipping' : '' ?> </p>
                            <p class="my-4">PAYMENT METHOD: <?= $item['id_payment_method'] == 1 ? 'COD' : '' ?></p>
                        </div>

                    </div>
                <?php } ?>
                <div class="border h-[1px] w-full bg-slate-500 "></div>
                <div class="flex justify-between mt-7 text-xl mx-5 my-5">
                    <p class="text-red-500">Total Price: $<?= $each['total_price'] ?></p>
                    <a href="?controller=orderBrowsing&action=cancel&id=<?= $each['order']['id'] ?>" class="<?= $each['order']['status'] == COMPLETED ||  $each['order']['status'] == CANCELED ? 'pointer-events-none ' : '' ?>">
                        <button type="button" class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">CANCELED</button>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php include_once 'views/layout/footer.php' ?>

    <script src="js/quantity.js"></script>
</body>

</html>