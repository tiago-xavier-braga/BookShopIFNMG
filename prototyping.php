<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once './class/book.class.php';
        require_once './class/author.class.php';
        require_once './class/publisher.class.php';

        $a1 = new Author();
        $a1->name = 'Ariano Suassuna';
        $a2 = new Author();
        $a2->name = 'Tiago Braga';

        $p1 = new Publisher();
        $p1->name = 'Editora Brasil';

        /*
        $b1->code = 1001;
        $b1->title = 'Auto da compadecida';
        $b1->description = 'Livro de Ariano Suassuna';
        $b1->author = array($a1, $a2);
        $b1->publisher = $p1;
        $b1->edition = 2;
        $b1->pages = 120;
        $b1->year = 1967;
        $b1->release = false;
        $b1->price = 242.2;
        $b1->review = array(0, 0, 1, 10, 5);
        */
        $b1 = new Book();
        $data = array(1001, 'Auto da compadecida', 'Livro de Ariano Suassuna', array($a1, $a2), $p1, 2, 120, 1967, false, 242.2, array(0, 0, 1, 10, 5));

        $b1->fillData($data);
        echo $b1;

    ?>
</body>
</html>