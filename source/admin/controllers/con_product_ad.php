<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
$action = Utilities::get('action', 'index');
$Product = new product();
$Brand = new brand();

if ($action == 'index') {
    $dataSP = $Product->getAll();
    include './views-ad/product/index.php';
}
if ($action == 'insertsp') {
    $dataHang = $Brand->getAll();
    include './views-ad/product/insert.php';
}
if ($action == 'storesp') {
    $id = isset($_POST['DH51800367_maxe']) ? $_POST['DH51800367_maxe'] : '';
    $n = isset($_POST['DH51800367_tenxe']) ? $_POST['DH51800367_tenxe'] : '';
    $p = isset($_POST['DH51800367_giaxe']) ? $_POST['DH51800367_giaxe'] : 0;
    $e = isset($_POST['DH51800367_dcxe']) ? $_POST['DH51800367_dcxe'] : '';
    $hp = isset($_POST['DH51800367_mlxe']) ? $_POST['DH51800367_mlxe'] : '';
    $se = isset($_POST['DH51800367_cho']) ? $_POST['DH51800367_cho'] : '';
    $gb = isset($_POST['DH51800367_hopso']) ? $_POST['DH51800367_hopso'] : '';
    $w = isset($_POST['DH51800367_cr']) ? $_POST['DH51800367_cr'] : 0;
    $h = isset($_POST['DH51800367_cc']) ? $_POST['DH51800367_cc'] : 0;
    $mh = isset($_POST['DH51800367_mahang']) ? $_POST['DH51800367_mahang'] : "";
    $a = '';
    if (Utilities::file('DH51800367_anh')) {
        if ($_FILES['DH51800367_anh']['error'] == 0) {
            $a = $_FILES['DH51800367_anh']['name'];
            move_uploaded_file($_FILES['DH51800367_anh']['tmp_name'], "../views/image/product/$a");
        }
    }
    $data = $Product->insert($id, $n, $p, $a, $e, $hp, $se, $gb, $w, $h, $mh);
    if ($data == 1) {
        echo '<script> swal("Good job!", "Add Successed", "success"); </script>';
    } else {
        echo '<script> swal("Good job!", "Add Failed", "error"); </script>';
    }
    $dataSP = $Product->getAll();
    include './views-ad/product/index.php';
}
if ($action == 'delete') {
    $ma = Utilities::get('id');
    $n = $Product->delete($ma);
    $dataSP = $Product->getAll();
    if ($n == 1) {
        echo '<script> swal("Good job!", "Delete Successed", "success"); </script>';
    } else {
        echo '<script> swal("Warning!", "Delete Failed", "error"); </script>';
    }
    include './views-ad/product/index.php';
}
if ($action == 'editsp') {
    $m = Utilities::get('id');
    $dataSP = $Product->getById($m);
    $dataHang=$Brand->getAll();
    include './views-ad/product/update.php';
}
if ($action == 'updatesp') {
    $id = isset($_POST['DH51800367_maxe']) ? $_POST['DH51800367_maxe'] : '';
    $n = isset($_POST['DH51800367_tenxe']) ? $_POST['DH51800367_tenxe'] : '';
    $p = isset($_POST['DH51800367_giaxe']) ? $_POST['DH51800367_giaxe'] : 0;
    $e = isset($_POST['DH51800367_dcxe']) ? $_POST['DH51800367_dcxe'] : '';
    $hp = isset($_POST['DH51800367_mlxe']) ? $_POST['DH51800367_mlxe'] : '';
    $se = isset($_POST['DH51800367_cho']) ? $_POST['DH51800367_cho'] : '';
    $gb = isset($_POST['DH51800367_hopso']) ? $_POST['DH51800367_hopso'] : '';
    $w = isset($_POST['DH51800367_cr']) ? $_POST['DH51800367_cr'] : 0;
    $h = isset($_POST['DH51800367_cc']) ? $_POST['DH51800367_cc'] : 0;
    $mh = isset($_POST['DH51800367_mahang']) ? $_POST['DH51800367_mahang'] : "";
    $a = '';
    if (Utilities::file('DH51800367_anh')) {
        if ($_FILES['DH51800367_anh']['error'] == 0) {
            $a = $_FILES['DH51800367_anh']['name'];
            move_uploaded_file($_FILES['DH51800367_anh']['tmp_name'], "../views/image/brand/$a");
        }
    } else {
        $data = $Product->getById($id);
        foreach ($data as $d) {
            $a = $d['urlImagePro'];
        }
    }
    $data = $Product->update($n, $p, $a, $e, $hp, $se, $gb, $w, $h, $mh, $id);
    $dataSP = $Product->getAll();
    include './views-ad/product/index.php';
    if ($data == 1) {
        echo '<script> swal("Good job!", "Update Successed", "success"); </script>';
    } else {
        echo '<script> swal("Warning!", "Update Failed", "error"); </script>';
    }
}
