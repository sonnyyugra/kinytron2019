<?php

namespace Kinytron\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class IndAutoestima extends Chart
{
    public function __construct()
    {
        parent::__construct();
        $this->labels(['3', '2', '1'])
            ->options([
                'responsive' => true,
                'animation' => [
                    'duration' => 3000,
                ],
            ]);
    }
}
