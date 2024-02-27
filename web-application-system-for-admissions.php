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
        age int(3) NOT NULL, // 新しい項目 age を追加
        PRIMARY KEY  (id),
        UNIQUE KEY email (email) // ユニークキーの追加
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
// アクションフックを登録
add_action( 'admin_post_process_admission_form', 'process_admission_form_function' );
add_action( 'admin_post_nopriv_process_admission_form', 'process_admission_form_function' );
// ショートコードを登録
add_shortcode('admission_form', 'wasa_display_admission_form_shortcode');

?>