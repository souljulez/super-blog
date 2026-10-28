<?php

describe('sum', function(){ // use "describe" to group related tests together

    it('performs sums', function(){ // use "it" instead of "test"
        $result = array_sum([1, 2]);

        expect($result)->toBe(3);
    });

    it('may sum floats', function(){
        $result = array_sum([1.5, 2.5]);

        expect($result)->toBe(4.0);
    });


});
