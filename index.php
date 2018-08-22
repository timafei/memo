<!DOCTYPE html>
<?php

require_once 'DbManager.php';
    try{
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if (isset($_POST['text']) && $_POST['submit'] == 'submit'){
            $text = $_POST['text'];
            $text = nl2br($text);
                if(empty($text)){
                    $empty = '※テキストを入力してください';
                }else{
                    $empty = null;
                    $sql = "INSERT INTO `memo`(`content`) VALUES (?)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$text]);
                header('Location:index.php', true, 303);
                }
            }
            if ($_POST['submit'] == 'delete'){
                        $sql = "TRUNCATE table memo";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                    header('Location:index.php', true, 303);
                    }
                }
        
      }catch(PDOException $e){
            var_dump($e -> getMessage());
            die();
        }
?>

<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Document</title>
</head>
<body>
    <header>
    <h1>MEMO</h1>
    </header>
    <div class="content">
        <form action="" method="post" name="form">
        <textarea name="text"></textarea>
        <div class="btnWrapper">
            <button type="submit" name="submit" value="submit" id="submit">書き込み</button>
            <button type="submit" name="submit" value="delete" id="delete">メモを削除</button>    
        </div>
        <div>
            
            <?php
                echo $empty;
                while ($record = $records->fetch()) {
                    print "<hr>";
                    print($record['content'] . "\n");
                    }
            ?>
        </div>
    </div>
    <footer>
    </footer>
</body>
</html>