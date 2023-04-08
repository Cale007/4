<?php

class Arena {

	public function __construct(private Warrior $warrior1, private Warrior $warrior2) {}

	// Simuluje zápas bojovníků
	public function fight() : void
	{
		// startovní pořadí
		$w1 = $this->warrior1;
        $w2 = $this->warrior2;
        echo("<h1>Vítejte v aréně!</h1>");
        echo("<p>Dnes se utkají $w1->name s $w2->name!</p>");
        // prohození bojovníků
        $startWarrior2 = rand(0, 1);
        if ($startWarrior2) {
			$w1 = $this->warrior2;
			$w2 = $this->warrior1;
		}
        echo("<p>Zápas začne bojovník $w1->name!<br />Zápas začíná..</p>");


		while ($w1->alive() && $w2->alive())
		{
			$w1->attack($w2);
			$this->listWarriors($w1, $w2);

			if ($w2->alive()) 
			{
				$w2->attack($w1);
				$this->listWarriors($w2, $w1);
			}
		}
    }

	private function listWarriors($w1, $w2) : void
	{
		echo('<hr /><p>');
		echo($w1->returnMessage()); // zpráva o útoku
		echo('<br />');
		echo($w2->returnMessage()); // zpráva o obraně
		echo('</p>' . $this->warrior1 . '<br />' . $this->warrior2); // Výpis bojovníků
    }
}
