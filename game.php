<?php
require_once ('blackjack.php');

session_start();


if (isset($_SESSION['player1']) && isset($_SESSION['dealer'])) {

} else {

    $player1 = new Blackjack("player1");
    $dealer = new Blackjack("dealer");

    $_SESSION["player1"] = $player1;
    $_SESSION["dealer"] = $dealer;

}

switch ($_REQUEST['button']) {
    case 'Hit': $_SESSION['player1']->hit();
                break;
    case 'Stand': $_SESSION['player1']->stand();
                 break;
    case 'Surrender': $_SESSION['player1']->surrender();
                break;
}

?>


<html>
<body>


<div id="gamecontainer" class="gamecontainer">
    <div><?php
        if($_SESSION["player1"]->playerScore == 21  && $_SESSION["player1"]->blackjackCounter == 2) {
            echo "BLACKJACK player1";

        } elseif ($_SESSION['dealer']->blackjackCounter == 2 && $_SESSION['dealer']->playerScore == 21) {
            echo "BLACKJACK dealer";
        }
        ?></div>

    <div><?php echo "Player 1 wins = {$_SESSION['player1']->player1Wins}  -  Dealer wins = {$_SESSION['dealer']->dealerWins}"?></div>

    <div><?php echo "Player 1 score = {$_SESSION['player1']->playerScore}"?></div>

    <form action = "" method ="POST">
        <input type="submit" name="button" value="Hit">
        <input type="submit" name="button" value="Stand">
        <input type="submit" name="button" value="Surrender">
    </form>



</div>



</body>
</html>