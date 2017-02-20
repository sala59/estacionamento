<?php
  class PosicaoGPS{
    private $lat;
    private $lon;

    function __construct($lat, $lon){
      $this->lat = $lat;
      $this->lon = $lon;
    }

    function getLat(){
      return $this->lat;
    }
    function getLon(){
      return $this->lon;
    }

    function toString(){
      return "lat: ".$this->lat.", lon: ".$this->lon;
    }
  }	
 ?>
