<?php
    
    // import your header file
    include_once './layout/header.php';

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "audit";

    $mysqlInstance = new Mysql ($servername, $username, $password, $database);

    $weeklyAuditList = $mysqlInstance->getAllWeeklyReport();

    
    
?>

<!-- <section>
    <div class="py-5">
        <div class="container"> -->
            <div class="">
                <!-- <div class="col-4side-navbar active-nav d-flex justify-content-between flex-wrap flex-column" id="sidebar"> -->
                    <!-- <form action="functions/request.php" method="POST" class="">
                        <input type="hidden" name="action" value="create-weekly-report">
                        <div class="d-flex align-items-center mb-5">
                            <label for="startDate" class="form-label mx-2">Start Date</label>
                            <input type="date" id="startDate" name="startDate" class="form-control w-50">
                            <label for="endDate" class="form-label mx-2">End Date</label>
                            <input type="date" id="endDate" name="endDate" class="form-control w-50">
                        </div>
                        <div class="d-flex align-items-center mb-5">
                            <label for="itemLost" class="form-label mx-3">Item Short</label>
                            <input type="number" id="itemLost" name="itemLost" class="form-control w-25">
                        </div>
                        <div class="mb-5">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </form> -->
                    <!-- <div class="p-1 my-container active-cont"> -->
                        <!-- Top Nav -->
                        <!-- <nav class="navbar top-navbar navbar-light bg-light px-5">
                            <a class="btn border-0" id="menu-btn"><i class="bx bx-menu"></i></a>
                        </nav>
                    </div>
                    <form action="functions/request.php" method="POST" class="">
                        <input type="hidden" name="action" value="create-weekly-report">
                        <div class="mb-5">
                            <label for="startDate" class="form-label mx-2">Start Date</label>
                            <input type="date" id="startDate" name="startDate" class="form-control w-50">
                            <label for="endDate" class="form-label mx-2">End Date</label>
                            <input type="date" id="endDate" name="endDate" class="form-control w-50">
                            <label for="itemLost" class="form-label mx-3">Item Short</label>
                            <input type="number" id="itemLost" name="itemLost" class="form-control w-25">
                        </div>
                        <div class="mb-5">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div> -->
                <div class="side-navbar active-nav bg-dark" id="sidebar">
                    <form action="functions/request.php" method="POST">
                        <input type="hidden" name="action" value="create-weekly-report">
                        <div class="container-fluid">
                            <div class="row">
                                <h5 class="py-3 text-warning">Input Weekly Audit</h5>
                                <div class="col mb-3">
                                    <label for="startDate" class="form-label">Start Date</label>
                                    <input type="date" id="startDate" name="startDate" class="form-control">
                                    <label for="endDate" class="form-label">End Date</label>
                                    <input type="date" id="endDate" name="endDate" class="form-control">
                                    <label for="itemLost" class="form-label">Item Short</label>
                                    <input type="number" id="itemLost" name="itemLost" class="form-control">
                                </div>
                            </div>
                            <div class="mb-5">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>
                        
                        
                        
                    </form>
                </div>

                <!-- Main Wrapper -->
                <div class="p-1 my-container active-cont">
                    <!-- Top Nav -->
                    <div class="navbar top-navbar navbar-dark bg-dark px-5">
                        <a class="btn border-0" id="menu-btn"><i class="bx bx-menu"></i></a>
                    </div>
                    <!--End Top Nav -->
                </div>
                <div class="container">
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="col">ID</th>
                                    <th class="col">Start Date</th>
                                    <th class="col">End Date</th>
                                    <th class="col">Gains</th>
                                    <th class="col">Losses</th>
                                    <th class="col text-primary">Total</th>
                                    <th class="col text-danger">Item Lost</th>
                                    <th class="col text-success">Grand Total</th>
                                    <th class="col-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($weeklyAuditList as $key => $value): ?>
                                    <tr>
                                        <td><?= $value['id'] ?></td>
                                        <td><?= date ("M d, Y", strtotime ($value['start_date'])) ?></td>
                                        <td><?= date ("M d, Y", strtotime ($value['end_date'])) ?></td>
                                        <td><?= $value['gain'] ?></td>
                                        <td><?= $value['loss'] ?></td>
                                        <td><?= $value['total'] ?></td>
                                        <td><?= $value['item_lost'] ?></td>
                                        <td><?= $value['grand_total'] ?></td>
                                        <td class="d-flex justify-content-end">
                                            <!-- <a href="/edit-report.php?id=<?= $value['id'] ?>" class="btn btn-warning me-2">Edit</a> -->
                                            <form action="/functions/request.php" method="POST">
                                                <!-- <input type="hidden" name="id" value=""> -->
                                                <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                                <input type="hidden" name="action" value="delete-weekly-report">
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
                
            </div>
        <!-- </div>
    </div>
</section> -->




<?php
    include_once './layout/footer.php';
       
      
?>