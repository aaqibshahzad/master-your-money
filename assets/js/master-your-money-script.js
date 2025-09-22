jQuery(document).ready(function() {
    jQuery('#starting-balance, #age, #salary').on('keypress', function(event) {
        var charCode = event.which || event.keyCode;
        
        if (charCode === 8 || charCode === 46 || charCode === 37 || charCode === 39) {
            return true;
        }
        
        if (charCode < 48 || charCode > 57) {
            event.preventDefault();
            return false;
        }
    });
});

let investmentChart;
function calculateInvestment() {
    jQuery('#show-difference').html('');
    var startingBalance = parseFloat(jQuery('#starting-balance').val());
    var currentAge = parseFloat(jQuery('#age').val());
    var salary = parseFloat(jQuery('#salary').val());
    var retirementAge = parseFloat(65);

    let futureValue = calculateFV(salary, retirementAge, startingBalance, currentAge);
}

function calculateFV(salary, retirementAge, startingBalance, currentAge) {
    // Create Age Array
    const age = [];
    let startAge = currentAge;
    age.push(startAge.toFixed(2));
    for (let i = currentAge; i < retirementAge; i += 1/12) {
        if (i + 1/12 <= retirementAge) {
            const incresAge = i + 1/12;
            age.push(incresAge.toFixed(2));
        }
    }

    // Calculate Balanced Index Portfolio
    const bIP = [];
    age.forEach(BIP);

    fetch(pluginUrl+'/master-your-money/json/unit-exit-price.json')
    .then((res) => {
        if (!res.ok) {
            throw new Error(`HTTP error! Status: ${res.status}`);
        }
        return res.json();
    })
    .then((data) => {
        const currentDate = new Date();
        const month = currentDate.getMonth() + 1;
        const year = currentDate.getFullYear();
        
        let startLoop = false;
        let counter = 0;
        var ageDiffrence = retirementAge - currentAge;
        const maxIterations = ageDiffrence * 12;

        const unitExitPriceValues = data.unitExitPriceValues;
        var totalUnits = 0;
        let first = 0;
        const displayFinalBalance = [];
        for (const [date, value] of Object.entries(unitExitPriceValues)) {
            if (date === `${month} ${year}`) {
                startLoop = true;
            }

            if (startLoop) {
                if (first == 0) {
                    let unitExitPrice = value;
                    // let balance = startingBalance * unitExitPrice
                    let unitsHeld = startingBalance / unitExitPrice;
                    let contribution = salary * 0.12 / 12;
                    let unitsBought = contribution / unitExitPrice;
                    let calculateTotalUnits = unitsHeld + unitsBought;
                    console.log(calculateTotalUnits)
                    
                    
                    totalUnits = calculateTotalUnits;
                    
                    var finalBalance = totalUnits * unitExitPrice;
                    // counter++;
            
                    // if (counter >= maxIterations) {
                    //     break; // Stop the loop after 240 iterations
                    // }
                    first = 1;
                    
                } else {
                    let unitExitPrice = value;
                    // let balance = totalUnits * unitExitPrice
                    let unitsHeld = startingBalance / unitExitPrice;
                    let contribution = salary * 0.12 / 12;
                    let unitsBought = contribution / unitExitPrice;
                    let calculateTotalUnits = unitsHeld + unitsBought;
    
                    totalUnits = calculateTotalUnits;
    
                    var finalBalance = totalUnits * unitExitPrice;
                    counter++;
                    
                    if (counter >= maxIterations) {
                        break; // Stop the loop after 240 iterations
                    }
                }
                displayFinalBalance.push(finalBalance.toFixed(2));
            }
        }
        // console.log(displayFinalBalance);
        let ul = jQuery('<ul></ul>');
        displayFinalBalance.forEach(function(value) {
            let li = jQuery('<li></li>').text(value);
            ul.append(li);
        });
        jQuery('#show-difference').append(ul);
    })
    .catch((error) => console.error("Unable to fetch data:", error));

    function BIP(item, index, arr) {
        // if (index == 0) {
        //     var unitExitPrice = 2.17324;
        // } else {
        //     var unitExitPrice = 2.19990;
        // }
    }
}