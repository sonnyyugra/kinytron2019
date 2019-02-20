<?php

namespace Kinytron\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class IndClima extends Chart
{
    public function __construct()
    {
        parent::__construct();
        $this->labels(['Muy de acuerdo', 'De acuerdo', 'Ni de acuerdo ni en desacuerdo', 'En desacuerdo', 'Muy en desacuerdo'])
            ->options([
                'responsive' => true,
                'animation' => [
                    'duration' => 3000,
                ],
            ]);
    }
}
