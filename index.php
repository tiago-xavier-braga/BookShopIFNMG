<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/index.css">
    <link rel="stylesheet" href="./public/css/header.css">
    <link rel="stylesheet" href="./public/css/footer.css">
    <link rel="stylesheet" href="./public/css/responsive.css">
    <title>Bookshop</title>
</head>
<body>
    <?php
        require_once('./class/fakedb.class.php');

        require_once('./public/templates/header.php');
    ?>
    <main>
        <div class="content">
            <div class="listBook">
        <?php

        $database = new fakeDB();
        foreach ($database->recoverAllBook() as $key => $value) {
            $countReview = 0;
            $clipStar = $value->calculateAverageRating() * 24;
            $boxBook = <<<BOOK
            <div class="book">
                <img src="./public/img/book/%d.jpg" class="coverBook">
                <h3 class="fontText">%s</h3>
                <div class="boxStar">
                    <img src="./public/img/index/5-star-grey.png" class="imgBook">
                    <img src="./public/img/index/5-star-gold.png" class="starGreyBook" style="clip: rect( 0px, %fpx, %fpx, 0px);">
                    <img src="./public/img/index/bg-green-left.png" style="position: absolute;left: -15px;top: 300px;">
BOOK;
            foreach ($value->review as $j => $review) {
                # code...
                $countReview += $review;
            }

            if ($countReview != 0) {
                # code...
                $boxBook .= '<p class="countReview" style="margin-left: 10px">' . $countReview . '</p></div>';
            }else{
                $boxBook .= '</div>';
            }
            $boxBook .= '<p class="priceBook">R$ %.2f</p><a href="details.php?code=%d" class="link" style="color: var(--blue); font-size: larger; text-decoration: none; font-family: "Ubuntu";">Detalhes</a>';
            if ($value->release == true) {
                # code...
                $boxBook .= '<p class="fontAlert"> Lançamento </p></div>';
            } else {
                $boxBook .= '</div>';
            }
            printf($boxBook, $value->code, $value->title, $clipStar, $clipStar, $value->price, $value->code, $value->code);
        }
        ?>
            </div>
        </div>
    </main>
    <?php
        require_once('./public/templates/footer.php')
    ?>
</body>
</html>