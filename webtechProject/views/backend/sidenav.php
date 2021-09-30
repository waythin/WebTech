<?php $path = 'http://'.$_SERVER['HTTP_HOST'].'/webtechProject'; 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIUB Restaurant | Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $path.'/utils/css/backend/sidenav.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo $path.'/utils/css/main.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo $path.'/utils/css/backend/permissions.css' ?>">
</head>
<body>
    <div class="dashboard-container">
        <div class="sidenav">
            <a href="<?php echo $path ?>" class="home-link"><i class="fas fa-home"></i> Go back to home</a>
            <h1>Dashboard</h1>
            <ul>
                <?php if ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'manager')  { ?>
                <li><a href="<?php echo $path.'/views/backend/dashboard.php'; ?>">Menus</a></li>
                <?php } ?>
                <li><a href="<?php echo $path.'/views/backend/manageOrders.php'; ?>">Orders</a></li>
                <?php if ($_SESSION['role'] === 'admin')  { ?>
                <li><a href="<?php echo $path.'/views/backend/managePermissions.php'; ?>">Permissions</a></li>
                <?php } ?>
            </ul>
        </div>

    