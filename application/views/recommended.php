<?php

function similarity_distance($matrix, $person1, $person2)
{
    $similar = array();
    $sum = 0;

    foreach ($matrix[$person1] as $key => $value) {
        if (array_key_exists($key, $matrix[$person2])) {
            $similar[$key] = 1;
        }
    }

    if (($similar) == 0) {
        return 0;
    }

    // Eucalidean Distance
    foreach ($matrix[$person1] as $key => $value) {
        if (array_key_exists($key, $matrix[$person2])) {
            $sum = $sum + pow($value - $matrix[$person2][$key], 2);
        }
    }

    // Similarity
    return 1 / (1 + sqrt($sum));
}

function getRecommendations($matrix, $person)
{
    $total = array();
    $simsum = array();
    $ranks = array();

    foreach ($matrix as $otherPerson => $value) {
        if ($otherPerson != $person) {
            $sim = similarity_distance($matrix, $person, $otherPerson);

            foreach ($matrix[$otherPerson] as $key => $value) {
                if (!array_key_exists($key, $matrix[$person])) {
                    if (!array_key_exists($key, $total)) {
                        $total[$key] = 0;
                    }

                    $total[$key] += $matrix[$otherPerson][$key] * $sim;

                    if (!array_key_exists($key, $simsum)) {
                        $simsum[$key] = 0;
                    }

                    $simsum[$key] += $sim;
                }
            }
        }
    }

    foreach ($total as $key => $value) {
        $ranks[$key] = $value / $simsum[$key];
    }

    array_multisort($ranks, SORT_DESC);

    return $ranks;
}
