<?php

interface MashineIntefface 
{
  public function signal(); //Подача звукового сигнала
  public function goUp(); //Движение вперёд
  public function goDown(); //Движение назад
}

//Общий класс
class Mashine implements MashineIntefface {
	public function signal(){
		echo $this->signal;
	}
	
	public function goUp(){
		echo 'Поехали вперёд ';
		echo $this->light;
	}
	public function goDown(){
		echo 'Поехали назад '.'<br>';
	}
	 public function getLight()
    {
         echo $this->light;
    }
    
    public function setLight($light)
    {
        $this->light = $light;
    }
}


//Класс Тракторы
class Tractor extends Mashine
{
  public $fixedKovsh = false;	
  public $signal = 'BeepT!'.'<br>';
  protected $light = 'Light-ON-T'.'<br>';
  public function beep() {
	  $this->signal();
  }
  public function jobKovsh(){
	  global $fixedKovsh;
	  if ($fixedKovsh){
		  $fixedKovsh = false;
		  echo 'Ковш опущен';
	  }		  
	  else {
		  $fixedKovsh = true;
		  echo 'Ковш поднят';
	  }
  }	  
  
}


//Класс грузовых авто
class Fura extends Mashine
{
  public $signal = 'BeepF!'.'<br>';
  protected $light = 'Light-OFF-F'.'<br>';
  public function beep() {
	  $this->signal();
  }
}


//Класс легковых авто
class Legkovoi extends Mashine
{
	public $signal = 'BeepF!'.'<br>';
  protected $light = 'Light-OFF-F'.'<br>';
  public function beep() {
	  $this->signal();
  }
}


class Premium extends Legkovoi
{
	protected $turbo = ' beeturbo ';
	protected $engine = ' Количество цилиндров - V12 ';
	protected $disk = ' Колёсные диски - 21\' ';
	protected $volume = ' Объём - 6000cm3 ';
	protected $color = ' Цвет - red ';
	protected $sound = ' Аудио система - Base 300 Watt ';
	protected $power = ' Мощность - 700 л.с. ';
	
	
	public function getInfoPremium()
    {
		echo $this->engine;
		echo $this->disk;
		echo $this->volume;
		echo $this->color;
		echo $this->sound;
		echo $this->power;
    }
    
    public function setInfoPremium($engine, $disk, $volume, $color, $sound, $power)
    {
		$this->engine = $engine;
		$this->disk = $disk;
		$this->volume = $volume;
		$this->color = $color;
		$this->sound = $sound;
		$this->power = $power;
    }
	
	public function forsazj (){
		echo $this->engine.' '.$this->turbo;
	}
}

$car = new Fura();

// функция подачи звукового сигнала
function testBeep(MashineIntefface $car) {
  $car->beep();
}

testBeep($car);

$BelTractor = new Tractor();
$BelTractor->beep(); 
$BelTractor->goUp();

//Функция вкл/откл света
function lightOnOff(MashineIntefface $car){
	$car->getLight();
	$car->setLight('Light-OFF-BT');
	$car->getLight();
	echo '<br>';
	$car->jobKovsh();
	echo '<br>';
	$car->jobKovsh();
	echo '<br>';
}

lightOnOff($BelTractor);

$Mers = new Premium();
$Mers->getInfoPremium();
echo '<br>';
$Mers->forsazj();

?>