 

function calculate() {
    var parcelWeight = parseFloat(document.getElementById('parcelWeightText').value);
    var parcelLength = parseFloat(document.getElementById('parcelLengthText').value);
    var parcelWidth = parseFloat(document.getElementById('parcelWidthText').value);
    var parcelHeight = parseFloat(document.getElementById('parcelHeightText').value);
    var parcelPlan_idComboBox = document.getElementById('parcelPlan_idComboBox').value;
    var parcelPlan_idComboBox = document.getElementById('parcelPlan_idComboBox').value;
    var overallWeight = (parcelLength * parcelWidth * parcelHeight)/6000;
    var courierService = 0;
    var untilDoor = 0;
    var pricePlan = 0;



    if (parcelPlan_idComboBox == 1) {

        if (document.getElementById('parcelCourierServiceCheck').checked == true) {
            courierService = 6;
        } else if (document.getElementById('parcelCourierServiceCheck').checked == false) {
            courierService = 0;
        }
        if (document.getElementById('parcelDeliveryType_idCheck').checked == true) {
            untilDoor = 2;
        } else if (document.getElementById('parcelDeliveryType_idCheck').checked == false) {
            untilDoor = 0;
        }

        pricePlan = 6;
        if (overallWeight > parcelWeight) {
            var priceUSD = (overallWeight - parcelWeight) * 2 + parcelWeight * pricePlan + courierService + untilDoor;
            priceRU = priceUSD * 77;
            priceUZS = priceUSD * 10400;
            document.getElementById("timediv").style.display = "unset";
            document.getElementById('currentTime').innerHTML = "Стоимость перевозки вашей посылки до точки назначение составит <b>" + priceRU + " рублей" + " или " + priceUZS + " сумов</b> или " + priceUSD + "долларов";

        } else if (overallWeight < parcelWeight) {
            var priceUSD = parcelWeight * pricePlan + courierService + untilDoor;
            priceRU = priceUSD * 77;
            priceUZS = priceUSD * 10400;
            document.getElementById("timediv").style.display = "unset";
            document.getElementById('currentTime').innerHTML = "Стоимость перевозки вашей посылки до точки назначение составит <b>" + priceRU + " рублей" + " или <b>" + priceUZS + " сумов</b> или " + priceUSD + " долларов";
        }


    } else if (parcelPlan_idComboBox == 2) {
        if (document.getElementById('parcelCourierServiceCheck').checked == true) {
            courierService = 6;
        } else if (document.getElementById('parcelCourierServiceCheck').checked == false) {
            courierService = 0;
        }
        if (document.getElementById('parcelDeliveryType_idCheck').checked == true) {
            untilDoor = 2;
        } else if (document.getElementById('parcelDeliveryType_idCheck').checked == false) {
            untilDoor = 0;
        }

        pricePlan = 10;
        if (overallWeight > parcelWeight) {
            var priceUSD = (overallWeight - parcelWeight) * 2 + parcelWeight * pricePlan + courierService + untilDoor;
            priceRU = priceUSD * 77;
            priceUZS = priceUSD * 10400;
            document.getElementById("timediv").style.display = "unset";
            document.getElementById('currentTime').innerHTML = "Стоимость перевозки вашей посылки до точки назначение составит <b>" + priceRU + " рублей" + " или " + priceUZS + " сумов или " + priceUSD + " долларов";

        } else if (overallWeight < parcelWeight) {
            var priceUSD = parcelWeight * pricePlan + courierService + untilDoor;
            priceRU = priceUSD * 77;
            priceUZS = priceUSD * 10400;
            document.getElementById("timediv").style.display = "unset";
            document.getElementById('currentTime').innerHTML = "Стоимость перевозки вашей посылки до точки назначение составит <b>" + priceRU + " рублей" + " или <b>" + priceUZS + " сумов или " + priceUSD + " долларов";
        }


    } else if (parcelPlan_idComboBox == 3) {
        if (document.getElementById('parcelCourierServiceCheck').checked == true) {
            courierService = 2;
        } else if (document.getElementById('parcelCourierServiceCheck').checked == false) {
            courierService = 0;
        }
        if (document.getElementById('parcelDeliveryType_idCheck').checked == true) {
            untilDoor = 6;
        } else if (document.getElementById('parcelDeliveryType_idCheck').checked == false) {
            untilDoor = 0;
        }

        pricePlan = 11;
        if (overallWeight > parcelWeight) {
            var priceUSD = (overallWeight - parcelWeight) * 2 + parcelWeight * pricePlan + courierService + untilDoor;
            priceRU = priceUSD * 77;
            priceUZS = priceUSD * 10400;
            document.getElementById("timediv").style.display = "unset";
            document.getElementById('currentTime').innerHTML = "Стоимость перевозки вашей посылки до точки назначение составит <b>" + priceRU + " рублей" + " или " + priceUZS + " сумов или " + priceUSD + " долларов";

        } else if (overallWeight < parcelWeight) {
            var priceUSD = parcelWeight * pricePlan + courierService + untilDoor;
            priceRU = priceUSD * 77;
            priceUZS = priceUSD * 10400;
            document.getElementById("timediv").style.display = "unset";
            document.getElementById('currentTime').innerHTML = "Стоимость перевозки вашей посылки до точки назначение составит <b>" + priceRU + " рублей</b>" + " или <b>" + priceUZS + " сумов или " + priceUSD + " долларов";
        }
    } else if (parcelPlan_idComboBox == 4) {
        if (document.getElementById('parcelCourierServiceCheck').checked == true) {
            courierService = 2;
        } else if (document.getElementById('parcelCourierServiceCheck').checked == false) {
            courierService = 0;
        }
        if (document.getElementById('parcelDeliveryType_idCheck').checked == true) {
            untilDoor = 6;
        } else if (document.getElementById('parcelDeliveryType_idCheck').checked == false) {
            untilDoor = 0;
        }

        pricePlan = 30;
        if (overallWeight > parcelWeight) {
            var priceUSD = (overallWeight - parcelWeight) * 2 + parcelWeight * pricePlan + courierService + untilDoor;
            priceRU = priceUSD * 77;
            priceUZS = priceUSD * 10400;
            document.getElementById("timediv").style.display = "unset";
            document.getElementById('currentTime').innerHTML = "Стоимость перевозки вашей посылки до точки назначение составит <b>" + priceRU + " рублей" + " или " + priceUZS + " сумов или " + priceUSD + " долларов";

        } else if (overallWeight < parcelWeight) {
            var priceUSD = parcelWeight * pricePlan + courierService + untilDoor;
            priceRU = priceUSD * 77;
            priceUZS = priceUSD * 10400;
            document.getElementById("timediv").style.display = "unset";
            document.getElementById('currentTime').innerHTML = "Стоимость перевозки вашей посылки до точки назначение составит <b>" + priceRU + " рублей</b>" + " или <b>" + priceUZS + " сумов или " + priceUSD + " долларов";
        }
    } else if (parcelPlan_idComboBox == 5) {
        if (document.getElementById('parcelCourierServiceCheck').checked == true) {
            courierService = 6;
        } else if (document.getElementById('parcelCourierServiceCheck').checked == false) {
            courierService = 0;
        }
        if (document.getElementById('parcelDeliveryType_idCheck').checked == true) {
            untilDoor = 2;
        } else if (document.getElementById('parcelDeliveryType_idCheck').checked == false) {
            untilDoor = 0;
        }

        pricePlan = 10;
        if (overallWeight > parcelWeight) {
            var priceUSD = (overallWeight - parcelWeight) * 2 + parcelWeight * pricePlan + courierService + untilDoor;
            priceRU = priceUSD * 77;
            priceUZS = priceUSD * 10400;
            document.getElementById("timediv").style.display = "unset";
            document.getElementById('currentTime').innerHTML = "Стоимость перевозки вашей посылки до точки назначение составит <b>" + priceRU + " рублей" + " или " + priceUZS + " сумов или " + priceUSD + " долларов";

        } else if (overallWeight < parcelWeight) {
            var priceUSD = parcelWeight * pricePlan + courierService + untilDoor;
            priceRU = priceUSD * 77;
            priceUZS = priceUSD * 10400;
            document.getElementById("timediv").style.display = "unset";
            document.getElementById('currentTime').innerHTML = "Стоимость перевозки вашей посылки до точки назначение составит <b>" + priceRU + " рублей</b>" + " или <b>" + priceUZS + " сумов или " + priceUSD + " долларов";
        }
    } else if (parcelPlan_idComboBox == 6) {
        if (document.getElementById('parcelCourierServiceCheck').checked == true) {
            courierService = 2;
        } else if (document.getElementById('parcelCourierServiceCheck').checked == false) {
            courierService = 0;
        }
        if (document.getElementById('parcelDeliveryType_idCheck').checked == true) {
            untilDoor = 6;
        } else if (document.getElementById('parcelDeliveryType_idCheck').checked == false) {
            untilDoor = 0;
        }

        pricePlan = 11;
        if (overallWeight > parcelWeight) {
            var priceUSD = (overallWeight - parcelWeight) * 2 + parcelWeight * pricePlan + courierService + untilDoor;
            priceRU = priceUSD * 77;
            priceUZS = priceUSD * 10400;
            document.getElementById("timediv").style.display = "unset";
            document.getElementById('currentTime').innerHTML = "Стоимость перевозки вашей посылки до точки назначение составит <b>" + priceRU + " рублей" + " или " + priceUZS + " сумов или " + priceUSD + " долларов";

        } else if (overallWeight < parcelWeight) {
            var priceUSD = parcelWeight * pricePlan + courierService + untilDoor;
            priceRU = priceUSD * 77;
            priceUZS = priceUSD * 10400;
            document.getElementById("timediv").style.display = "unset";
            document.getElementById('currentTime').innerHTML = "Стоимость перевозки вашей посылки до точки назначение составит <b>" + priceRU + " рублей</b>" + " или <b>" + priceUZS + " сумов или " + priceUSD + " долларов";
        }
    } else if (parcelPlan_idComboBox == 7) {
        if (document.getElementById('parcelCourierServiceCheck').checked == true) {
            courierService = 6;
        } else if (document.getElementById('parcelCourierServiceCheck').checked == false) {
            courierService = 0;
        }
        if (document.getElementById('parcelDeliveryType_idCheck').checked == true) {
            untilDoor = 2;
        } else if (document.getElementById('parcelDeliveryType_idCheck').checked == false) {
            untilDoor = 0;
        }

        pricePlan = 13;
        if (overallWeight > parcelWeight) {
            var priceUSD = (overallWeight - parcelWeight) * 2 + parcelWeight * pricePlan + courierService + untilDoor;
            priceRU = priceUSD * 77;
            priceUZS = priceUSD * 10400;
            document.getElementById("timediv").style.display = "unset";
            document.getElementById('currentTime').innerHTML = "Стоимость перевозки вашей посылки до точки назначение составит <b>" + priceRU + " рублей" + " или " + priceUZS + " сумов или " + priceUSD + " долларов";

        } else if (overallWeight < parcelWeight) {
            var priceUSD = parcelWeight * pricePlan + courierService + untilDoor;
            priceRU = priceUSD * 77;
            priceUZS = priceUSD * 10400;
            document.getElementById("timediv").style.display = "unset";
            document.getElementById('currentTime').innerHTML = "Стоимость перевозки вашей посылки до точки назначение составит <b>" + priceRU + " рублей</b>" + " или <b>" + priceUZS + " сумов или " + priceUSD + " долларов";
        }
    } else if (parcelPlan_idComboBox == 8) {
        if (document.getElementById('parcelCourierServiceCheck').checked == true) {
            courierService = 2;
        } else if (document.getElementById('parcelCourierServiceCheck').checked == false) {
            courierService = 0;
        }
        if (document.getElementById('parcelDeliveryType_idCheck').checked == true) {
            untilDoor = 6;
        } else if (document.getElementById('parcelDeliveryType_idCheck').checked == false) {
            untilDoor = 0;
        }

        pricePlan = 17;
        if (overallWeight > parcelWeight) {
            var priceUSD = (overallWeight - parcelWeight) * 2 + parcelWeight * pricePlan + courierService + untilDoor;
            priceRU = priceUSD * 77;
            priceUZS = priceUSD * 10400;
            document.getElementById("timediv").style.display = "unset";
            document.getElementById('currentTime').innerHTML = "Стоимость перевозки вашей посылки до точки назначение составит <b>" + priceRU + " рублей" + " или " + priceUZS + " сумов или " + priceUSD + " долларов";

        } else if (overallWeight < parcelWeight) {
            var priceUSD = parcelWeight * pricePlan + courierService + untilDoor;
            priceRU = priceUSD * 77;
            priceUZS = priceUSD * 10400;
            document.getElementById("timediv").style.display = "unset";
            document.getElementById('currentTime').innerHTML = "Стоимость перевозки вашей посылки до точки назначение составит <b>" + priceRU + " рублей</b>" + " или <b>" + priceUZS + " сумов или " + priceUSD + " долларов";
        }
    } else if (parcelPlan_idComboBox == 9) {
        if (document.getElementById('parcelCourierServiceCheck').checked == true) {
            courierService = 2;
        } else if (document.getElementById('parcelCourierServiceCheck').checked == false) {
            courierService = 0;
        }
        if (document.getElementById('parcelDeliveryType_idCheck').checked == true) {
            untilDoor = 6;
        } else if (document.getElementById('parcelDeliveryType_idCheck').checked == false) {
            untilDoor = 0;
        }

        pricePlan = 30;
        if (overallWeight > parcelWeight) {
            var priceUSD = (overallWeight - parcelWeight) * 2 + parcelWeight * pricePlan + courierService + untilDoor;
            priceRU = priceUSD * 77;
            priceUZS = priceUSD * 10400;
            document.getElementById("timediv").style.display = "unset";
            document.getElementById('currentTime').innerHTML = "Стоимость перевозки вашей посылки до точки назначение составит <b>" + priceRU + " рублей" + " или " + priceUZS + " сумов или " + priceUSD + " долларов";

        } else if (overallWeight < parcelWeight) {
            var priceUSD = parcelWeight * pricePlan + courierService + untilDoor;
            priceRU = priceUSD * 77;
            priceUZS = priceUSD * 10400;
            document.getElementById("timediv").style.display = "unset";
            document.getElementById('currentTime').innerHTML = "Стоимость перевозки вашей посылки до точки назначение составит <b>" + priceRU + " рублей</b>" + " или <b>" + priceUZS + " сумов или " + priceUSD + " долларов";
        }
    }
}

