<?php 

namespace App\Repositories;

interface PaginationInterface
{
    /**
     * @return stdClass[]
     */
    public function items(): array;

    // Total de itens
    public function total(): int;

    // 1° página
    public function isFirstPage(): bool;

    // última página
    public function isLastPage(): bool;

    //página atual
    public function currentPage(): int;

    //próxima página
    public function getNumberNextPage(): int;

    //página anterior
    public function getNumberPreviousPage(): int;

}