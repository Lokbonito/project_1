<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
        body {
            background-color: #eee;
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="bg-white">
    <?php
    include_once '../layout/navbar.php';
    // include_once '../../models/customer/categoryModel.php';
    include_once '../../connect/openConnect.php'; //goi db
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 2;
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
    $off_set = ($current_page - 1) * $item_per_page;
    $products = mysqli_query($connect, "SELECT * FROM `product` ORDER BY 'id' ASC LIMIT " . $item_per_page . " OFFSET " . $off_set); // truy van san pham va phan trang
    $totalRecords = mysqli_query($connect, "SELECT * FROM `product`");
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    ?>
    <div class="relative">
        <img src="../../imgs/image5 (1).png" class="w-full" alt="">
        <div class="absolute bottom-[28px] left-[218px] text-4xl my-[14px] text-white  ">
            <h1 class="mb-3 font-bold">Sofa</h1>
            <h2>Home / Living room / Sofa</h2>
        </div>
    </div>

    <div class="flex justify-between mx-[212px] mt-[53px] items-end">
        <div>
            <h2 class="text-[32px]">Price</h2>
            <div class="custom-select" style="width:250px;">
                <select name="price" class="outline-none flex items-center ">
                    <option value="">From expensive to cheap</option>
                    <option value="1-10">...</option>
                </select>
            </div>
        </div>

        <div class="ml-[370px]">
            <h2 class="text-[32px]">Material</h2>
            <div class="custom-select" style="width:250px;">
                <select name="price" class="outline-none flex items-center ">
                    <option value="">All</option>
                    <option value="1-10">...</option>
                </select>
            </div>
        </div>

        <button class="border border-black bg-black text-white h-[45px] w-[149px] font-semibold text-xl hover:text-black hover:bg-white transition-all">Apply</button>
    </div>

    <div class="mt-[164px] mx-[212px]">
        <div class="!grid !grid-cols-4 gap-4 w-full ">
            <?php while ($row = mysqli_fetch_array($products)) { ?>
                <div class="border border-gray-300 relative">
                    <a href="product.php?id=<?= $row['id'] ?>"><img src="<?= $row['image'] ?>" alt=""></a>
                    <div class="mx-auto p-[26px] flex flex-col items-center">
                        <p class="text-base text-[32px] font-bold"><a href="product.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a></p>
                        <p class="text-red-600 text-[16px] font-semibold text-right py-[5px]"><?= number_format($row['price'], 0, ".", ".") ?> <small>$</small></p>
                        <div class="flex items-center  gap-x-[18px]">
                            <button class="border border-black w-[115px] py-2 font-semibold  hover:text-white hover:bg-green-500 transition-all">Add to cart</button>
                            <button class="border border-black bg-black text-white w-[115px] py-2 font-semibold  hover:text-black hover:bg-gray-500 transition-all">More</button>
                        </div>
                    </div>

                </div>
            <?php } ?>
        </div>
        <!-- first_page -->
        <?php
        if ($current_page > 3) {
            $first_page = 1;
        ?>
            <a href="?per_page=<?= $item_per_page ?>&page=<?= $first_page ?>" class="border border-gray-500 px-[12px]">First</a>
        <?php } ?>

        <!-- Prev page -->
        <?php if ($current_page > 1) {
            $prev_page = $current_page - 1;
        ?>
            <a href="?per_page=<?= $item_per_page ?>&page=<?= $prev_page ?>" class="border border-gray-500 items-center px-[12px]"><i class='bx bxs-chevron-left'></i></a>
        <?php } ?>
        <!-- Pagination -->
        <?php for ($num = 1; $num <= $totalPages; $num++) { ?>
            <?php if ($num != $current_page) { ?>
                <?php if ($num > $current_page - 3 && $num < $current_page + 3) ?>
                <div class="gap-6 mt-[28px] text-2xl inline-flex items-center">
                    <a href="?per_page=<?= $item_per_page ?>&page=<?= $num ?>" class="border border-gray-500 px-[12px]"><?= $num ?></a>
                </div>
                <?php ?>
            <?php } else { ?>
                <div class="gap-6 mt-[28px] text-2xl inline-flex items-center">
                    <strong class="border border-gray-500 px-[12px] bg-gray-500 text-white"><?= $num ?></strong>
                </div>
            <?php } ?>
        <?php } ?>


        <!-- next_page -->

        <?php
        if ($current_page < $totalPages - 1) {
            $next_page = $current_page + 1;?>
            <a href="" class="border border-gray-500 items-center px-[12px]"><i class='bx bxs-chevron-right'></i></a>
        <?php } ?>
        <!-- end_page -->
        <?php
        if ($current_page < ($totalPages - 3)) {
            $end_page = 1;?>
            <a href="?per_page=<?= $item_per_page ?>&page=<?= $end_page ?>" class="border border-gray-500 px-[12px]">End</a>
        <?php } ?>

    </div>



    <?php include_once '../layout/footer.php' ?>
</body>

<script src=" ../../js/dropdown.js"></script>

</html>