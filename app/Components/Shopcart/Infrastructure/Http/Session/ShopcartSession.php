<?php

declare(strict_types=1);

namespace App\Components\Shopcart\Infrastructure\Http\Session;

use App\Components\Product\Application\Repository\ProductRepository;
use App\Components\Shopcart\Domain\DTO\ShopcartDTO;
use App\Components\Shopcart\Infrastructure\Factory\ShopcartDTOFactory;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Collection;

class ShopcartSession
{
    public function __construct(
        private readonly ProductRepository  $productRepository,
        private readonly ShopcartDTOFactory $factory,
    )
    {
    }

    public function update(Session $session, ShopcartDTO $shopcartDTO)
    {
        //co jezeli uuid sie powtarza? stare UUID juz nie bedzie wazne!
        $shopcart = $session->get('shopcart', []);

        $this->reload($shopcart, $shopcartDTO);


        //RESOLVER - weryfikacja calego shopcarty ORAZ repository


        //przeliczac na nowo pozycje
        //pobiera wszystkie pozycje i na nowo, konieczne product DTO
        //try catch

        //przeniesienie do shopcart

        $session->put('shopcart', $shopcart);
    }

    public function show()
    {
        //tutaj reload bez shopcart
    }

    public function get()
    {
        //tez
    }

    //moze shopcartDTO wczesniej przed reloadem do array?
    private function reload(array $sessionShopcart, ShopcartDTO $shopcartDTO)
    {
        $productsUuids = array_keys($sessionShopcart) + [$shopcartDTO->productUuid ?? null];

        $product = $this->productRepository->getByUuids(
            uuids: array_unique($productsUuids),
            columns: ['uuid', 'stock', 'is_unlimited'],
        );

        $repositoryDTOs = $product->map(function ($item) {
            return $this->factory->createShopcartDTO($item->stock, $item->uuid);
        });

        $shopcartDTOs = Collection::make($sessionShopcart)
            ->map(function ($quantity, $uuid) {
                return $this->factory->createShopcartDTO($quantity, $uuid);
            })
            ->put($shopcartDTO->productUuid, $shopcartDTO);

        $result = $shopcartDTOs->map(function ($item) use ($repositoryDTOs) {
            //walidacja
        });

        //RESOLVER
        //mapowanie do shopcart
    }
}
