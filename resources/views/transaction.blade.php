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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

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

        <div class="container-fluid">
            <!-- Page Heading -->
            <h5 class="mb-2 text-gray-800">Transaction</h5>
            <!-- DataTales Example -->
            <div class="card shadow">
                <div class="card-header py-3 d-flex justify-content-between">
                    <div>

                        <button type="button" class="btn btn-primary float-end" data-toggle="modal"
                            data-target="#exampleModalLong">
                            Add
                            Transaction</button>
                    </div>

                    <div class=" container">
                        <a class="btn-floating red" href="dashboard"><i class=" material-icons">insert_chart</i></a>
                    </div>
                </div>
                <div class=" card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>

                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>Bank Name</th>
                                    <th>Amount</th>
                                    <th>Type</th>
                                    <th>Category</th>
                                    <th>Note</th>
                                    <th>Date</th>
                                    <th colspan="2">Action</th>



                                </tr>
                            </thead>
                            <tbody>


                                @foreach($transactions as $tc)
                                <tr>

                                    <td>{{$tc['id']}}</td>

                                    <td>{{$tc['account->accountModels->user_name']}}</td>
                                    <td>{{$tc['account_name']}}</td>
                                    <td>{{$tc['amount']}}</td>
                                    <td>{{$tc['type']}}</td>
                                    <td>{{$tc['category']}}</td>
                                    <td>{{$tc['note']}}</td>
                                    <td>{{$tc['created_at']}}</td>
                                    <td>

                                        <a href="{{ url('editTransaction/'.$tc->id) }}"
                                            class=" btn btn-info btn-sm">Edit</a>







                                        <a href="{{ url('deletetransaction/'.$tc->id) }}"
                                            class="btn btn-danger btn-sm">Delete</a>
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>


                        </table>
                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Transaction</h5>
                    </div>


                    <div class="modal-body">

                        <div class="form-horizontal">
                            <form action="{{'add_transaction/.$account_id'}}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="user_id" name="user_id">Select Account User</label>

                                    <select class="user-form selectpicker show-tick form-control"
                                        data-live-search="true" name="user_id">
                                        @foreach($accountUser as $user_id)
                                        <option value="{{$user_id->id}}">{{ $user_id->user_name}}

                                        </option>

                                        @endforeach
                                        < /select>
                                </div>




                                <input type="hidden" name="account_id" value="{{ $account_id }}">

                                <div class="mb-3">
                                    <label for="accounts_id" name="account_id">Select Bank Name</label>

                                    <select class="user-form selectpicker show-tick form-control"
                                        data-live-search="true" name="account_id">
                                        @foreach($accounts as $account_id)
                                        <option value="{{$account_id->id}}">{{ $account_id->account_name}}

                                        </option>

                                        @endforeach
                                        < /select>
                                </div>


                                <div class="mb-3">
                                    <label for="amount">Amount</label>
                                    <input type="text" name="amount" class="form-control" placeholder=" Enter Amount "
                                        aria-describedby="helpId" />
                                    <!-- <small id="helpId" class="text-muted">Help text</small> -->
                                </div>



                                <div class="mb-3">
                                    <label for="">Type</label>

                                    <select class="user-form selectpicker show-tick form-control"
                                        data-live-search="true" name="type">
                                        <option value="income">Income</option>
                                        <option value="expense">Expense</option>
                                        <option value="transfer">Transfer</option>
                                    </select>
                                </div>


                                <div class="mb-3">
                                    <label for="">Category</label>

                                    <select class="user-form selectpicker show-tick form-control"
                                        data-live-search="true" name="category">
                                        <option value="salary">Salary</option>
                                        <option value="tip">Tip</option>
                                        <option value="project">Project</option>
                                        <option value="food">Food</option>
                                        <option value="movie">Movie</option>
                                        <option value="bills">Bills</option>
                                        <option value="movie">Movie</option>
                                        <option value="medical">Medical</option>
                                        <option value="fees">fees</option>
                                    </select>
                                </div>



                                <!-- <div class="mb-3">
            <label for="">Account</label>
            <input type="text" name="account_name" id="city" class="form-control" placeholder="" aria-describedby="helpId">
             <small id="helpId" class="text-muted">Help text</small> -->
                                <!-- </div> -->
                                <div class="mb-3">
                                    <label>Note</label>
                                    <textarea class="form-control" name="note" rows="5" id="body"></textarea>
                                </div>




                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </div>
                </div>
                </form>
            </div>





            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous">
            </script>
</body>

</html>