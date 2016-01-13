<?php

$server = "sql113.intl.uk.to";
$username = "intl_17171126";
$password = "15juni95";
$database = "intl_17171126_projectberita";

mysql_connect($server, $username, $password) or die("<h1>Koneksi Mysql Error : </h1>" . mysql_error());
mysql_select_db($database) or die("<h1>Koneksi Kedatabase Error : </h1>" . mysql_error());


@$operasi = $_GET['operasi'];

switch ($operasi) {
    case "view":
    
        /* Source code untuk Menampilkan berita */

        $query_tampil_berita = mysql_query("SELECT * FROM tabel_berita") or die(mysql_error());
        $data_array = array();
        while ($data = mysql_fetch_assoc($query_tampil_berita)) {
            $data_array[] = $data;
        }
        echo json_encode($data_array);

         break;
    case "insert":
        /* Source code untuk Insert data */
        @$judulberita = $_GET['judulberita'];
        @$kategori = $_GET['kategori'];
        @$isiberita = $_GET['isiberita'];
        @$linkberita = $_GET['linkberita'];
        $query_insert_data = mysql_query("INSERT INTO tabel_berita (judulberita, kategori, isiberita, linkberita) VALUES('$judulberita', '$kategori', '$isiberita', '$linkberita')");
        if ($query_insert_data) {
            echo "Data Berhasil Disimpan";
        } else {
            echo "Error Inser Biodata " . mysql_error();
        }


        break;
    case "get_berita_by_id":
        /* Source code untuk Edit data dan mengirim data berdasarkan id yang diminta */
        @$id = $_GET['id'];
        for ($no=0; $no <2 ; $no++) { 
            # code...
        }

        $query_tampil_berita = mysql_query("SELECT * FROM tabel_berita WHERE id='$id'") or die(mysql_error());
        $data_array = array();
        $data_array = mysql_fetch_assoc($query_tampil_berita);
        echo "[" . json_encode($data_array) . "]";


        break;
    case "update":
        /* Source code untuk Update berita */
        @$judulberita = $_GET['judulberita'];
        @$kategori = $_GET['kategori'];
        @$isiberita = $_GET['isiberita'];
        @$linkberita = $_GET['linkberita'];
        @$id = $_GET['id'];
        $query_update_berita = mysql_query("UPDATE tabel_berita SET judulberita='$judulberita', kategori='$kategori',
            isiberita='$isiberita', linkberita='$linkberita' WHERE id='$id'");
        if ($query_update_berita) {
            echo "Update Data Berhasil";
        } else {
            echo mysql_error();
        }
        break;
    case "delete":
        /* Source code untuk Delete berita */
        @$id = $_GET['id'];
        $query_delete_berita = mysql_query("DELETE FROM tabel_berita WHERE id='$id'");
        if ($query_delete_berita) {
            echo "Delete Data Berhasil";
        } else {
            echo mysql_error();
        }

        break;

    case "get_berita_by_id_show":
        /* Source code untuk Edit data dan mengirim data berdasarkan id yang diminta */
        @$id = $_GET['id'];
        for ($no=0; $no <2 ; $no++) { 
            # code...
        }

        $query_show_berita = mysql_query("SELECT * FROM tabel_berita WHERE id='$id'") or die(mysql_error());
        $data_array = array();
        $data_array = mysql_fetch_assoc($query_show_berita);
        echo "[" . json_encode($data_array) . "]";

        break;

    default:
        break;
}
?>
