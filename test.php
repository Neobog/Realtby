<?php
//function test($A)
//{
//    if ((count($A) === 1)) {
//        $data = [1];
//    }
//
//    sort($A);
//    $uniq = array_unique($A);
//    $true = array_values($uniq);
//
//    foreach ($true as $key => $value) {
//        if ($value >= 0) {
//            $data = array_slice($true, $key);
//            break;
//        } elseif ($value < 1) {
//            return 1;
//        }
//    }
//    if (count($data) === 1) {
//        if ($data[0] > 1) {
//            return 1;
//        } else {
//            return $data[0] + 1;
//        }
//    } elseif (count($data) === 2) {
//        return $data[0] + 1;
//    } else {
//        foreach ($data as $key => $value) {
//            if ($value > $key + 1) {
//                return $key + 1;
//                break;
//            }
//
//            $prev = $value + 1;
//            $next = $data[$key + 1];
//            if ($prev !== $next) {
//                return $data[$key] + 1;
//                break;
//            }
//        }
//    }
//}
# Округление целого числа в большую сторону с коэффициентом
$uno = 1100;
$result = round($uno/50);
echo $result * 50;