<?php

class Warrior {
	
	protected $life;
	
	protected $message = '';

	public function __construct(public string $name, protected int $maxLife, protected int $attack, protected int $defense)
	{
		$this->life = $maxLife;
	}

	public function attack(Warrior $opponent) : void
	{
		$punch = $this->attack + rand(1, 6);
		$this->setMessage("$this->name útočí s úderem za $punch hp");
		$opponent->defense($punch);
	}


	public function defense(int $punch) : void
	{
		$injury = $punch - ($this->defense + rand(1, 6));
		if ($injury > 0)
		{
			$this->life -= $injury;
			$this->message = "$this->name utrpěl poškození $injury hp";
			if ($this->life <= 0)
			{
				$this->life = 0;
				$this->message .= " a zemřel";
			}
		} else
			$this->message = "$this->name odrazil útok";
	}


	public function alive() : bool
	{
		return ($this->life > 0);
	}

	protected function setMessage(string $message) : void
	{
		$this->message = $message;
	}


	public function returnMessage() : string
	{
		return $this->message;
	}


	protected function pointer(string $text, int $width, int $height, int $value, int $maximum, string $color) : string
	{
		return '
		<div style="border: 1px solid ' . $color . '; width:' . ($width + 10) . 'px; height: ' . ($height + 10) . 'px;">
			<div style="background: ' . $color . '; width:' .  round(($value / $maximum) * $width) . 'px; height: ' . $height . 'px; color: white; padding: 5px;">' . htmlspecialchars($text) . '</div>
		</div>';
	}


	public function __toString() : string
	{
		return $this->pointer($this->name, 100, 15, $this->life, $this->maxLife, 'green');
	}
}
