<?php

namespace Entity;

/**
 * Give common utility functions to entity classes
 * 
 */
class Steven {

    public function toArray() {
        $array = [];
        foreach ($this as $key => $value) {
            if (!is_object($value)) {
                $array[$key] = $value;
            }
        }
        return $array;
    }

//    private function checkObject($key, $value, &$memory, &$array) {
//        if (is_object($value)) {
//            $memory[] = $key;
//            $object = $this->$va;
//            switch (count($memory)) {
//                case 1:
//                    foreach ($object as $key => $value) {
//                        $this->checkObject($key, $memory, $array);
//                        $array[$memory[0]][$key] = $value;
//                    }
//                    break;
//                case 2:
//                    foreach ($object as $key => $value) {
//                        $this->checkObject($key, $memory, $array);
//                        $array[$memory[0]][$memory[1]][$key] = $value;
//                    }
//                    break;
//                case 3:
//                    foreach ($object as $key => $value) {
//                        $this->checkObject($key, $memory, $array);
//                        $array[$memory[0]][$memory[1]][$memory[2]][$key] = $value;
//                    }
//                    break;
//                case 4:
//                    foreach ($object as $key => $value) {
//                        $this->checkObject($key, $memory, $array);
//                        $array[$memory[0]][$memory[1]][$memory[2]][$memory[3]][$key] = $value;
//                    }
//                    break;
//            }
//        }
//    }

}
