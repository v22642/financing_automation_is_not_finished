<?php

namespace App\Imports;

use App\Models\NameTransformation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class NameTransformationImports implements WithHeadingRow, FromCollection, ShouldAutoSize, WithEvents
{
    
    
    public function headingRow(): int
    {
        return 9;
    }
    public function collection()
    {
        // Верните вашу коллекцию данных для экспорта
    }
    
    

    

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $worksheet = $event->sheet->getDelegate();
                
                // Установите ширину скрытых столбцов на 0
                $worksheet->getColumnDimension('B')->setWidth(0);
                $worksheet->getColumnDimension('D')->setWidth(0);
                // Добавьте другие столбцы, которые нужно скрыть
                
                // Можно также использовать диапазон столбцов для скрытия
                // $worksheet->getColumnDimension('B:F')->setWidth(0);
            },
        ];
    }
}
