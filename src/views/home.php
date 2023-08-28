<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- custom css link -->
    <link rel="stylesheet" href="css/style.css">
</head>


<body>
<?php require "header.php"?>

    <!-- home section starts-->
    <section class="home" id="home">
        <div class="content">
            <h3>the best courses you will find here</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam animi fuga unde, voluptates, nisi qui hics.</p>
            <a href="#" class="btn">
                <span class="text text-1">learn more</span>
                <span class="text text-2" aria-hidden="true">learn more</span>
            </a>    
        </div>
    </section>
    <!-- home section ends -->

    <!-- about section starts -->
    <section class="about" id="about">
        <h1 class="heading">A propos a nous</h1>
        <div class="container">
            <figure class="about-image">
                <img src="../../assets/images/about.jpg" alt="" height="500">
                <img src="../../assets/images/about_1.jpg" alt="" class="about-img">
            </figure>
            <div class="about-content">
                <h3>Le monde de l'informatique dans vos mains</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus aut impedit expedita aliquam 
                    provident quod excepturi minus. Similique eveniet fugiat doloribus nisi saepe cupiditate iusto itaque totam! Officia, enim qui.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni voluptatum ipsa quod dolores officia at excepturi quas numquam vero dolorem vitae 
                    veritatis quisquam fugit voluptates doloribus, id pariatur in ipsam?</p>    
                <a href="#" class="btn">
                    <span class="text text-1">voir plus</span>
                    <span class="text text-2" aria-hidden="true">voir plus</span>
                </a>      
                <a href="#" class="btn">
                    <span class="text text-1">voir les photos</span>
                    <span class="text text-2" aria-hidden="true">voir les photos</span>
                </a>       
            </div>
        </div>
    </section>
    <!-- about section ends -->
    
    <!-- subjects section starts -->
    <section class="subjects">
        <h1 class="heading">Nos programmes</h1>
        <div class="box-container">
            <div class="box">
                <img src="../../assets/images/subject-1.png" alt="">
                <h3>Titre d'une branche</h3>
                <p>Lorem ipsum dolor sit amet consectetur.</p>
            </div>
            <div class="box">
                <img src="../../assets/images/subject-2.png" alt="">
                <h3>Titre d'une branche</h3>
                <p>Lorem ipsum dolor sit amet consectetur.</p>
            </div>
            <div class="box">
                <img src="../../assets/images/subject-3.png" alt="">
                <h3>Titre d'une branche</h3>
                <p>Lorem ipsum dolor sit amet consectetur.</p>
            </div>
            <div class="box">
                <img src="../../assets/images/subject-4.png" alt="">
                <h3>Titre d'une branche</h3>
                <p>Lorem ipsum dolor sit amet consectetur.</p>
            </div>
        </div>
    </section>
    <!-- subject section ends -->


<!-- blog section starts -->

<section class="blog" id="blog">

 <h1 class="heading">our blogs</h1>

 <div class="box-container">

    <div class="box">
        <div class="image shine">
            <img src="../../assets/images/blog-1.jpg" alt="">
            <h3>09 dec 2022</h3>
        </div>
        <div class="content">
            <div class="icons">
                <a href="#"><i class="fas fa-user"></i>by admin</a>
            </div>
            <h3>we have best courses for you</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam explicabo minus.</p>
            <a href="#" class="btn">
                <span class="text text-1">read more</span>
                <span class="text text-2" aria-hidden="true">read more</span>
            </a>
        </div>
    </div>

    <div class="box">
        <div class="image shine">
            <img src="../../assets/images/blog-2.jpg" alt="">
            <h3>09 dec 2022</h3>
        </div>
        <div class="content">
            <div class="icons">
                <a href="#"><i class="fas fa-user"></i>by admin</a>
            </div>
            <h3>we have best courses for you</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam explicabo minus.</p>
            <a href="#" class="btn">
                <span class="text text-1">read more</span>
                <span class="text text-2" aria-hidden="true">read more</span>
            </a>
        </div>
    </div>

    <div class="box">
        <div class="image shine">
            <img src="../../assets/images/blog-3.jpg" alt="">
            <h3>09 dec 2022</h3>
        </div>
        <div class="content">
            <div class="icons">
                <a href="#"><i class="fas fa-user"></i>by admin</a>
            </div>
            <h3>we have best courses for you</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam explicabo minus.</p>
            <a href="#" class="btn">
                <span class="text text-1">read more</span>
                <span class="text text-2" aria-hidden="true">read more</span>
            </a>
        </div>
    </div>

 </div>

</section>

<!-- blog section ends -->

 







    <?php require "footer.php";?>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- custom js -->
    <script src="js/header"></script>
</body>
</html>