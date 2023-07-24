<?php

    include_once './layout/header.php';

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "audit";

    $mysqlInstance = new Mysql ($servername, $username, $password, $database);

    $dailyReportList = $mysqlInstance-> getSingleReport ($_GET['id']);

?>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-4 justify-content-center">
                <form action="/functions/request.php" method="POST">
                    <input type="hidden" name="action" value="edit-report">
                    <input type="hidden" name="id" value="<?= $dailyReportList ['id'] ?>">
                    <div class="col-4 mb-6">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" id="date" name="date" class="form-control" value="<?= $dailyReportList ['date'] ?>">
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="transaction" class="form-label">Transaction</label>
                            <input type="number" id="transaction" name="transaction" class="form-control" value="<?= $dailyReportList ['daily_transaction'] ?>">
                        </div>
                        <div class="col">
                            <label for="startMoney" class="form-label">Start Money</label>
                            <input type="number" id="startMoney" name="startMoney" class="form-control" value="<?= $dailyReportList ['start_money'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="cash" class="form-label">Cash</label>
                            <input type="number" id="cash" name="cash" class="form-control" value="<?= $dailyReportList ['cash'] ?>">
                        </div>
                        <div class="col">
                            <label for="gcash" class="form-label">Gcash</label>
                            <input type="number" id="gcash" name="gcash" class="form-control" value="<?= $dailyReportList ['gcash'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="expenses" class="form-label">Expenses</label>
                            <input type="number" id="expenses" name="expenses" class="form-control" value="<?= $dailyReportList ['expenses'] ?>">
                        </div>
                        <div class="col">
                            <label for="otherExpenses" class="form-label">Other Expenses</label>
                            <input type="number" id="otherExpenses" name="otherExpenses" class="form-control"value="<?= $dailyReportList ['other_expenses'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="debt" class="form-label">Debt</label>
                            <input type="number" id="debt" name="debt" class="form-control" value="<?= $dailyReportList ['debt'] ?>">
                        </div>
                        
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php

    include_once './layout/footer.php';

?>