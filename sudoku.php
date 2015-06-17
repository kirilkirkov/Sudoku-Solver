<?php

class Sudoku {

    private $comming_arr = array();
    private $grids = array();
    private $columns_begining = array();

    private function set_grids() { //MAKE GRIDS
        $grids = array();
        foreach ($this->comming_arr as $k => $row) {
            if ($k <= 2) {
                $row_num = 1;
            }
            if ($k > 2 && $k <= 5) {
                $row_num = 2;
            }
            if ($k > 5 && $k <= 8) {
                $row_num = 3;
            }

            foreach ($row as $kk => $r) {
                if ($kk <= 2) {
                    $col_num = 1;
                }
                if ($kk > 2 && $kk <= 5) {
                    $col_num = 2;
                }
                if ($kk > 5 && $kk <= 8) {
                    $col_num = 3;
                }
                $grids[$row_num][$col_num][] = $r;
            }
        }
        $this->grids = $grids;
    }

    private function set_columns() { //ORDER BY COLUMNS
        $columns_begining = array();
        $i = 1;
        foreach ($this->comming_arr as $k => $row) {
            $e = 1;
            foreach ($row as $kk => $r) {
                $columns_begining[$e][$i] = $r;
                $e++;
            }
            $i++;
        }
        $this->columns_begining = $columns_begining;
    }

    private function get_possibilities($k, $kk) { //GET POSSIBILITIES FOR GIVEN CELL
        $values = array();
        if ($k <= 2) {
            $row_num = 1;
        }
        if ($k > 2 && $k <= 5) {
            $row_num = 2;
        }
        if ($k > 5 && $k <= 8) {
            $row_num = 3;
        }

        if ($kk <= 2) {
            $col_num = 1;
        }
        if ($kk > 2 && $kk <= 5) {
            $col_num = 2;
        }
        if ($kk > 5 && $kk <= 8) {
            $col_num = 3;
        }

        for ($n = 1; $n <= 9; $n++) {
            if (!in_array($n, $this->comming_arr[$k]) && !in_array($n, $this->columns_begining[$kk + 1]) && !in_array($n, $this->grids[$row_num][$col_num])) {
                $values[] = $n;
            }
        }
        shuffle($values);
        return $values;
    }

    public function solve_it($arr) {
        while (true) {
            $this->comming_arr = $arr;

            $this->set_columns();
            $this->set_grids();

            $ops = array();
            foreach ($arr as $k => $row) {
                foreach ($row as $kk => $r) {
                    if ($r == 0) {
                        $pos_vals = $this->get_possibilities($k, $kk);
                        $ops[] = array(
                            'rowIndex' => $k,
                            'columnIndex' => $kk,
                            'permissible' => $pos_vals
                        );
                    }
                }
            }

            if (empty($ops)) {
                return $arr;
            }

            usort($ops, array($this, 'sortOps'));

            if (count($ops[0]['permissible']) == 1) {
                $arr[$ops[0]['rowIndex']][$ops[0]['columnIndex']] = current($ops[0]['permissible']);
                continue;
            }

            foreach ($ops[0]['permissible'] as $value) {
                $tmp = $arr;
                $tmp[$ops[0]['rowIndex']][$ops[0]['columnIndex']] = $value;
                if ($result = $this->solve_it($tmp)) {
                    return $this->solve_it($tmp);
                }
            }

            return false;
        }
    }

    private function sortOps($a, $b) {
        $a = count($a['permissible']);
        $b = count($b['permissible']);
        if ($a == $b) {
            return 0;
        }
        return ($a < $b) ? -1 : 1;
    }

    public function getResult() {
        foreach ($this->comming_arr as $k => $row) {
            foreach ($row as $kk => $r) {
                echo $r . ' ';
            }
            echo "\n";
        }
    }

}

$arr = array(
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
