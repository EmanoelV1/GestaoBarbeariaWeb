<?php
require_once __DIR__ . '/../entidades/Product.php';

// Métodos utilitários para mapeamento da resposta do endpoint e conversão
// Para a aplicação php


function mapearJsonParaEntidadeProduto(array $data): Product
{
    $product = new Product();

    $product->id = $data['id'] ?? 0;
    $product->name = $data['name'] ?? null;
    $product->unitCost = $data['unitCost'] ?? 0.0;
    $product->quantity = $data['quantity'] ?? 0;
    $product->salePrice = $data['salePrice'] ?? 0.0;

    return $product;
}

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

// Carrega os agendamentos realizando uma requisição GET
// para o endpoint de agendamentos e devolve paginado 

function carregarProdutos(int $page, int $itemsPerPage): array
{
    $apiUrl = 'http://localhost:5156/api/products';
    $responseJson = file_get_contents($apiUrl);
    if ($responseJson === false) {
        die('Erro ao acessar a API de Produtos.');
    }
    $responseData = json_decode($responseJson, true);
    
    if ($responseData === null) {
        die('Erro ao decodificar resposta JSON da API.');
    }

    $productrArray = $responseData['products'] ?? [];
    $product = [];
    
    foreach ($productrArray as $data) {
        $product[] = mapearJsonParaEntidadeProduto($data);
    }

    $totalItems = count($product);
    $totalPages = (int)ceil($totalItems / $itemsPerPage);
    $startIndex = ($page - 1) * $itemsPerPage;
    $productsPage = array_slice($product, $startIndex, $itemsPerPage);

    return [
        'products' => $productsPage,
        'totalItems' => $totalItems,
        'totalPages' => $totalPages,
    ];
}



