
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
            jQuery('#datepicker'+randomeno).datepicker({
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
