<?php

namespace Kinytron\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class Evaluation extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->labels(['Deficiente','Regular','Muy Bueno'])
            ->options([
                'responsive' => true,
                'animation' => [
                    'duration' => 3000,
                ],
            ]);
    }
}
