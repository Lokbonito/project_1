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
         <form action="?controller=order&action=add">
             <div>
                 <div class="flex justify-between text-2xl font-bold text-white mb-[45px] mx-[239px] mt-[60px]">
                     <h1>ADD ORDER CUSTOMER</h1>
                 </div>

                 <div class="flex justify-center mx-[99px]">
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
                                     <th scope="col" class="px-6 py-3">
                                         action
                                     </th>
                                 </tr>
                             </thead>

                             <tbody>
                                 <?php
                                    foreach ($array['data'] as $key => $val) {
                                    ?>
                                     <tr class="bg-white">
                                         <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                                             <div class="flex gap-9 items-center text-black ">
                                                 <img src='imgs/<?= $val['image'] ?>' class=" h-[166px]" />
                                                 <div class="my-2">
                                                     <h1 class="font-bold text-2xl"><?= $val['name'] ?></h1>
                                                     <h2>size: <?= $val['size'] ?> M</h2>
                                                     <h2>fabric: <?= $val['name'] ?></h2>
                                                 </div>
                                             </div>
                                         </th>
                                         <td class="px-6 py-4">
                                             $<?= $val['price'] ?>
                                         </td>
                                         <td class="px-6 py-4">
                                             x<?= $val['amount_order'] ?>
                                         </td>

                                         <td class="px-6 py-4">
                                             <a href="?controller=order&action=destroy&id=<?= $val['id'] ?>">
                                                 <button type="button" class="focus:outline-none text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">DELETE</button>
                                             </a>
                                         </td>
                                     </tr>
                                 <?php
                                    }
                                    ?>
                             </tbody>
                         </table>



                         <div class="flex justify-end my-7 mx-7">
                             <button data-modal-target="staticModal" data-modal-toggle="staticModal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                 + ADD PRODUCT
                             </button>
                         </div>
                         <div class="h-[1px] mx-7 bg-black"></div>

                         <div class="flex justify-between my-[31px] mx-[100px] font-semibold">
                             <div>
                                 Purchase date: <?= date('d/m/Y') ?>
                             </div>
                             <div class="flex  gap-3">
                                 <div>
                                     Total price : $<?= $array['price'] ?>
                                 </div>
                             </div>
                         </div>

                         <div class="bg-black h-[1px] mx-7"></div>

                         <div class="flex justify-between text-white mx-7 my-7">
                             <a href="?controller=order&action=addCustomer">
                                 <button type="button" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">+ ADD CUSTOMER</button>
                             </a>
                         </div>
                     </div>
                 </div>
             </div>
         </form>


         <!-- popup -->
         <form action="?controller=order&action=addProduct" method="post">
             <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                 <div class="relative w-full h-full max-w-2xl md:h-auto">
                     <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                         <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                             <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                 ADD Product
                             </h3>
                             <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="staticModal">
                                 <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                     <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                 </svg>
                             </button>
                         </div>
                         <div class="flex flex-col max-h-[400px] overflow-auto px-12 my-6 gap-2 text-black ">
                             <?php
                                foreach ($result as $each) {
                                ?>
                                 <div class="flex justify-start gap-x-8 items-center">
                                     <input type="checkbox" name="list_product[]" value="<?= $each['id'] ?>" class="flex text-xl w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded dark:ring-offset-gray-800  dark:bg-gray-700 dark:border-gray-600">
                                     <img src='imgs/<?= $each['image'] ?>' class=" h-30 w-40" />
                                     <div class="my-2">
                                         <h1 class="font-bold text-2xl"><?= $each['name'] ?></h1>
                                         <h2>size: <?= $each['size'] ?></h2>
                                         <h2>fabric: <?= $each['fabric'] ?></h2>
                                     </div>
                                     <input type="number" id="default-search" name="<?= $each['id'] ?>" max=10 min=1 class=" text-sm w-[100px] text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="amount">
                                     <p>
                                         $ <?= $each['price'] ?>
                                     </p>
                                 </div>
                             <?php
                                }
                                ?>
                         </div>

                         <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                             <button data-modal-hide="staticModal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> accept</button>
                         </div>
                     </div>
                 </div>
             </div>
         </form>
     </body>

     </html>