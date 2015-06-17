# PHP Sudoku Solver
## Class for solving sudoku puzzle

### Using:
* Just put 2D Array into **solve_it** method
* Call **getResult** method to see result
* Example:
```php
 
$arr = array(
    array(0,6,0, 0,0,0, 0,3,0),
    array(0,0,0, 5,0,0, 0,0,4),
    array(4,1,0, 0,0,9, 0,2,0),
    
    array(0,0,4, 0,0,0, 0,0,0),
    array(0,3,6, 0,0,0, 4,8,9),
    array(0,0,2, 4,8,6, 0,0,0),
    
    array(0,2,7, 0,0,0, 0,9,0),
    array(6,0,1, 9,0,0, 3,0,7),
    array(9,4,0, 0,0,5, 0,1,0),
);
$game = new Sudoku();
$game->solve_it($arr);
$game->getResult();
```
### How it works ?
* It works with backtracking algorithm. When you put array into *solve_it* method array go loop and check all cells. When find cell==0 program call other method that find all possible values that can be put in this cell than save row num and col num and values into other array and repeat this with all cells. If have conflict function return itself and try again. When all zero values are replaced and dont have conflicts method return ready solved array!

### What is backtracking algorithm ?
* Backtracking algorithms are adapted to solve the Sudoku that iterates all the possible solutions for the given sudoku. If the solutions assigned do not lead to the solution of Sudoku, the algorithm discards the solutions and rollbacks to the original solutions and retries again and hence the name backtracking.
* Example of backtracking:<br>
![alt tag](https://raw.githubusercontent.com/kirilkirkov/Sudoku-Solver/master/backtracking_mech.gif)
