<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
$action = Utilities::get('action', 'index');
$User = new user();

if ($action == 'index') {
    $dataUser = $User->getAll();
    include './views-ad/user/index.php';
}
if ($action == 'insertuser') {
    $dataUser = $User->getAll();
    include './views-ad/user/insert.php';
}
if ($action == 'storeuser') {
    $n = isset($_POST['DH51800367_tenuser']) ? $_POST['DH51800367_tenuser'] : '';
    $mk = isset($_POST['DH51800367_mkuser']) ? $_POST['DH51800367_mkuser'] : '';
    $sdt = isset($_POST['DH51800367_sdtuser']) ? $_POST['DH51800367_sdtuser'] : '';
    $mail = isset($_POST['DH51800367_mail']) ? $_POST['DH51800367_mail'] : '';

    $data = $User->insert($n, $mk, $sdt, $mail);
    if ($data == 1) {
        echo '<script> swal("Good job!", "Add Successed", "success"); </script>';
    } else {
        echo '<script> swal("Nice Try!", "Add Failed", "error"); </script>';
    }
    $dataUser = $User->getAll();
    include './views-ad/user/index.php';
}
if ($action == 'deleteuser') {
    $id = Utilities::get('id');
    $n = $User->delete($id);
    $dataUser = $User->getAll();
    include './views-ad/user/index.php';
    if ($n == 1) {
        echo '<script> swal("Good job!", "Delete Successed", "success"); </script>';
    } else {
        echo '<script> swal("Warning!", "Delete Failed", "error"); </script>';
    }
}
