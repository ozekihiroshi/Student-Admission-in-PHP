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

    // 確認画面からの送信であれば登録処理を行う
    if (isset($_POST['register_student']) && $_POST['register_student'] == 'yes') {
        // データベースに登録
        global $wpdb;
        $table_name = $wpdb->prefix . 'admissions';
        $wpdb->insert(
            $table_name,
            array(
                'sname' => $sname,
                'gname' => $gname,
                'contact' => $contact,
                'email' => $email,
                'address' => $address,
                'class' => $class,
                'shift' => $shift,
                'gender' => $gender,
                'blgroup' => $blgroup,
                'division' => $division,
                'age' => $age
            )
        );
        // 登録が成功したら、成功メッセージを表示
        echo "<div class='success-message'>Application submitted successfully!</div>";
    } elseif (isset($_POST['process_admission_form']) && $_POST['process_admission_form'] == 'yes') { 
        // 確認画面を表示する
        include 'confirmation-page.php';
    }
} else {
    // フォームを表示する
    include 'registration-form.php';
}
?>



