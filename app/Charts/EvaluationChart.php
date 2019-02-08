<?php

namespace Kinytron\Charts;

use ConsoleTVs\Charts\Classes\Frappe\Chart;

class EvaluationChart extends Chart
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
                'colors' => ['red','yellow','green']
            ]);
    }
}
