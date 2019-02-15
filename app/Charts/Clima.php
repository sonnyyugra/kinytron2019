<?php

namespace Kinytron\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class Clima extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->labels(['Muy bueno (1 - 1.6)', 'Regular (1.7 - 3.3)', 'Insuficiente (3.4 - 5)'])
            ->options([
                'responsive' => false,
                'animation' => [
                    'duration' => 3000,
                ],
            ]);
    }
}
