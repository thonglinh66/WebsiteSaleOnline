const selected = document.querySelector(".selected");
var count = document.getElementsByName('category');
const optionsContainer = document.querySelector(".options-container");
var set = document.getElementById('Count');
const optionsList = document.querySelectorAll(".option");
var Money = document.getElementById('MoneyItem').innerHTML;

// for (var i = 0; i < count.length-1; i++){
//   count[i].addEventListener('click',getCount);
// }
// function getCount(){
//       set.innerHTML= this.value;
// }

selected.addEventListener("click", () => {
  optionsContainer.classList.toggle("active");
});

optionsList.forEach(o => {
  o.addEventListener("click", () => {
    var temp = o.querySelector("input").value * Money;
    set.innerHTML= temp;
    selected.innerHTML = o.querySelector("label").innerHTML ;
    var Total = Number(temp) + Number(Money);
    document.getElementById('Total').innerHTML = Total;
    document.getElementById('Total2').value = Total;
    optionsContainer.classList.remove("active");
  });
});


