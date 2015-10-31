<?php
    class Application{
        function getArrayFromRequest(){
            $thearray = array(
                                'username'=>'username',
                                'post'=>'Var_Dump',
                                2=>'String',
                                3=>'Rand',
                                4=>'Variable',
                                5=>'" "');
            return $thearray;
        }
        
        function testGetArrayHasNameKey(){
            return true;
        }
        
        function testGetArrayPostKeyIsString(){
            
        }
    }
?>