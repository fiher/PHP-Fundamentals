<?php
class Pokemon
{
    private $name;
    private $element;
    private $health;
    public function __construct(string $name, string $element, int $health)
    {
        $this->name = $name;
        $this->element = $element;
        $this->health = $health;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getElement(): string
    {
        return $this->element;
    }
    public function reduceHealth(int $value)
    {
        $this->health -= $value;
    }
    public function isAlive(): bool
    {
        return $this->health > 0;
    }
}
class Trainer
{
    private $name;
    private $badgesCount = 0;
    /**
     * @var Pokemon[]
     */
    private $pokemons = [];
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getBadgesCount(): int
    {
        return $this->badgesCount;
    }
    public function getPokemonCount(): int
    {
        return count($this->pokemons);
    }
    public function hasPokemonOfElement(string $element): bool
    {
        foreach ($this->pokemons as $name => $pokemon) {
            if ($pokemon->getElement() == $element) {
                return true;
            }
        }
        return false;
    }
    public function reducePokemonsHealth(int $value)
    {
        foreach ($this->pokemons as $name => $pokemon) {
            $pokemon->reduceHealth($value);
        }
    }
    public function removeDeadPokemons()
    {
        $this->pokemons = array_filter($this->pokemons, function (Pokemon $pokemon) {
            return $pokemon->isAlive();
        });
    }
    public function addBadge(int $badgesCount = 1)
    {
        $this->badgesCount += $badgesCount;
    }
    public function addPokemon(Pokemon $pokemon)
    {
        $this->pokemons[$pokemon->getName()] = $pokemon;
    }
    public function removePokemon(Pokemon $pokemon)
    {
        echo "REMOVED: {$pokemon->getName()}\n";
        unset($this->pokemons[$pokemon->getName()]);
    }
    public function __toString(): string
    {
        return "{$this->getName()} {$this->getBadgesCount()} {$this->getPokemonCount()}";
    }
}
class App
{
    const END_OF_DATA = "Tournament";
    const END_OF_TOURNAMENT = "End";
    /**
     * @var Trainer[]
     */
    private $trainers = [];
    public function start()
    {
        $this->processInput();
    }
    private function processInput()
    {
        while (true) {
            $line = $this->readLine();
            if ($line === self::END_OF_DATA) {
                break;
            }
            $tokens = explode(" ", $line);
            $trainer = null;
            if (!$this->trainerExists($tokens[0])) {
                $trainer = new Trainer($tokens[0]);
                $this->addTrainer($trainer);
            } else {
                $trainer = $this->getTrainerByName($tokens[0]);
            }
            $pokemon = new Pokemon($tokens[1], $tokens[2], intval($tokens[3]));
            $trainer->addPokemon($pokemon);
        }
        while (true) {
            $line = $this->readLine();
            if ($line === self::END_OF_TOURNAMENT) {
                break;
            }
            $element = $line;
            foreach ($this->trainers as $name => $trainer) {
                if ($trainer->hasPokemonOfElement($element)) {
                    $trainer->addBadge();
                } else {
                    $trainer->reducePokemonsHealth(10);
                    $trainer->removeDeadPokemons();
                }
            }
        }
        $this->printTrainers();
    }
    private function trainerExists(string $name): bool
    {
        return array_key_exists($name, $this->trainers);
    }
    private function addTrainer(Trainer $trainer)
    {
        $this->trainers[$trainer->getName()] = $trainer;
    }
    private function getTrainerByName(string $name): Trainer
    {
        return $this->trainers[$name];
    }
    private function printTrainers()
    {
        usort($this->trainers, function (Trainer $trainerA, Trainer $trainerB) {
            return -($trainerA->getBadgesCount() <=> $trainerB->getBadgesCount());
        });
        foreach ($this->trainers as $trainer) {
            $this->writeLine($trainer);
        }
    }
    private function readLine(): string
    {
        return trim(fgets(STDIN));
    }
    /**
     * @param $content mixed
     */
    private function writeLine($content)
    {
        echo $content . PHP_EOL;
    }
}
$app = new App();
$app->start();