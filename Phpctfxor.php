<?php
/**
 * Created by andersongomes001.
 * Date: 09/10/19
 */

class Phpctfxor
{

    private $letras = array('0','1','2','3','4','5','6','7','8','9','a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k','l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
    private $a = array();
    private $b = array();
    private $c = array();
    private $palavra = "";
    /**
     * Phpfuhex constructor.
     */
    public function __construct($palavra)
    {
        $this->palavra = $palavra;
        $this->run();
    }
    private function run(){
        $p = str_split($this->palavra);
        foreach ($p as $l){
            $this->getLetra($l);
        }
        $this->getPayload();
    }
    private function getPayload(){
        $a = implode($this->a);
        $b = implode($this->b);
        $c = implode($this->c);
        echo "{$this->palavra} = '{$a}'^'{$b}'^'{$c}'\n";
    }
    private function getLetra($letra){
        $valido = false;
        shuffle($this->letras);
        foreach ($this->letras as $a){
            shuffle($this->letras);
            foreach ($this->letras as $b){
                shuffle($this->letras);
                foreach ($this->letras as $c){
                    if($letra === ( $a^$b^$c)){
                        if(($a != $b) and ($b != $c) and ($c != $a)){
                            array_push($this->a,$a);
                            array_push($this->b,$b);
                            array_push($this->c,$c);
                            $valido = true;
                        }
                    }
                }
                if($valido){
                    break;
                }
            }
            if($valido){
                break;
            }
        }
    }
}
