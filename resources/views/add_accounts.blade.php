<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Expanse Manager</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="vendor/css/sb-admin-2.css" rel="stylesheet">
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15"> <i class="fas fa-laugh-wink"></i> </div>
                <div class="sidebar-brand-text mx-3">Expanse Manager </div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="home"> <span>Accounts</span></a>
            </li>
            <!-- Divider -->

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="transaction"> <span>Transaction</span> </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <div class="container">
                    <div class="row justify-content-left">


                    </div>
                </div>

                <div class="container mt-5">
                    <div class="row">
                        <div class="col-sm-6">
                            <form action="" method="POST">
                                @csrf
                                <div class="mb-3">

                                    <label for="">Account Name</label>
                                    <input type="text" name="account_name" class="form-control" placeholder=""
                                        aria-describedby="helpId">
                                    <!-- <small id="helpId" class="text-muted">Help text</small> -->
                                </div>

                                <div class="mb-3">
                                    <label for="">Account Number</label>
                                    <input type="text" name="account_number" class="form-control" placeholder=""
                                        aria-describedby="helpId" name="account_number">
                                    <!-- <small id="helpId" class="text-muted">Help text</small> -->
                                </div>

                                <div class="mb-3">
                                    <label for="">Total Balance</label>
                                    <input type="text" name="total_balance" class="form-control" placeholder=""
                                        aria-describedby="helpId" name="total_balance">
                                    <!-- <small id="helpId" class="text-muted">Help text</small> -->
                                </div>

                                <div class="mb-3">
                                    <label for="">Total Transactions</label>
                                    <input type="text" name="total_transaction" class="form-control" placeholder=""
                                        aria-describedby="helpId" name="total_transaction">
                                    <!-- <small id="helpId" class="text-muted">Help text</small> -->
                                </div>

                                <div class="mb-3">
                                    <label for="">Total Deduct</label>
                                    <input type="text" name="total_deduct" class="form-control" placeholder=""
                                        aria-describedby="helpId" name="total_deduct">
                                    <!-- <small id="helpId" class="text-muted">Help text</small> -->
                                </div>



                                <button type="submit" class="btn btn-primary">Submit</button>


                            </form>
                        </div>
                    </div>
                </div>