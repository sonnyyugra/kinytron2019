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
        $this->labels(['Deficiente (20-27)', 'Insuficiente (28-36)', 'Regular (37-45)', 'Bueno (46-54)', 'Muy Bueno (55-60)'])
            ->options([
                'responsive' => false,
                'animation' => [
                    'duration' => 3000,
                ]
            ]);
    }
}
