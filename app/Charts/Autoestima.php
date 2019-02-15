<?php

namespace Kinytron\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class Autoestima extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->labels(['Deficiente', 'Insuficiente', 'Regular', 'Bueno', 'Muy Bueno'])
            ->options([
                'responsive' => false,
                'animation' => [
                    'duration' => 3000,
                ]
            ]);
    }
}
