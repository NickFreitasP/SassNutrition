<?php

namespace App\Application\Patient\UseCases;

use App\Application\Patient\DTOs\PatientsFiltersDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Infrastructure\Persistence\Eloquent\Patient;

class SearchPatientsUseCase
{

  public function execute(PatientsFiltersDTO $dto) :LengthAwarePaginator
  {

      return Patient::query()

            ->where('nutritionist_id',$dto->nutritionistId)

            ->when($dto->search,function ($query) use ($dto)
             {
                    $query->where('name','like','%' . $dto->search . '%');
             })

            ->latest()
            ->paginate(10)
            ->withQueryString();

}

}
