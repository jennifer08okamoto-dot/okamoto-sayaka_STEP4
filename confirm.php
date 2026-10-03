<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>入力内容確認</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

  <div class="confirm-container">

    <h1>内容申請の確認</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $name = $_POST["name"] ?? "";
        $age = $_POST["age"] ?? "";
        $phone = $_POST["phone"] ?? "";
        $email = $_POST["email"] ?? "";
        $address = $_POST["address"] ?? "";
        $question = $_POST["question"] ?? "";
        $gender = $_POST["gender"] ?? "";

        if (
            $name === "" ||
            $age === "" ||
            $phone === "" ||
            $email === "" ||
            $address === "" ||
            $question === "" ||
            $gender === ""
        ) {
            echo "<p>すべての項目を入力してください。</p>";


        }elseif (!preg_match("/^[ぁ-んァ-ヶ一-龠a-zA-Z\s-]+$/u", $name)) {
            echo "<p>名前はひらがな、カタカナ、漢字、英字のみ入力してください。</p>";

        }elseif (!is_numeric($age) || $age < 0 || $age > 150) {
            echo "<p>年齢は0から150の間で入力してください。</p>";

        }elseif (!preg_match("/^[0-9-]+$/", $phone)) {
            echo "<p>電話番号は半角数字とハイフンのみ使用できます。</p>" ;
        
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<p>メールアドレスの形式が正しくありません。</p>";
        
        }   elseif (!preg_match("/^[ぁ-んァ-ヶ一-龠a-zA-Z0-9\s-]+$/u", $address)) {
            echo "<p>住所はひらがな、カタカナ、漢字、英字、半角数字、ハイフンのみ使用できます。</p>";


        } else {
            echo '<div style="width:350px; margin:20px auto; text-align:left;">';

            echo "<p>名前: " . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . "</p>";
            echo "<p>年齢: " . htmlspecialchars($age, ENT_QUOTES, 'UTF-8') . "</p>";
            echo "<p>電話番号: " . htmlspecialchars($phone, ENT_QUOTES, 'UTF-8') . "</p>";
            echo "<p>メールアドレス: " . htmlspecialchars ($email, ENT_QUOTES, 'UTF-8') . "</p>";
            echo "<p>住所: " . htmlspecialchars($address, ENT_QUOTES, 'UTF-8') . "</p>";
            echo "<p>質問: " . htmlspecialchars($question, ENT_QUOTES, 'UTF-8') . "</p>";
            echo "<p>性別: " . htmlspecialchars($gender, ENT_QUOTES, 'UTF-8') . "</p>";
            
            echo '</div>';
        }


    } else {
        echo"<p>データが送信されていません。</p>";
    }
    ?>

  </div>

</body>
</html>
 