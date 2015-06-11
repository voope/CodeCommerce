<?php
/**
 * Created by PhpStorm.
 * User: paulinho
 * Date: 09/06/15
 * Time: 13:30
 */

namespace CodeCommerce;


class Cart {

    private $itens;

    public function __construct()
    {
        $this->itens = [];
    }

    public function add($id, $name, $price)
    {
        $this->itens += [
            $id => [
                'qtd' => isset($this->itens[$id]['qtd']) ? $this->itens[$id]['qtd']++ : 1,
                'price' => $price,
                'name' => $name
            ]
        ];

        return $this->itens;
    }

    public function update($id, $name, $price, $qtd)
    {

        $this->itens += [
            $id => [
                'qtd' => $this->itens[$id]['qtd'] = $qtd,
                'price' => $price,
                'name' => $name
            ]
        ];

        return $this->itens;
    }

    public function remove($id)
    {
        unset($this->itens[$id]);
    }

    public function all(){
        return $this->itens;
    }

    public function getTotal(){
        $total = 0;
        foreach($this->itens as $items){
            $total += $items['qtd'] * $items['price'];
        }

        return $total;
    }

    public function clear()
    {
        $this->itens = [];
    }

}