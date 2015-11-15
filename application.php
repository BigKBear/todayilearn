<?php
    class Application{
        function getArrayFromRequest(){
            $thearray = array(
                                'username'=>"steve",
                                'post'=>"Today I learnt that you can only treat your friends so badly before they quit working for you and go and work for Halutte(sp)",
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