function myDate(daysToAddd) {
    var ttime = new Date();
    var startYear = ttime.getFullYear();
    var startMonth = ttime.getMonth();
    var startDay = ttime.getDate();
    var daysToAdd = daysToAddd;
    var sdate = new Date();
    var edate = new Date();
    var dayMilliseconds = 1000 * 60 * 60 * 24;
    sdate.setFullYear(startYear, startMonth, startDay);
    edate.setFullYear(startYear, startMonth, startDay + daysToAdd);
    var weekendDays = 0;
    while (sdate <= edate) {
        var day = sdate.getDay()
        if (day == 0 || day == 6) {
            weekendDays++;
        }
        sdate = new Date(+sdate + dayMilliseconds);
    }
    sdate.setFullYear(startYear, startMonth, startDay + weekendDays + daysToAdd);
    document.getElementById('currentTime').innerHTML = "Посылка прибудет примерно от <b>" + sdate.toLocaleDateString("ru-RU", {
        month: 'short',
        day: 'numeric'
    }, {
        timezone: "UTC"
    });
    document.getElementById("timediv").style.display = "unset";

    return sdate;
}

function myDate2(daysToAddd) {
    var ttime = new Date();
    var startYear = ttime.getFullYear();
    var startMonth = ttime.getMonth();
    var startDay = ttime.getDate();
    var daysToAdd = daysToAddd;
    var sdate = new Date();
    var edate = new Date();
    var dayMilliseconds = 1000 * 60 * 60 * 24;
    sdate.setFullYear(startYear, startMonth, startDay);
    edate.setFullYear(startYear, startMonth, startDay + daysToAdd);
    var weekendDays = 0;
    while (sdate <= edate) {
        var day = sdate.getDay()
        if (day == 0 || day == 6) {
            weekendDays++;
        }
        sdate = new Date(+sdate + dayMilliseconds);
    }
    sdate.setFullYear(startYear, startMonth, startDay + weekendDays + daysToAdd);
    console.log(sdate.toLocaleDateString("en", {
        timezone: "UTC"
    }));
    document.getElementById('currentTime2').innerHTML = "До <b>" + sdate.toLocaleDateString("ru-RU", {
        year: 'numeric',
        month: 'short',
        day: 'numeric'
    }, {
        timezone: "UTC"
    });
    // document.getElementById("timediv").style.display = "unset";

    return sdate;
    //.toUTCString()
}

function ClearFunction() {
    document.getElementById('parcelWeightText').value = "";
    document.getElementById('parcelLengthText').value = "";
    document.getElementById('parcelWidthText').value = "";
    document.getElementById('parcelHeightText').value = "";
    document.getElementById('parcelPlan_idComboBox').value = "";
    document.getElementById('currentTime').innerHTML = '';
    document.getElementById('currentTime2').innerHTML = '';
    document.getElementById("timediv").style.display = "none";
    document.getElementById("parcelDeliveryType_idCheck").checked = false;
    document.getElementById("parcelCourierServiceCheck").checked = false;


}

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if ((charCode > 31 && charCode < 48) || charCode > 57) {
        return false;
    }
    return true;
}

