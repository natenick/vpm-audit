<?php
    
    include_once './layout/header.php';
?>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Dashboard</h1>
                <button class="btn btn-primary" data-button="refetch-year-amount">
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
                <div class="m-1">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#dailyAuditModal">
                        Add Daily Report
                    </button>
                </div>
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
                            
                            
                        </div>
                        
                        
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
 