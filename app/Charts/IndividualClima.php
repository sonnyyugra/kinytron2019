<?php

namespace Kinytron\Charts;

use ConsoleTVs\Charts\Classes\Frappe\Chart;

class IndividualClima extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->labels(['Muy de acuerdo', 'De acuerdo', 'Ni de acuerdo ni en desacuerdo', 'En desacuerdo', 'Muy en desacuerdo'])
            ->options([
                'responsive' => true,
                'animation' => [
                    'duration' => 3000,
                ],
                'colors' => ['green','#adff2f','yellow','#ff4500','red']
            ]);
    }
}
