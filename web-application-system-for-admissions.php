<?php
/*
Plugin Name: Web Application System for Admissions
Description: Plugin to manage Online Application System.
Version: 1.0
Author: Hiroshi Ozeki
*/

// データベース接続とテーブル作成
function wasa_create_database_table() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . 'admissions';

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        sname varchar(200) NOT NULL,
        gname varchar(200) NOT NULL,
        contact varchar(50) NOT NULL,
        email varchar(100) NOT NULL,
        address varchar(2000) NOT NULL,
        class varchar(10) NOT NULL,
        shift int NOT NULL,
        gender varchar(10) NOT NULL,
        blgroup varchar(5) NOT NULL,
        division int NOT NULL,
        age int(3) NOT NULL,
        PRIMARY KEY  (id),
        UNIQUE KEY email (email)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'wasa_create_database_table');

// スクリプトとスタイルシートのエンキュー
function wasa_enqueue_scripts() {
    // JavaScriptファイルをエンキュー
    wp_enqueue_script('custom-script', plugin_dir_url(__FILE__) . 'assets/js/main.js', array('jquery'), '1.0', true);

    // スタイルシートをエンキュー
    wp_enqueue_style('custom-style', plugin_dir_url(__FILE__) . 'style.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'wasa_enqueue_scripts');

// ショートコードを定義する関数
function wasa_display_admission_form_shortcode() {
    ob_start(); // 出力をバッファリング
    include_once(plugin_dir_path(__FILE__) . 'includes/admission-form.php'); // 入学フォームのコードを読み込む
    return ob_get_clean(); // バッファリングされた出力を返す
}
add_shortcode('admission_form', 'wasa_display_admission_form_shortcode');

// フォーム送信時の処理
function wasa_process_admission_form() {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && $_POST["action"] == "register_student") {
        // フォームデータの取得
        $sname = sanitize_text_field($_POST["sname"]);
        $gname = sanitize_text_field($_POST["gname"]);
        $contact = sanitize_text_field($_POST["contact"]);
        $email = sanitize_email($_POST["email"]);
        $address = sanitize_text_field($_POST["address"]);
        $class = sanitize_text_field($_POST["class"]);
        $shift = sanitize_text_field($_POST["shift"]);
        $gender = sanitize_text_field($_POST["gender"]);
        $blgroup = sanitize_text_field($_POST["blgroup"]);
        $division = sanitize_text_field($_POST["division"]);
        $age = intval($_POST["age"]); // 整数に変換

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
    } else {
        // フォーム送信されていないか、正しいアクションが指定されていない場合は、確認画面を表示
        include_once(plugin_dir_path(__FILE__) . 'includes/confirmation-page.php');
    }
}
add_action('init', 'wasa_process_admission_form');
?>