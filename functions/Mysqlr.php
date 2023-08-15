<?php

    class Mysql {

        public $conn;

        public function __construct ($servername, $username, $password, $database) {

            $servername = "localhost";
            $username = "root";
            $password = "root";
            $database = "audit";

            $this->conn = new mysqli ($servername, $username, $password, $database);

            if ($this->conn->connect_error) {
                die ("Connection Failed: " . $this->conn->connect_error);
            }
            
        }
        
        function getAllDailyReport ($formattedDate, $limit, $offset) {
            $getAllDailyReportQuery = " select * from daily_report where date like '%$formattedDate%' order by date desc";

            $getAllDailyReportQuery .= " limit ".$limit." ";

            if ($offset != '') {
                $getAllDailyReportQuery .= " offset ".$offset." ";
            }

            $result = $this->conn->query ($getAllDailyReportQuery);
            
            $dailyReport = [];
            while ($row = $result->fetch_assoc()) {
                $dailyReport [] = $row;
            };
            
            return $dailyReport;
        }
        
        function getLastCreatedCash () {
            $getLastCreatedCashQuery = " select start_money from daily_report order by createdAt desc limit 1";

            $result = $this->conn->query ($getLastCreatedCashQuery);
            
            // print_r ($getLastCreatedCashQuery);
            // exit;

            $getStartMoney = [];
            while ($row = $result->fetch_assoc()) {
                $getStartMoney [] = $row;
            };
            return $getStartMoney;
            // return $result;
        }

        function createDailyReport ($date, $transaction, $startMoney, $cash, $gcash, $expenses, $otherExpenses, $debt, $actualCash, $supposedCash, $outcome, $createdAt, $updatedAt, $status) {

            $createDailyReportQuery = "
            insert into daily_report (date, daily_transaction, start_money, cash, gcash, expenses, other_expenses, debt, actual_cash, supposed_cash, outcome, createdAt, updatedAt, status)
            values ('$date', $transaction, $startMoney, $cash, $gcash, $expenses, $otherExpenses, $debt, $actualCash, $supposedCash, $outcome, '$createdAt', '$updatedAt', '$status')";
            // print_r ($createDailyReportQuery);
            // exit;
            $result = $this->conn->query($createDailyReportQuery);
            // print_r ($result);
            // exit;
            

            // if ($result) {
                
            //     header('Location: /dailyreport.php');
            // } else {
            //     print_r('Error: '.$this->conn);
            // }
            if ($result) {
                return true;
            } else {
                return false;
            }
        }

        function getSingleReport ($id) {
            $getSingleReportQuery = "select * from daily_report where id = ".$id."; ";

            $result = $this->conn->query($getSingleReportQuery);
            

            $getSingleReport = [];
            while ($row = $result->fetch_assoc()) {
                $getSingleReport = $row;
            }
            return $getSingleReport;
        }

        function deleteReport ($id) {
            $deleteReportQuery = "delete from daily_report where id = $id"; 

            $result = $this->conn->query ($deleteReportQuery);

            if ($result) {
                header ("Location: /dailyreport.php");
                }
                else {
                print_r ('Error : '.$this->conn);    
                }
                
        }

        function editReport ($id, $date, $transaction, $startMoney, $cash, $gcash, $expenses, $otherExpenses, $debt, $actualCash, $supposedCash, $outcome, $updatedAt) {
            $editReportQuery = " update daily_report set date='$date', daily_transaction=$transaction, start_money=$startMoney, cash=$cash, gcash=$gcash, expenses=$expenses, other_expenses=$otherExpenses, debt=$debt, actual_cash=$actualCash, supposed_cash=$supposedCash, outcome=$outcome, updatedAt='$updatedAt'
                where id=$id;";

            $result=$this->conn->query($editReportQuery);
            // print_r ($editReportQuery);
            // echo "<br>";
            // print_r ($supposedCash);
            // echo ('<pre>');
            if ($result) {
                header ('Location: /dailyreport.php');
            } else {
                print_r ('Error: ' .$this->conn);
            }
        }
        
        function getLastCreatedCashToEdit($id) {
            // $getLastCreatedCashToEditQuery = " select start_money from daily_report order by createdAt desc limit 1, 1";
            $getLastCreatedCashToEditQuery = " select start_money from daily_report where id < $id order by id desc";
            
        $result = $this->conn->query($getLastCreatedCashToEditQuery);
            // echo "<pre>";
            // // echo "<br>";
            // print_r ($getLastCreatedCashToEditQuery);
            // // exit;
        $getLastCreatedCashToEdit = [];
        while ($row = $result->fetch_assoc()) {
            $getLastCreatedCashToEdit [] = $row;
        };
        return $getLastCreatedCashToEdit;
        
        }

        // function searchDate ($searchDate) {
        //     $searchDateQuery = "select * from daily_report where date = $searchDate ";

        //     $result = $this->conn->query ($searchDateQuery);

        //     $dateSearch = [];
        //     while ($row = $result->fetch_assoc()) {
        //         $dateSearch [] = $row;
        //     };
            
        //     return $dateSearch;
        // }

        function getReportTotalCount() {
            // $sqlQuery = "select count(id) from users where name like '%$formattedDate%'";
            $sqlQuery = "select count(id) from daily_report";
            $result = $this->conn->query($sqlQuery);
            
            
            $reportCount = [];
            while ($row = $result->fetch_assoc()) {
                $reportCount = $row;
            };
            
            return $reportCount;
        }

        function getAllWeeklyReport () {
            $getAllWeeklyReportQuery = " select * from weekly_audit_report";

            $result = $this->conn->query($getAllWeeklyReportQuery);

            $weeklyReport = [];
            while ($row = $result->fetch_assoc()) {
                $weeklyReport [] = $row;
            }

            return $weeklyReport;
        }

        function getAllGainCount ($startDate, $endDate) {
            // $getAllGainCountQuery = "select * from daily_report where outcome >= 0 and date between '$startDate' and '$endDate'";
            $getAllGainCountQuery = "select sum(outcome) from daily_report where outcome >= 0 and date between '$startDate' and '$endDate'";
            // print_r ($getAllGainCountQuery);
            
            $result = $this->conn->query($getAllGainCountQuery);
            // echo "<br>";
            // echo "<pre>";
            // echo "<br>";
            // print_r ($result);
            // echo "<br>";
            
            // print_r ($result->num_rows);
            // exit;

            $gainCount = [];
            while ($row = $result->fetch_assoc()) {
                $gainCount = $row;
            };
            
            return $gainCount;
            // return $result;

        }

        function getAllLossCount ($startDate, $endDate) {
            // $getAllLossQuery = "select * from daily_report where outcome >= 0 and date between '$startDate' and '$endDate'";
            $getAllLossQuery = "select sum(outcome) from daily_report where outcome < 0 and date between '$startDate' and '$endDate'";
            // print_r ($getAllLossQuery);
            
            $result = $this->conn->query($getAllLossQuery);
            
            $lossCount = [];
            while ($row = $result->fetch_assoc()) {
                $lossCount = $row;
            };
            
            return $lossCount;
            

        }

        function createWeeklyAuditReport ($startDate, $endDate, $gainCount, $lossCount, $totalCount, $itemShort, $grandTotalCount) {
            $createWeeklyAuditReportQuery = "insert into weekly_audit_report (start_date, end_date, gain, loss, total, item_lost, grand_total)
                                            values ('$startDate', '$endDate', $gainCount, $lossCount, $totalCount, $itemShort, $grandTotalCount)";
                                            
            $result = $this->conn->query($createWeeklyAuditReportQuery);
            // print_r ($result);
            // exit;


            //
            // [NOTES]: COMMENT KO ULIT UNG BABAGUHIN SA PROCESS KAPAG NAKA API KANA ETO UNG SINASABI KONG HNDI KANA MAG REREDIRECT
            // ANG MANGYAYARI NA IS IRERETURN MO NA KUNG TRUE OR FALSE KUNG NAG EXECUTE NG MAAYOS UNG QUERY MO
            //

            // if ($result) {
            //     header('Location: /weeklyauditreport.php');
            // } else {
            //     print_r('Error: '.$this->conn);
            // }

            if ($result) {
                return true;
            } else {
                return false;
            }
        }

        function deleteWeeklyReport ($id) {
            $deleteWeeklyReportQuery = "delete from weekly_audit_report where id = $id"; 

            $result = $this->conn->query ($deleteWeeklyReportQuery);

            if ($result) {
                header ("Location: /weeklyauditreportr.php");
                }
                else {
                print_r ('Error : '.$this->conn);    
                }
                
        }
        
        function getAmountYear ($year) {
            $sqlQuery = "select SUM(daily_transaction) from daily_report where date like '%$year%' ";

            $result = $this->conn->query($sqlQuery);

            $newResult = "";
            while ($row = $result->fetch_assoc()) {
                $newResult = $row;
            };

            return $newResult;
        }
        
    }

