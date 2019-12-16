<?php
    session_start();
    class Blackjack
    {
        /*creates the Blackjack objects and performs functions in combination with $_SESSION*/

        // constructor
        public function __construct($name)
        {
            $this->name = $name;
        }

        // properties

        public $playerScore = 0;

        public $player1Wins = 0;
        public $dealerWins = 0;
        public $blackjackCounter = 0;

        // methods

        function hit()
        {
            $this->blackjackCounter +=1;

            $newCard = rand(1, 11);
            $this->playerScore += $newCard;



            if ($this->playerScore > 21 && $this->name == "player1") {

                    $this->playerScore = 0;
                    $_SESSION['dealer']->playerScore = 0;
                    $_SESSION['dealer']->dealerWins += 1;

                    print_r("Player 1 over 21");
            }
        }

        function stand() {

            if ($this->name == "player1") {

                do {
                    $_SESSION['dealer']->hit();

                } while ($_SESSION['dealer']->playerScore < 15);

                if ($_SESSION['dealer']->playerScore > 21) {
                    $this->player1Wins += 1;
                    $this->playerScore = 0;
                    $_SESSION['dealer']->playerScore = 0;
                    print_r("dealer over 21");

                }

                 else {
                    switch ($_SESSION['dealer']->playerScore) {
                        case $this->playerScore > $_SESSION['dealer']->playerScore:
                            $this->player1Wins += 1;
                            print_r("{$this->playerScore} - {$_SESSION['dealer']->playerScore} / player 1 wins");
                            $this->playerScore = 0;
                            $_SESSION['dealer']->playerScore = 0;

                            break;
                        case $this->playerScore < $_SESSION['dealer']->playerScore:
                            $_SESSION['dealer']->dealerWins += 1;
                            print_r("{$this->playerScore} - {$_SESSION['dealer']->playerScore} / dealer wins");
                            $this->playerScore = 0;
                            $_SESSION['dealer']->playerScore = 0;

                            break;
                        case $this->playerScore == $_SESSION['dealer']->playerScore:
                            $_SESSION['dealer']->dealerWins += 1;
                            print_r("{$this->playerScore} - {$_SESSION['dealer']->playerScore} / equal, dealer wins");
                            $this->playerScore = 0;
                            $_SESSION['dealer']->playerScore = 0;

                            break;
                    }
                }



            }
        }

        function surrender() {

            if ($this->name = "player1") {
                $this->dealerWins += 1;
            }
        }

    }




?>
