<?php 

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use stdClass;

class PaginationPresenter implements PaginationInterface
{
    /**
     *@var stdclass[]
     */
    private array $items;

    public function __construct(
        protected LengthAwarePaginator $paginator,
    ) {
        $this->items = $this->resolveItems($this->paginator->items());
    }

    /**
     * @return stdClass[]
     */
    public function items(): array
    {
        return $this->items;
       // return $this->paginator->items();
    }
    // Total de itens
    public function total(): int
    {
        return $this->paginator->total() ?? 0;
    }

    // 1° página
    public function isFirstPage(): bool
    {
        return $this->paginator->onFirstPage();
    }

    // última página
    public function isLastPage(): bool
    {
        return $this->paginator->currentPage() === $this->paginator->lastPage();
    }

    //página atual
    public function currentPage(): int
    {
        return $this->paginator->currentPage() ?? 1;
    }

    //próxima página
    public function getNumberNextPage(): int
    {
        return $this->paginator->currentPage() + 1;
    }

    //página anterior
    public function getNumberPreviousPage(): int
    {
        return $this->paginator->currentPage() - 1;
    }

    // converter item por item para stdclass
    private function resolveItems(array $items): array
    {
        $response = [];
       foreach ($items as $item) {
        $sdtClassObject = new stdClass;
        foreach ($item->toArray() as $key => $value) {
            $sdtClassObject->{$key} = $value;
        }
        array_push($response, $sdtClassObject);
       }

       return $response;
    }

}