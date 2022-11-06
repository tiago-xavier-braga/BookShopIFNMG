<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/details.css">
    <link rel="stylesheet" href="./public/css/header.css">
    <link rel="stylesheet" href="./public/css/footer.css">
    <link rel="stylesheet" href="./public/css/responsive.css">
    <title>Document</title>
</head>
<body>
    <?php
        require_once('./public/templates/header.php');
        require_once('./class/fakedb.class.php');
    ?>
        <main>
            <div class="content">
                <?php
                    $boxHTML = <<<DETAIL
                <div class="bookInfo">
                    <img src="./public/img/book/%d.jpg" class="bookCover">
                    <div class="textInfo">
                        <h2>%s</h2>
                        <div class="boxStar">
                            <img src="./public/img/index/5-star-grey.png" class="imgBook">
                            <img src="./public/img/index/5-star-gold.png" class="starGreyBook" style="clip: rect( 0px, %fpx, %fpx, 0px);">
                            <p style="margin-left:20px">%.1f</p>
                        </div>
                        <p><b>Autores:</b> %s</p>
                        <p><b>Editora:</b> %s</p>
                        <p><b>Edição:</b> %d</p>
                        <p><b>Páginas:</b> %d</p>
                        <p><b>Ano de Publicação:</b> %d</p>
                    </div>
                </div>
                <div class="descriptionBox">
                    <h3>Descrição</h3>
                    <p>%s</p>
                </div>

                <div class="reviewBox">
                    <h3>Avaliações</h3>
                    <div class="starBox">
                        <img src="./public/img/index/5-star-gold.png" style="clip: rect( 0px, 120px, 120px, 0px);">

                        <div class="basePorcent"></div>
                        <p>%.1f</p>
                        <div class="goldPorcent" style="width: %.1fpx;"></div>

                    </div>
                    <div class="starBox">
                        <img src="./public/img/index/5-star-gold.png" style="clip: rect( 0px, 80px, 80px, 0px);">
                        <div class="basePorcent"></div>
                        <p>%.1f</p>
                        <div class="goldPorcent" style="width: %.1fpx;"></div>

                    </div>
                    <div class="starBox">
                        <img src="./public/img/index/5-star-gold.png" style="clip: rect( 0px, 60px, 60px, 0px);">
                        <div class="basePorcent"></div>
                        <p>%.1f</p>
                        <div class="goldPorcent" style="width: %.1fpx;"></div>

                    </div>
                    <div class="starBox">
                        <img src="./public/img/index/5-star-gold.png" style="clip: rect( 0px, 40px,40px, 0px);">
                        <div class="basePorcent"></div>
                        <p>%.1f</p>
                        <div class="goldPorcent" style="width: %.1fpx;"></div>

                    </div>
                    <div class="starBox">
                        <img src="./public/img/index/5-star-gold.png" style="clip: rect( 0px, 20px,20px, 0px);">
                        <div class="basePorcent"></div>
                        <p>%.1f</p>
                        <div class="goldPorcent" style="width: %.1fpx;"></div>

                    </div>                    
                </div>
            </div> 
DETAIL;
                $database = new fakeDB();
                $textAuthor = '';
                $code = $_GET['code'];
                $array = $database->recoverBook($code);
                $clipStar = $array->calculateAverageRating() * 24;

                foreach ($array->author as $key => $value) {
                    $textAuthor .= ' ' . $value . '';
                }

                printf($boxHTML, $array->code, $array->title, $clipStar, $clipStar,$array->calculateAverageRating(), $textAuthor, $array->publisher, $array->edition, $array->pages, $array->year, $array->description, $array->calculatePercentReview(4) * 100, $array->calculatePercentReview(4) * 100,$array->calculatePercentReview(3) * 100,
                $array->calculatePercentReview(3) * 100,$array->calculatePercentReview(2) * 100,
                $array->calculatePercentReview(2) * 100,$array->calculatePercentReview(1) * 100,
                $array->calculatePercentReview(1) * 100,$array->calculatePercentReview(0) * 100,$array->calculatePercentReview(0) * 100);
                ?>
            </div>
            <img src="./public/img/index/bg-green-left.png" style="position: absolute;left: -15px;top: 300px;">
        </main>
    <?php
        require_once('./public/templates/footer.php')

        /*

                    <div class="starBox">
                        <img src="./public/img/index/5-star-gold.png" style="clip: rect( 0px, 40px, 40px, 0px);">
                        <div class="basePorcent"></div>
                        <div class="goldPorcent" style="width: %.1fpx;"></div>
                        <p>%.1f</p>
                    </div>
                    <div class="starBox">
                        <img src="./public/img/index/5-star-gold.png" style="clip: rect( 0px, 20px, 20px, 0px);">
                        <div class="basePorcent"></div>
                        <div class="goldPorcent" style="width: %.1fpx;"></div>
                        <p>%.1f</p>
                </div>
                */
    ?>
</body>
</html>