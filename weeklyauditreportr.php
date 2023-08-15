<?php
    
    // import your header file
    include_once './layout/header.php';


    // $servername = "localhost";
    // $username = "root";
    // $password = "root";
    // $database = "audit";

    // $mysqlInstance = new Mysql ($servername, $username, $password, $database);

    // $weeklyAuditList = $mysqlInstance->getAllWeeklyReport();

    
    
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
                    <form action="functions/requestr.php" method="POST" id="weekly-form">
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
                            <tbody data-table-body="weekly-report">
                                <!-- <?php foreach ($weeklyAuditList as $key => $value): ?>
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
                                            <a href="/edit-report.php?id=<?= $value['id'] ?>" class="btn btn-warning me-2">Edit</a>
                                            <form action="/functions/request.php" method="POST">
                                                <input type="hidden" name="id" value="">
                                                <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                                <input type="hidden" name="action" value="delete-weekly-report">
                                                <button class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                            
                                        </td>
                                    </tr>
                                <?php endforeach ?> -->
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        <!-- </div>
    </div>
</section> -->



<div class="toast-container position-fixed p-3 top-0 end-0" >
    <div class="toast bg-success  border-0" role="alert" aria-live="assertive" aria-atomic="true" data-toast="success-toast">
        <div class="d-flex">
            <div class="toast-body">
                Save Success!
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    <div class="toast text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true" data-toast="fail-toast">
        <div class="d-flex">
            <div class="toast-body">
                Save Fail!
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<?php
    include_once './layout/footer.php';

      
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script>
    // construct your form submission 
    const weeklyForm = document.querySelector("#weekly-form")
                    
    // construct your submit function
    weeklyForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        // construct your payload to submit to your request.php (eto ung data na ipapasa mo / isasave mo)
        // kinuha mo ung element (document.querySelector('[name="startDate"]')) tpos kinuha mo ung value nung field na un (.value)
        const startDateValue = document.querySelector('[name="startDate"]').value
        const endDateValue = document.querySelector('[name="endDate"]').value
        const itemLostValue = document.querySelector('[name="itemLost"]').value
        const actionValue = document.querySelector('[name="action"]').value
        

        // you should construct your form fields value on formdata para marecognize ng api endpoint mo na ung payload na isesend mo is 
        // galing sa html form
        const formData = new FormData();
        formData.append('action', actionValue);
        formData.append('startDate', startDateValue);
        formData.append('endDate', endDateValue);
        formData.append('itemLost', itemLostValue);

        // axios.post (.post) eto ung method na gagamitin mo then ung first parameter sa post function is ung endpoint
        // second parameter is ung isesend mo na data
        await axios
            .post(`functions/requestr.php`, formData)
            .then(response => {
                const responseData = response.data
                
                // check mo kung true or false para malaman mo next step na gagawin mo kung sakaling nag success or fail
                if (responseData === true) {
                    // here you add your next step if save success
                    showSuccessToast()
                    // since success ititrigger ko ung fetching ng weekly report mo 
                    fetchWeeklyReport()
                } else {
                    // here you add your next step if save fails
                    showFailToast()
                }
            })
    })

    // gumawa ako fetching ng weekly report para on api narin sya kaya makikita mo naka comment ung nasa table mo sa taas
    // at ung php data sa pinaka taas
    const fetchWeeklyReport = async () => {
        const weeklyReportTableBody = document.querySelector('[data-table-body="weekly-report"]')
        
        await axios
            .get(`functions/requestr.php?action=get-weekly-report-api`)
            .then( response => {
                const responseData = response.data
                console.log (responseData);

                let rowsToAppendOnTableBody = "";

                // etong .map na to parang foreach to ng php basically niloop nya ung array same process ng php mo
                // tapos kinoconcatinate ko sa rowsToAppendOnTableBody every time na mag loop sya then ididisplay ko sa
                // table mo ung na collate na html string nito rowsToAppendOnTableBody
                responseData.map( (value, key) => {
                    rowsToAppendOnTableBody += `<tr>
                        <td>${value['id']}</td>
                        <td>${moment(value['start_date']).format('MMM D, YYYY')}</td>
                        <td>${moment(value['end_date']).format('MMM D, YYYY')}</td>
                        <td>${value['gain']}</td>
                        <td>${value['loss']}</td>
                        <td>${value['total']}</td>
                        <td>${value['item_lost']}</td>
                        <td>${value['grand_total']}</td>
                        <td class="d-flex justify-content-end">
                            <!-- <a href="/edit-report.php?id=${value['id']}" class="btn btn-warning me-2">Edit</a> -->
                            <form action="/functions/requestr.php" method="POST">
                                <!-- <input type="hidden" name="id" value=""> -->
                                <input type="hidden" name="id" value=${value['id']}>
                                <input type="hidden" name="action" value="delete-weekly-report">
                                <button class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>`
                })

                // so eto ung pandisplay ko sa table body mo .innerHTML
                weeklyReportTableBody.innerHTML = rowsToAppendOnTableBody

            })
    }


    // tinawag ko ung fetching ng weekly mo on load para may initial data sya na ididisplay sa table mo
    fetchWeeklyReport()



    
    // WALA TO EPAL LANG TO TOAST LANG 
    const showSuccessToast = () => {
        let toastElList = [].slice.call(document.querySelectorAll('[data-toast="success-toast"]'))
        let toastList = toastElList.map(function(toastEl) {
            return new bootstrap.Toast(toastEl)
        })
        toastList.forEach(toast => toast.show())
    }
    const showFailToast = () => {
        let toastElList = [].slice.call(document.querySelectorAll('[data-toast="fail-toast"]'))
        let toastList = toastElList.map(function(toastEl) {
            return new bootstrap.Toast(toastEl)
        })
        toastList.forEach(toast => toast.show())
    }
</script>