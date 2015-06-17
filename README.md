# PHP Sudoku Solver
## Class for solving sudoku puzzle

### Using:
* Just put 2D Array into **solve_it** method
* Call **getResult** method to see result
* Example:
<br />
$arr = array(<br />
    array(0, 6, 0, 0, 0, 0, 0, 3, 0),
    array(0, 0, 0, 5, 0, 0, 0, 0, 4),
    array(4, 1, 0, 0, 0, 9, 0, 2, 0),
    array(0, 0, 4, 0, 0, 0, 0, 0, 0),
    array(0, 3, 6, 0, 0, 0, 4, 8, 9),
    array(0, 0, 2, 4, 8, 6, 0, 0, 0),
    array(0, 2, 7, 0, 0, 0, 0, 9, 0),
    array(6, 0, 1, 9, 0, 0, 3, 0, 7),
    array(9, 4, 0, 0, 0, 5, 0, 1, 0),
);
$game = new Sudoku();
$game->solve_it($arr);
$game->getResult();
 
