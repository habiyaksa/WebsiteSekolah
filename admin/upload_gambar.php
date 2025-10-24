<?php
$target_dir = "../uploads/";

// Pastikan folder uploads ada
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

// Cek apakah ada file yang dikirim
if (!empty($_FILES['file']['name'])) {
    $file_name = basename($_FILES["file"]["name"]);
    $new_name = time() . "_" . $file_name; // kasih timestamp biar unik
    $target_file = $target_dir . $new_name;

    // Pindahkan file ke folder uploads0
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        // kirim URL ke Summernote agar langsung tampil di editor
        echo "../uploads/" . $new_name;
    } else {
        http_response_code(400);
        echo "Upload gagal.";
    }
} else {
    http_response_code(400);
    echo "Tidak ada file yang dikirim.";
}
?>