<?php

namespace App\Services;

use App\Repositories\ParsingDataTypeRepository;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ParsingDataTypeService
{
    private ParsingDataTypeRepository $repository;

    public function __construct(ParsingDataTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @param string $type
     * @return Builder[]|Collection
     * @throws Exception
     */
    public function getParsingData(array $data, string $type)
    {

        if (self::type($type)) {
            $collect = $this->repository->index($type);
            return $collect;
        }



//        if ($collect) {
//            return $collect->map(function ());
//        }

        throw new Exception('undefined type');
    }

    /**
     * @param array $data
     * @param string $type
     * @return bool
     * @throws Exception
     */
    public function addParsingData(array $data, string $type): bool
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
