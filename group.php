<?php


class Group
{
    private $name;
    private $teams;

    public function __construct($name, Group $group = null)
    {
        $this->name = $name;
        if ($group) {
            $this->teams = $group->teams;
        }
    }

    public function addTeam(Team $team)
    {
        $this->teams[] = $team;
        return $this;
    }

    public function generateCalendar()
    {
        echo '<br/>';
        $countTeams = count($this->teams);
        if ($countTeams % 2) {
            $this->teams[] = false;
            $countTeams++;

        }
        $playForRaund = $countTeams / 2;
        $twoArray = array_chunk($this->teams, $playForRaund);
        $topRow = $twoArray[0];
        $bottomRow = $twoArray[1];
        for ($i = 1; $i < $countTeams; $i++) {
            echo '<b>' . $this->name . '. Round ' . $i . '</b></br>';
            for ($k = 0; $k < $playForRaund; $k++) {
                if ($topRow[$k] && $bottomRow[$k])
                    echo $topRow[$k]->getFullName() . ' - ' . $bottomRow[$k]->getFullName() . '</br>';
            }

            $teamToTop = array_shift($bottomRow);
            $teamToBottom = array_pop($topRow);
            $bottomRow[] = $teamToBottom;
            array_splice($topRow, 1, 0, [$teamToTop]);
        }


    }
}