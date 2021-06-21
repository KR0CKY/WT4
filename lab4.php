<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
    <title>Lab_4</title>
    <meta charset="utf-8">
    <meta name="variant" content="13">
    <meta name="description" content="">
</head>

<style>
    body{
        background-color: black;
    }
    textarea{
        border-radius: 15px;
        box-shadow: 0 0 30px rgba(255, 255, 255, 1);
        width: 80%;
        height: 200px;
        margin: 5px 10% 20px;
        background-color: #6ee9fd;
        color: white;
    }
    button{
        width: 300px;
        padding: 13px 30px;
        margin: 5px 600px 5px;
        font-size: 15px;
        color: white;
        background: #2ca8c6;
        border: none;
        border-bottom: 4px solid #6ee9fd;
        border-radius: 25px;
        box-shadow: 0 0 30px rgba(252, 135, 18, 1);
    }
    button:hover{
        background: rgba(252,135,18,1);
        color: white;
        border-bottom: 4px solid rgba(122, 62, 2, 1);
        box-shadow: none;
    }
</style>
<body>

    <form class="" action="lab4.php" method="post">

        <?php
        $present_post = isset($_POST['text']);
        ?>
        <textarea class="input-field" name="text" wrap="soft"><?= htmlspecialchars($_POST['text']) ?></textarea>
        <br>
        <button class="button-submit" type="submit" name="btn"> Submit</button>

    </form>

    <p>
        <?php
        if ($present_post) {
            $text = $_POST['text'];

            $number = '/[\d.]+/';
            $count = preg_match_all($number,$text,$matches);

            for($i=0;$i<$count;$i++){
                echo '<span style="color:red">'.$matches[0][$i].' '.'</span>';
            }

            $rus = '/([а-я]+)/ui';
            $count = preg_match_all($rus,$text,$matches);

                for($i=0;$i<$count;$i++){
                    echo '<span style="color:green">'.$matches[0][$i].' '.'</span>';
                }

            $eng = '/(\b(?<![\'"])[a-z\'-]{1,}\b(?![\'"]))/i';
            $count = preg_match_all($eng,$text,$matches);

            for($i=0;$i<$count;$i++){
                echo '<span style="color:blue">'.$matches[0][$i].' ' .'</span>';
            }
        }
        ?>
    </p>
</body>

</html>