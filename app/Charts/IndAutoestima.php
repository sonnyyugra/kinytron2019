<?php

namespace Kinytron\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class IndAutoestima extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->labels(['De acuerdo', 'No se', 'Estoy en desacuerdo'])
            ->options([
                'responsive' => true,
                'animation' => [
                    'duration' => 3000,
                ],
            ]);
    }
}
