<?php
    class Application{
        function getArrayFromRequest(){
            $thearray = array(
                                'username'=>'username',
                                1=>'Var_Dump',
                                2=>'String',
                                3=>'Rand',
                                4=>'Variable',
                                5=>'" "');
            return $thearray;
        }
        
        function testGetArrayHasNameKey(){
            return true;
        }
    }
?>