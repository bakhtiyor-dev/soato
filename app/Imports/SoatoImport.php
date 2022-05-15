<?php

namespace App\Imports;

use App\Models\District;
use App\Models\Region;
use App\Models\Town;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class SoatoImport implements ToCollection, WithChunkReading
{
    protected int $region;
    protected int $district;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if (Str::length($row[0]) === 4) {
                $this->region = Region::create([
                    'code' => $row[0],
                    'name' => $row[5]
                ])->id;
            }

            if (Str::length($row[0]) === 7)
                $this->district = District::create([
                    'code' => $row[0],
                    'name' => $row[5],
                    'region_id' => $this->region
                ])->id;

            if (Str::length($row[0]) === 10)
                Town::create([
                    'code' => $row[0],
                    'name' => $row[5],
                    'district_id' => $this->district
                ]);
        }
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
