<?php

namespace Kinytron\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class IndClima extends Chart
{
    public function __construct()
    {
        parent::__construct();
        $this->labels(['1', '2', '3', '4', '5'])
            ->options([
                'responsive' => true,
                'animation' => [
                    'duration' => 3000,
                ],
            ]);
    }
}
