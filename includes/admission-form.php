<?php
// フォームが送信された場合
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームデータを受け取る
    $sname = sanitize_text_field($_POST["sname"]);
    $gname = sanitize_text_field($_POST["gname"]);
    $contact = sanitize_text_field($_POST["contact"]);
    $email = sanitize_email($_POST["email"]);
    $address = sanitize_text_field($_POST["address"]);
    $class = sanitize_text_field($_POST["class"]);
    $shift = intval($_POST["shift"]);
    $gender = sanitize_text_field($_POST["gender"]);
    $blgroup = sanitize_text_field($_POST["blgroup"]);
    $division = intval($_POST["division"]);
    $age = intval($_POST["age"]);

    // 確認画面を表示する
    include 'confirmation-page.php';
} else {
    // フォームを表示する
    include 'registration-form.php';
}
?>


