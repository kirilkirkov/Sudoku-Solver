# PHP Sudoku Solver
## Class for solving sudoku puzzle

### Using:
* Just put 2D Array into **solve_it** method
* Call **getResult** method to see result
* Example:
```php
 
$arr = array(<br />
    array(0, 6, 0, 0, 0, 0, 0, 3, 0),<br />
    array(0, 0, 0, 5, 0, 0, 0, 0, 4),<br />
    array(4, 1, 0, 0, 0, 9, 0, 2, 0),<br />
    array(0, 0, 4, 0, 0, 0, 0, 0, 0),<br />
    array(0, 3, 6, 0, 0, 0, 4, 8, 9),<br />
    array(0, 0, 2, 4, 8, 6, 0, 0, 0),<br />
    array(0, 2, 7, 0, 0, 0, 0, 9, 0),<br />
    array(6, 0, 1, 9, 0, 0, 3, 0, 7),<br />
    array(9, 4, 0, 0, 0, 5, 0, 1, 0),<br />
);<br />
$game = new Sudoku();<br />
$game->solve_it($arr);<br />
$game->getResult();<br />
```css
 
