'use strict';


describe('Solvency', function() {
    beforeEach(module('forms'));

    var $controller;

    beforeEach(inject(function(_$controller_){
        // The injector unwraps the underscores (_) from around the parameter names when matching
        $controller = _$controller_;
    }));

    Object.size = function(obj) {
        var size = 0, key;
        for (key in obj) {
            if (obj.hasOwnProperty(key)){
                size++;
            }
        }
        return size;
    };

    describe('$scope.grade', function() {
        var $scope, controller;

        beforeEach(function() {
            $scope = {};
            controller = $controller('SolvencyController', { $scope: $scope });
        });

        it('studies array should have 4 objects', function() {
            expect(Object.size($scope.studies)).toEqual(4);
        });

    });
});

