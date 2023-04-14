<?php

namespace App\Services;

use App\Repositories\ParsingChartDataTypeRepository;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use function PHPUnit\Framework\isEmpty;

class ParsingChartDataTypeService
{
    private ParsingChartDataTypeRepository $repository;

    public function __construct(ParsingChartDataTypeRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @throws Exception
     */
    public function getParsingDataTable(string $type)
    {
        if (self::type($type)) {
            return $this->mapParsDataTable($this->repository->index($type));
        }

        throw new Exception('undefined type');
    }


    /**
     * @param Collection $collection
     * @return Collection|\Illuminate\Support\Collection
     */
    public function mapParsDataTable(Collection $collection)
    {
        return $collection->map(function ($item) {
            return [
                'title' => $item['title'],
                'table' => json_decode($item['months'], true)
            ];
        });
    }

    /**
     * @throws Exception
     */
    public function addParsingChartData(array $data, string $type): bool
    {
        if (self::type($type)) {
            foreach ($data as $item) {
                $this->repository->create([
                    'title' => $item['title'],
                    'months' => json_encode($item['months']),
                    'type' => $type
                ]);
            }

            return true;
        }

        throw new Exception('undefined type');
    }

    /**
     * @param string $data
     * @return bool
     */
    public function type(string $data): bool
    {
        if ($data == 'kz' || $data == 'all') {
            return true;
        }

        return false;
    }
}
