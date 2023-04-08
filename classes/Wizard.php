<?php


class Wizard extends Warrior
{

	protected $mana;

	public function __construct(string $name, int $maxLife, int $attack, int $defense, protected int $maxMana, protected int $magicAttack)
	{
		$this->mana = $maxMana;
		parent::__construct($name, $maxLife, $attack, $defense);
	}


	public function attack(Warrior $opponent) : void
	{
		if ($this->mana < $this->maxMana)
		{
			$this->mana += 10; // Přidá manu
			if ($this->mana > $this->maxMana)
				$this->mana = $this->maxMana;
			parent::attack($opponent); // Klasický útok
		}
		else // Magický útok
		{
			$punch = $this->magicAttack + rand(1, 6);
			$this->setMessage("$this->name použil magii za $punch hp");
			$this->mana = 0; 
			$opponent->defense($punch);
		}
	}

	public function __toString() : string
	{
		return $this->pointer($this->name, 100, 15, $this->life, $this->maxLife, 'red') .
			   $this->pointer('Mana', 100, 15, $this->mana, $this->maxMana, 'blue');
	}

} 
