$(function(){
    $('.datepicker').datepicker({ dateFormat: 'yy-dd-mm'});
});


var menu_btn = document.querySelector("#menu-btn");
var sidebar = document.querySelector("#sidebar");
var container = document.querySelector(".my-container");
// Switch drawer on and off
if (menu_btn) {
  menu_btn.addEventListener("click", () => {
    sidebar.classList.toggle("active-nav");
    container.classList.toggle("active-cont");
  });
}


console.log (menu_btn);



// const requestTotalCount = () => {}
// function requestTotalCount () {}

window.addEventListener('load', () => {

  const refetchYearAmountButtonEl = document.querySelector('[data-button="refetch-year-amount"]')

  if (refetchYearAmountButtonEl) {
    refetchYearAmountButtonEl.addEventListener('click', () => {
      requestTotalCount() 
    })
  }
})


const requestTotalCount = () => {
  axios
    .get('http://audit.test/functions/request.php?action=api-total-count-year')
    .then( response => {
      const countYearEl = document.querySelector('[data-count="total-count-year"]')
      const elementToReplaceAmount = countYearEl.querySelector('[data-amount="total-amount"]')
      elementToReplaceAmount.innerText = response.data.amount
    })
}
const date = document.getElementById("date");
const transaction = document.getElementById("transaction");
const startMoney = document.getElementById("startMoney");
const cash = document.getElementById("cash");
const gcash = document.getElementById("gcash");
const expenses = document.getElementById("expenses");
const otherExpenses = document.getElementById("otherExpenses");
const debt = document.getElementById("debt");


const apiCreateDailyReport = () => {
  axios
    .post('http://audit.test/functions/request.php?action=api-create-daily-report', {
      date: date,
      transaction: transaction,
      startMoney: startMoney,
      cash: cash,
      gcash: gcash,
      expenses: expenses,
      otherExpenses: otherExpenses;
      debt: debt
    })
    
}
