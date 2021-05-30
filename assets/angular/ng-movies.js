
Admin.controller('theaterController', function ($scope, $http, $timeout, $interval, $filter) {
    $scope.theaterLayout = {"layout": {}, "suggetion": []};

    var url = rootBaseUrl + "Api/" + layoutgbl;
    $http.get(url).then(function (rdata) {
        $scope.theaterLayout.layout = rdata.data;
    }, function () {
    })

    $scope.seatSelection = {"selected": {}, "total": 0, "reserved": ""};



    $scope.selectSeat = function (seatobj, price) {
        console.log(seatobj, price);
        var seatlist = Object.keys($scope.seatSelection.selected);
        if ($scope.seatSelection.selected[seatobj]) {
            delete $scope.seatSelection.selected[seatobj];
        } else {
            $scope.seatSelection.selected[seatobj] = {'price': price, 'seat': seatobj};
        }
        const seatarray = [];
        for (sit in $scope.seatSelection.selected) {

            seatarray.push(sit);
        }
        $scope.seatSelection.reserved = seatarray.join(", ");
    }

    $scope.selectRemoveClass = function (seatobj, sclass) {
        $(".seaticon").removeClass("suggestion");
    }


})



Admin.controller('booknowEventController', function ($scope, $http, $timeout, $interval, $filter) {
    $scope.booking = {"no_of_seats": 1, "event_id": ""};
    $scope.selectBookingSeats = function (event_id) {
        $scope.booking.event_id = event_id;
    }

})


Admin.controller('updateEventController', function ($scope, $http, $timeout, $interval, $filter) {

    $scope.eventselectionSelection = {"templatelist": {}, "selected_template": "0", "datetimelist": {"100": {"event_time": event_time, "event_date": event_date}}};
    var tempdata = {"event_time": event_time, "event_date": event_date};

    var url = rootBaseUrl + "Api/getTheaterTemplate/" + theater_id;
    $http.get(url).then(function (rdata) {
        $scope.eventselectionSelection.templatelist = rdata.data;

    }, function () {
    });
    $scope.addNewDate = function () {
        var randomeno = Math.floor((Math.random() * 1000) + 1);
        $scope.eventselectionSelection.datetimelist[randomeno] = tempdata;
        $timeout(function () {
            jQuery('#datepicker' + randomeno).datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                startDate: new Date(),
                todayHighlight: true
            });
        }, 1000);
    }

    $scope.removeLastDate = function (removeid) {
        delete    $scope.eventselectionSelection.datetimelist[removeid];
    }

})


Admin.controller('sitSelectContoller', function ($scope, $http, $timeout, $interval, $filter) {
    $scope.theaterLayout = {"layout": {}, "seatscount": seatsgbl, "suggetion": []};

    var url = rootBaseUrl + "Api/" + layoutgbl + "/1?event_id=" + event_id + "&template_id=" + template_id;
    $http.get(url).then(function (rdata) {
        $scope.theaterLayout.layout = rdata.data;
    }, function () {
    })

    $scope.seatSelection = {"selected": {}, "total": 0};

    $scope.getTotalPrice = function () {
        var total = 0;
        for (k in $scope.seatSelection.selected) {
            var temp = $scope.seatSelection.selected[k].price;
            console.log(temp)
            total += Number(temp);
        }
        console.log(total)
        $scope.seatSelection.total = total;
        var seatlist = Object.keys($scope.seatSelection.selected);

    };

    $scope.selectSeat = function (seatobj, price) {
        swal({
            title: 'Choosing Seat(s)',
            onOpen: function () {
                swal.showLoading()
            }
        })
        var seatlist = Object.keys($scope.seatSelection.selected);
        if (seatlist.length == seatsgbl) {
            $scope.seatSelection.selected = {};
        }
        $timeout(function () {
            for (st in $scope.theaterLayout.suggetion) {
                var sgobj = $scope.theaterLayout.suggetion[st];
                if ($scope.seatSelection.selected[sgobj]) {
                    delete $scope.seatSelection.selected[sgobj];
                } else {
                    $scope.seatSelection.selected[sgobj] = {'price': price, 'seat': sgobj};
                }
            }
            swal.close();
            $scope.getTotalPrice();
        }, 500)
    }

    $scope.selectRemoveClass = function (seatobj, sclass) {
        $(".seaticon").removeClass("suggestion");
    }

    $scope.selectSeatSuggest = function (seatobj, sclass) {
        var seatcount = Number($scope.theaterLayout.seatscount);
        var seatlistselected = Object.keys($scope.seatSelection.selected);
        var selectedseatlength = seatlistselected.length;
        var seatcount_n = Number(seatsgbl);
        var avl_seatno = seatcount_n - selectedseatlength;
        if (selectedseatlength == seatcount_n) {
            avl_seatno = seatcount_n;
        }
        $scope.theaterLayout.suggetion = [];
        $(".seaticon").removeClass("suggestion");
        var prefix = seatobj.split("-")[0];
        var listofrow = $scope.theaterLayout.layout.sitclass[sclass].row[prefix];
        var count = 0;
        var seatlist = Object.keys(listofrow);
        var seatindex = seatlist.indexOf(seatobj);

        var slimit = (seatindex + avl_seatno);

        var suggestion = [];
        for (i = seatindex; i < slimit; i++) {
            var stobj = seatlist[i];
            if (listofrow[stobj] == 'A') {
                $scope.theaterLayout.suggetion.push(stobj);
                $("#" + stobj).addClass("suggestion");
            }
        }
    }

})
