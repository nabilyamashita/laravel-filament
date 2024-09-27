<?php

namespace App\Filament\Resources\AdminResource\Widgets;

use Filament\Widgets\ChartWidget;

class inventoryChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    // protected static string $color = 'warning';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'timeline',
                    'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                    'backgroundColor' => '#A04747',
                    'borderColor' => '#A04747',
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
