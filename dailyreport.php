<?php
    
    // import your header file
    include_once './layout/header.php';

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "audit";

    $mysqlInstance = new Mysql ($servername, $username, $password, $database);

    
    // print_r ($dailyReportList);
    $page = isset ($_GET ['page']) ? $_GET ['page'] : 1;
    $searchDate = isset ($_GET ['searchDate']) ? $_GET['searchDate'] : '';
    $limit = isset ($_GET ['limit']) ? $_GET ['limit'] : 5;
    $offset = $page == 1 ? 0 : ($page - 1) * $limit;
    

    // $od = date_create ($dailyReportList['date']);
    // $formattedDate = date_format ($od, "F d, Y");
    // print_r ($formattedDate);
    $formattedDate = empty ($searchDate) ? '' : date ("Y-m-d", strtotime ($searchDate));
    print_r ($searchDate);
    $dailyReportList = $mysqlInstance->getAllDailyReport($formattedDate, $limit, $offset);
    $reportCount = $mysqlInstance->getReportTotalCount();
    $numberOfPages = ceil($reportCount['count(id)'] / $limit);

?>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-6"></div>
            <div class="col-2">
                    <form action="/functions/request.php" method="POST">
                        <!-- <input type="hidden" name="id" value=""> -->
                        
                        <input type="hidden" name="action" value="check">
                        <button class="btn btn-danger">
                            Check
                        </button>
                    </form>
            </div>
            <div class="col-4 d-flex justify-content-end">
                <!-- <div>
                

                    <form action="process.php" id="form">
                        <div class="form-group">
                            <label for="email">Date Of Birth:</label>
                            <input class="date form-control" type="text" name="date-of-birth">
                        </div>
                        <button type="button" class="btn btn-primary" id="btnSubmit">Submit</button>
                    </form>

                </div> -->
                <!-- <div>
                    <form class="row">
                        <label for="date" class="col-2 form-label text-center">Date</label>
                        <div class="col">
                            <div class="input-group date" id="datepicker">
                                <input type="text" class="form-control" id="date"/>
                                <span class="input-group-append">
                                    <span class="input-group-text bg-light d-block">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </form>
                </div> -->
                    
                <div class="mx-1">
                    <form action="/dailyreport.php" method="get" class = "input-group" id="datepicker" name="datepicker" autocomplete="off">
                        <!-- <input autocomplete="off" type="hidden"> -->
                        <input type="text" class="form-control" id="searchDate" name="searchDate" value="" >
                        <button type="submit" value="date" class="btn btn-primary">
                            <i class="bi bi-calendar"></i>
                        </button>
                    
                        
                        
                    </form>
                </div>
                <div class="mx-1 d-flex justify-content-end">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#dailyAuditModal">
                        Add Daily Report
                    </button>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col">
                <h1>Daily Audit</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col">ID</th>
                            <th class="col">Date</th>
                            <th class="col">Transaction</th>
                            <th class="col">Start Money</th>
                            <th class="col">Cash</th>
                            <th class="col">GCash</th>
                            <th class="col">Expenses</th>
                            <th class="col">Other Expenses</th>
                            <th class="col">Debt</th>
                            <th class="col text-primary">Actual Cash</th>
                            <th class="col text-danger">Supposed Cash</th>
                            <th class="col text-success">Outcome</th>
                            <th class="col-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dailyReportList as $key => $value): ?>
                            <tr>
                                <td><?= $value['id'] ?></td>
                                <td><?= date ("M d, Y", strtotime ($value['date'])) ?></td>
                                <td><?= $value['daily_transaction'] ?></td>
                                <td><?= $value['start_money'] ?></td>
                                <td><?= $value['cash'] ?></td>
                                <td><?= $value['gcash'] ?></td>
                                <td><?= $value['expenses'] ?></td>
                                <td><?= $value['other_expenses'] ?></td>
                                <td><?= $value['debt'] ?></td>
                                <td><?= $value['actual_cash'] ?></td>
                                <td><?= $value['supposed_cash'] ?></td>
                                <td><?= $value['outcome'] ?></td>
                                <td class="d-flex justify-content-end">
                                    <a href="/edit-report.php?id=<?= $value['id'] ?>" class="btn btn-warning me-2">Edit</a>
                                    <form action="/functions/request.php" method="POST">
                                        <!-- <input type="hidden" name="id" value=""> -->
                                        <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                        <input type="hidden" name="action" value="delete-report">
                                        <button class="btn btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                    
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div aria-label="Search Page Navigation" class="d-flex">
            <ul class="pagination">
                <il class="page-item">
                    <a href="<?= '/dailyreport.php?page='.($page - 1).'&limit='.$limit.'&offset='.$offset?>" class="text-white page-link bi bi-arrow-left-short"></a>
                </il>
                <il class="page-item d-flex">
                <?php for ($i = 0; $i < $numberOfPages; $i++): ?>
                    <a href="<?= '/dailyreport.php?page='.($i + 1).'&limit='.$limit.'&offset='.$offset?>" class="text-white page-link"><?= $i + 1 ?></a>
                <?php endfor;?>
                </il>
                <il class="page-item">
                    <a href="<?= '/dailyreport.php?page='.($page + 1).'&limit='.$limit.'&offset='.$offset?>" class="text-white page-link bi bi-arrow-right-short"></a>
                </il>
            </ul>
            <div class="px-2">
                <form action="" method ="GET">
                    <input type="text" placeholder="Limit" name="limit"class="form-control w-25" value="<?= $limit ?>">
                </form>
                
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="dailyAuditModal" tabindex="-1" aria-labelledby="dailyAuditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"id="dailyAuditModalLabel">Daily Audit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/functions/request.php" method="POST">
                    <input type="hidden" name="action" value="create-daily-report">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-6 mb-2">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" id="date" name="date" class="form-control">
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-6 mb-2">
                                <label for="transaction" class="form-label">Transaction</label>
                                <input type="text" id="transaction" name="transaction" class="form-control">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="startMoney" class="form-label">Start Money</label>
                                <input type="text" id="startMoney" name="startMoney" class="form-control">
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-6 mb-2">
                                <label for="cash" class="form-label">Cash</label>
                                <input type="text" id="cash" name="cash" class="form-control">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="gcash" class="form-label">GCash</label>
                                <input type="text" id="gcash" name="gcash" class="form-control">
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-6 mb-2">
                                <label for="expenses" class="form-label">Expenses</label>
                                <input type="text" id="expenses" name="expenses" class="form-control">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="otherExpenses" class="form-label">Other Expenses</label>
                                <input type="text" id="otherExpenses" name="otherExpenses" placeholder="0" class="form-control">
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-6 mb-2">
                                <label for="debt" class="form-label">Debt</label>
                                <input type="text" id="debt" name="debt" placeholder="0" class="form-control">
                            </div>
                            <!-- <div class="col-6 mb-2">
                                <label for="actualCash" class="form-label">Actual Cash</label>
                                <input type="text" id="actualCash" name="actualCash" placeholder="0" class="form-control">
                            </div> -->
                            
                        </div>
                        <!-- <div class="row">
                            <div class="col-6 mb-2">
                                <label for="supposedCash" class="form-label">Supposed Cash</label>
                                <input type="text" id="supposedCash" name="supposedCash" placeholder="0" class="form-control">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="outcome" class="form-label">Outcome</label>
                                <input type="text" id="outcome" name="outcome" placeholder="0" class="form-control">
                            </div>
                        </div> -->
                        
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Exit</button>
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

<?php
    include_once './layout/footer.php';
       
      
?>