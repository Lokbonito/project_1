<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/quantity.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <title>Product</title>
  <style>
    body {
      background-color: #eee;
      font-family: 'Nunito', sans-serif;
      color: #696969;
    }
  </style>
</head>

<body>

  <body class="bg-white">
    <?php include_once 'views/layout/navbar.php'; ?>
    <div class="flex flex-col mt-[100px] mx-[238px] border bg-white">
      <div class="grid grid-cols-2 gap-10 w-full my-auto">
        <div class="h-[500px] flex justify-center items-center">
          <img src="imgs/<?= $product['image'] ?>" alt="">
        </div>
        <div class="mt-[50px] max-w-[500px]">
          <h1 class="text-4xl text-black  block font-bold relative break-words">sofa</h1>
          <h3 class="my-[30px] text-2xl text-red-600 font-semibold">$<?= $product['price'] ?></h3>
          <p class="mt-[15px]">
            Availability: <?= $product['amount'] ?>
          </p>
          <p class="mt-[15px]">Size: <?= $product['size'] ?></p>
          <form class="flex flex-col my-[30px]" action="?controller=cart&action=addToCart&id=<?= $product['id'] ?>" method="POST">
            <div class="flex gap-4  items-center">
              <p class="font-bold text-black">Quantity: </p>
              <div class="wrapper">
                <span class="minus">-</span>
                <span class="num">01</span>
                <input type="hidden" id="amount_prod" name="amount" value="1">
                <span class="plus">+</span>
              </div>
            </div>
            <button class="flex justify-center gap-2 items-center h-11 w-40 border border-[#696969] hover:bg-green-300 hover:text-white hover:w-48 transition-all mt-[25px] rounded-xl" type="submit"> <ion-icon name="cart-outline" class="text-2xl stroke-3"></ion-icon> Add to cart</button>
          </form>
        </div>
      </div>

      <div class="my-[20px] mx-6">
        <h1 class="text-3xl text-black font-medium my-5 mx-6">Description</h1>
        <p class="border-y border-[#696969] text-justify py-5">
          <?= $product['description'] ?>
        </p>
      </div>

      <div class="my-[20px] mx-6 ">
        <h1 class="text-3xl text-black font-medium my-5 mx-6">Related Product</h1>
        <div class="grid grid-cols-3 gap-6 justify-between border-t border-gray-400 py-5">
          <?php foreach ($slides as $slide) { ?>
            <div class="flex flex-col p-4 text-center text-xl font-semibold">
              <a href="?controller=productDetail&id=<?= $slide['id'] ?>"><img src="imgs/<?= $slide['image'] ?>" alt=""><?= $slide['name'] ?></a>
            </div>
          <?php } ?>
        </div>
      </div>

    </div>
    <?php include_once 'views/layout/footer.php' ?>
    <script src="js/quantity.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  </body>

</html>