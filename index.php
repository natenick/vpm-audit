<?php
    
    include_once './layout/header.php';
?>

<!-- <section class="py-5">
    <div class="container">
        <div class="row"> -->
            <div class="col">
                <h1>Dashboard</h1>
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
                <div class="p-1 my-container active-cont">
                    <!-- Top Nav -->
                    <div class="navbar top-navbar navbar-dark bg-dark px-5">
                        <a class="btn border-0" id="menu-btn"><i class="bx bx-menu"></i></a>
                    </div>
                    <!--End Top Nav -->
                </div>
                <div class="container">
                    <div class="row">
                        <button class="btn btn-primary col-1" data-button="refetch-year-amount">
                        REFETCH
                        </button>
                        <div class="row gap-3">
                            <div class="col border rounded d-flex align-items-center justify-content-center gap-3" style="height: 100px" data-count="total-count-year">
                                <h3>Total Count:</h3>
                                <h1 data-amount="total-amount">0</h1>
                            </div>
                            <div class="col border rounded d-flex align-items-center justify-content-center gap-3" style="height: 100px">
                                <h3>Total Count:</h3>
                                <h1>1232</h1>
                            </div>
                        </div>
                        <!-- <div class="m-1">
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#dailyAuditModal">
                                Add Daily Report
                            </button>
                        </div> -->
                    </div>
                </div>
                
            </div>
        <!-- </div>
    </div>
</section> -->



<?php
    include_once './layout/footer.php';
?>
 