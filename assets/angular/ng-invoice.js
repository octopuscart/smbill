
Admin.controller('invoiceConroller', function ($scope, $http, $timeout, $interval, $filter) {
    $scope.theaterLayout = {"layout": {}, "suggetion": [], "wheelchair": {}};

    var url = rootBaseUrl + "Api/" + layoutgbl;
    $http.get(url).then(function (rdata) {
        $scope.theaterLayout.layout = rdata.data;
        $scope.theaterLayout.wheelchair = rdata.data.wheelchair;

        $timeout(function () {
            for (wc in $scope.theaterLayout.wheelchair) {
                $("#" + wc).addClass("wheelchairseat");
            }
        }, 1000);
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


