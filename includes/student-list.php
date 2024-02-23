<div class="student-list">
    <h2>学生リスト</h2>
    <ul>
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . 'admissions';
        $students = $wpdb->get_results("SELECT * FROM $table_name");

        if ($students) {
            foreach ($students as $student) {
                echo '<li>';
                echo '<strong>名前：</strong>' . $student->name . '<br>';
                echo '<strong>メールアドレス：</strong>' . $student->email . '<br>';
                echo '<strong>電話番号：</strong>' . $student->phone;
                echo '</li>';
            }
        } else {
            echo '<li>学生が見つかりませんでした。</li>';
        }
        ?>
    </ul>
</div>
