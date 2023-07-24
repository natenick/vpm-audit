<?php
    date_default_timezone_set('Asia/Manila');
    
    require_once ('Mysql.php');
    $action = $_REQUEST['action'];

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "audit";

    $mysqlInstance = new Mysql ($servername, $username, $password, $database);

    if ($action == 'create-daily-report') {
        
        $rawDate = date_create ($_POST['date']);
        $date = date_format ($rawDate, "Y-m-d");
        
        $transaction = (int) $_POST['transaction'];
        $startMoney = (int) $_POST['startMoney'];
        $cash = (int) $_POST['cash'];
        $gcash = (int) $_POST['gcash'];
        $expenses = (int) $_POST['expenses'];
        $otherExpenses = (int) $_POST['otherExpenses'];
        $debt = (int) $_POST['debt'];
        
        $actualCash = (int) $startMoney + (int) $cash + (int) $gcash + (int) $expenses + (int) $otherExpenses + (int) $debt;
        

        $lastCreatedCash = $mysqlInstance->getLastCreatedCash();
        // echo '<pre>';
        // print_r ($lastCreatedCash);
        

        $supposedCash = (int) $lastCreatedCash[0]['start_money'] + (int) $transaction;
        // print_r ($supposedCash);
        // exit;
        $outcome = (int) $actualCash - (int) $supposedCash;

        // yyyy-MM-dd HH:mm:ss.SSS datetime format //
        // $tz = "Asia/Manila";
        // $timeStamp = time();
        // $dt = new DateTime ("now", new DateTimeZone($tz));
        // $dt->setTimeStamp ($timeStamp);
        // $createdAt = $dt->format('Y-m-d H:i:s');
        // // $createdAt = date('Y-m-d');
        // $updatedAt = $dt->format('Y-m-d H:i:s');
        $status = 'Closed';
        $createdAt = date("Y-m-d H:i:s");
        $updatedAt = date("Y-m-d H:i:s");

        $mysqlInstance->createDailyReport ($date, $transaction, $startMoney, $cash, $gcash, $expenses, $otherExpenses, $debt, $actualCash, $supposedCash, $outcome, $createdAt, $updatedAt, $status);
        // echo '<pre>';
        // print_r ($check);
        // exit;
    }

    // if ($action == 'date-sample') {
    //     $tz = "Asia/Manila";
    //     $timeStamp = time();
    //     $dt = new DateTime ("now", new DateTimeZone($tz));
    //     $dt->setTimeStamp ($timeStamp);
    //     $date = $dt->format ('Y-m-d H:i:s');
    //     // $date = date ('Y-m-d', $tz);
    //     // $formatted = date_format ($date, "Y-m-d");

    //     // print_r ($date);
    //     // exit;
    // }

    if ($action == 'edit-report') {
        
        $id = $_POST ['id'];
        $rawDate = date_create ($_POST['date']);
        $date = date_format ($rawDate, "Y-m-d");
        
        $transaction = (int) $_POST['transaction'];
        $startMoney = (int) $_POST['startMoney'];
        $cash = (int) $_POST['cash'];
        $gcash = (int) $_POST['gcash'];
        $expenses = (int) $_POST['expenses'];
        $otherExpenses = (int) $_POST['otherExpenses'];
        $debt = (int) $_POST['debt'];
        
        $actualCash = (int) $startMoney + (int) $cash + (int) $gcash + (int) $expenses + (int) $otherExpenses + (int) $debt;
        

        $lastCreatedCash = $mysqlInstance->getLastCreatedCashToEdit($id);
        // echo "<pre>";
        
        // print_r ($lastCreatedCash);
        // exit;
        $supposedCash = (int) $lastCreatedCash[0]['start_money'] + (int) $transaction;
        

        $outcome = (int) $actualCash - (int) $supposedCash;

        $createdAt = date("Y-m-d H:i:s");
        $updatedAt = date("Y-m-d H:i:s");
        

        $mysqlInstance->editReport ($id, $date, $transaction, $startMoney, $cash, $gcash, $expenses, $otherExpenses, $debt, $actualCash, $supposedCash, $outcome, $updatedAt);

    }

    if ($action == 'delete-report') {
        $id = $_POST['id'];
        $mysqlInstance->deleteReport ($id);
    }

    if ($action == 'check') {
        
        // echo "<br>";
        // print_r (date("Y-m-d H:i:s"));
        // echo "<br>";
        // print_r (date_default_timezone_set('Europe/London'));
        $date = "2023-06-10";
        $rawStartDate = date ("Y-m-d", strtotime ($date));

        print_r ($rawStartDate);
        // $formattedDate = strtotime ($date, "M d, Y");
        // print_r ($formattedDate);
        // $str = date (("2023-06-10"), strtotime ($date));
        // print_r ($str);
    }

    if ($action == 'create-weekly-report') {

        $startDate = date ("Y-m-d", strtotime ($_POST['startDate']));
        $endDate = date ("Y-m-d", strtotime ($_POST ['endDate']));

        $gainCount = $mysqlInstance->getAllGainCount($startDate, $endDate);
        $sumGainCount = (int) $gainCount['sum(outcome)'];
        // print_r ($sumGainCount);
        // exit;
        $lossCount = $mysqlInstance->getAllLossCount($startDate, $endDate);
        $sumLossCount = (int) $lossCount['sum(outcome)'];
        $totalCount = (int) $sumGainCount + (int) $sumLossCount;

        $itemShort = (int) $_POST ['itemLost'];

        $grandTotalCount = (int) $totalCount - $itemShort;


        $mysqlInstance->createWeeklyAuditReport ($startDate, $endDate, $sumGainCount, $sumLossCount, $totalCount, $itemShort, $grandTotalCount);
    }

    if ($action == 'delete-weekly-report') {
        $id = $_POST['id'];
        $mysqlInstance->deleteWeeklyReport ($id);
    }

    