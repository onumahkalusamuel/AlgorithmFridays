<?php

// My solution to Week 3's #AlgorithmFridays' challenge
 
/**
 * Sort a given array, and find the start and end positions of a given value.
 * 
 * @param array $nums The input array of numbers
 * @param int $val The value to search for in given array
 * @return array An array containing the start and end positions of the given value
 */
function findStartAndEndAfterSort(array $nums, int $val): array
{

    // default return value
    $return = [-1, -1];

    // total number of items in the array
    $count = count($nums);

    // return default if array is empty
    if (!$count) return $return;

    // sort the array
    sort($nums);

    // left pointer and right pointer.
    // I used the double pointer approach as per last week's solution
    $leftPointer = 0;
    $rightPointer = $count - 1;

    // loop through the values
    for ($leftPointer; $leftPointer < $count; $leftPointer++) {

        // check for start position
        if ($nums[$leftPointer] === $val && $return[0] === -1) $return[0] = $leftPointer;

        // check for end position
        if ($nums[$rightPointer] === $val && $return[1] === -1) $return[1] = $rightPointer;

        // check if the two have been gotten
        if ($return[0] !== -1 && $return[1] !== -1) break;

        // check if have reached the end of loop
        if ($leftPointer >= $rightPointer) {

            // check if either is set while other not set, and update
            // start position
            if ($return[0] == -1 && $return[1] !== -1) $return[0] = $return[1];

            // stop position
            if ($return[1] == -1 && $return[0] !== -1) $return[1] = $return[0];

            break;
        }

        // decrement right pointer
        $rightPointer--;
    }

    return $return;
}

//testing
$nums = [0, -2, 5, 6, 4, 6, 4, 3, -8, 4, 3, -7];
$val = 4;

print_r(findStartAndEndAfterSort($nums, $val));
