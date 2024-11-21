<!DOCTYPE html>
<html>

<head>
    <title>Sign up</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        @font-face {
            font-family: 'DalatSans';
            src: url('fonts/MTDalatSans.otf');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'Vellago';
            src: url('fonts/1FTV-Vellago.ttf');
            font-weight: normal;
            font-style: normal;
        }

        body {
            background-color: #eee;
            font-family: 'DalatSans', sans-serif;
            color: #696969;
        }
    </style>
</head>

<body>


    <div class="grid grid-cols-3 h-[700px] my-[50px] mx-[238px] bg-white shadow-xl">
        <div class="col-span-2">
            <form class="flex flex-col justify-center items-center" action="?controller=customer&action=signupSuccess" method="POST">
                <h1 class=" text-5xl my-[50px]" style="font-family: 'Vellago';">Time to feel like home,</h1>
                <div class="flex flex-col items-center mb-[25px]">
                    <label>Username </label><input type="text" value="" name="name" placeholder="Enter Username..." required class="border-b text-xl text-center" />
                </div>
                <div class="flex flex-col items-center mb-[25px]">
                    <label>Email </label><input type="email" value="" name="email" placeholder="Enter Email..." required class="border-b text-xl text-center" />
                </div>
                <div class="flex flex-col items-center mb-[25px]">
                    <label>Password </label><input type="password" value="" name="password" placeholder="Enter Password..." required class="border-b text-xl text-center" />
                </div>
                <div class="flex flex-col items-center mb-[25px]">
                    <label>Confirm password </label><input type="password" value="" name="confirm_password" placeholder="Confirm Password..." required class="border-b text-xl text-center" />
                </div>
                <div class="flex flex-col items-center mb-[25px]">
                    <label>Adress </label><input type="address" value="" name="address" placeholder=" enter specific address..." required street-address city class="border-b text-xl text-center" />
                </div>
                <div class="flex flex-col items-center mb-[25px]">
                    <label>Phone number</label><input type="text" value="" name="phonenumber" placeholder="Enter phoneumber..." required class="border-b text-xl text-center" />
                </div>
                <button class="bg-[#D7B585] text-white font-bold w-[200px] h-[35px] rounded-xl hover:text-[#696969] duration-150" type="submit" name="sign_up" value="signup">Sign up</button>
            </form>
        </div>
        <div class="flex flex-col items-center text-center text-white col-span-1 bg-left bg-cover w-full h-full bg-no-repeat break-words " style="background-image:url('imgs/r1.png');">
            <h1 class=" text-5xl my-[50px]" style="font-family: 'Vellago';">One of us ?</h1>
            <p>If you already have account,<br>
                just sign in to not miss new things</p>
            <button class="mt-auto mb-[90px] font-bold border w-[200px] h-[35px] rounded-xl hover:text-[#696969] duration-150"><a href="?controller=customer" class="block">Login</a></button>
        </div>
    </div>


</body>

</html>