<?php

namespace Kinytron\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class TrabajoEnEquipo extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->labels(['Deficiente (07-11)', 'Regular (12-16)', 'Muy Bueno (17-21)'])
            ->options([
                'responsive' => false,
                'animation' => [
                    'duration' => 3000,
                ]
            ]);
    }
}
