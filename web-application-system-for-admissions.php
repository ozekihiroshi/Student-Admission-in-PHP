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
        name varchar(50) NOT NULL,
        email varchar(100) NOT NULL,
        phone varchar(20) NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}
register_activation_hook( __FILE__, 'wasa_create_database_table' );

// プラグインが無効化されたときにテーブルを削除
function wasa_delete_database_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'admissions';
    $wpdb->query("DROP TABLE IF EXISTS $table_name");
}
register_deactivation_hook( __FILE__, 'wasa_delete_database_table' );

// スクリプトとスタイルシートのエンキュー
function wasa_enqueue_scripts() {
    // JavaScriptファイルをエンキュー
    wp_enqueue_script('custom-script', plugin_dir_url(__FILE__) . 'assets/js/main.js', array('jquery'), '1.0', true);

    // スタイルシートをエンキュー
    wp_enqueue_style('custom-style', plugin_dir_url(__FILE__) . 'style.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'wasa_enqueue_scripts');
?>